#include <Arduino.h>
#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <WiFiClientSecureBearSSL.h>
#include <ArduinoJson.h> // Pastikan untuk menambahkan pustaka ArduinoJson
#include <WiFiManager.h>

String relay1; // Menyimpan nilai relay1
String relay2; // Menyimpan nilai relay2
float kelembapan =00.00;
float volum_tanki = 12.50;
const float tinggiTandon = 150.00;
float persentaseWaterLevel;
#defin pinReset 7
#define AOUT_PIN A0
#define triggerPin  12
#define echoPin     14
int relayPin[] = {0,2}; 



void setup() {
  Serial.begin(115200);
  
  pinMode(triggerPin, OUTPUT);
  pinMode(echoPin, INPUT);
  for(int i =0; i<2; i++){
    pinMode(relayPin[i], OUTPUT);
  }
  // Menghubungkan ke Wi-Fi
  WiFi.mode(WIFI_STA); // explicitly set mode, esp defaults to STA+AP  
  // put your setup code here, to run once:
  Serial.begin(115200);
  Serial.println("\n Starting");
  pinMode(TRIGGER_PIN, INPUT_PULLUP);

  Serial.println("Connected to WiFi");
}



void loop() {
  // Tunggu koneksi Wi-Fi
  // readDistance();
  readKelembapan();
  controlRelay();
  readLevel();
  sendData();
  getData();
  delay(500); // Delay lebih lama agar tidak terlalu sering meminta data

  Serial.printf("Relay1: %s, Relay2: %s\n", relay1.c_str(), relay2.c_str());
}
void controlRelay(){
  if(relay1=="1"){
    digitalWrite(relayPin[0], HIGH);
  }else{
    digitalWrite(relayPin[0], LOW);
  }

  if(relay2=="1"){
    digitalWrite(relayPin[1], HIGH);
  }else{
    digitalWrite(relayPin[1], LOW);
  }
}
void getData() {
  if (WiFi.status() == WL_CONNECTED) {
    std::unique_ptr<BearSSL::WiFiClientSecure> client(new BearSSL::WiFiClientSecure);
    client->setInsecure();

    HTTPClient https;
    // Serial.print("[HTTPS] begin...\n");
    if (https.begin(*client, "https://www.withink.pro/esp/get-relay-data-esp/")) {  // HTTPS
      Serial.print("[HTTPS] GET...\n");
      int httpCode = https.GET();
      if (httpCode > 0) {
        // Serial.printf("[HTTPS] GET... code: %d\n", httpCode);

        if (httpCode == HTTP_CODE_OK || httpCode == HTTP_CODE_MOVED_PERMANENTLY) {
          String payload = https.getString();
          // Serial.println(payload);

          // Parsing JSON
          DynamicJsonDocument doc(1024); // Ganti ukuran sesuai kebutuhan
          DeserializationError error = deserializeJson(doc, payload);

          if (!error) {
            // Ambil nilai relay1 dan relay2 sebagai string
            relay1 = doc["relay1"].as<String>(); // Simpan nilai relay1 ke variabel global
            relay2 = doc["relay2"].as<String>(); // Simpan nilai relay2 ke variabel global

            
          } else {
            Serial.print("Failed to parse JSON: ");
            Serial.println(error.f_str());
          }
        }
      } else {
        Serial.printf("[HTTPS] GET... failed, error: %s\n", https.errorToString(httpCode).c_str());
      }

      https.end();
    } else {
      Serial.printf("[HTTPS] Unable to connect\n");
    }
  } else {
    Serial.println("WiFi not connected");
  }
}

void sendData() {
  if (WiFi.status() == WL_CONNECTED) {
    std::unique_ptr<BearSSL::WiFiClientSecure> client(new BearSSL::WiFiClientSecure);
    client->setInsecure();

    HTTPClient https;
    // Serial.print("[HTTPS] begin...\n");
    if (https.begin(*client, "https://www.withink.pro/esp/simpan/"+kelembapan+"/"+persentaseWaterLevel)) {  // HTTPS
      Serial.print("https://www.withink.pro/esp/simpan/"+kelembapan+"/"+persentaseWaterLevel);
      int httpCode = https.GET();
      if (httpCode > 0) {
        // Serial.printf("[HTTPS] GET... code: %d\n", httpCode);

        
      } else {
        Serial.printf("[HTTPS] GET... failed, error: %s\n", https.errorToString(httpCode).c_str());
      }

      https.end();
    } else {
      Serial.printf("[HTTPS] Unable to connect\n");
    }
  } else {
    Serial.println("WiFi not connected");
  }
}

void readLevel(){
    long duration;
    digitalWrite(triggerPin, LOW);
    delayMicroseconds(2); 
    digitalWrite(triggerPin, HIGH);
    delayMicroseconds(10); 
    digitalWrite(triggerPin, LOW);
    duration = pulseIn(echoPin, HIGH);
    volum_tanki = (duration / 2) / 29.1; // Menghitung jarak

    Serial.print("Jarak: ");
    Serial.print(volum_tanki);
    Serial.println(" cm");
    
    // Menghitung tinggi air
    float tinggiAir = tinggiTandon - volum_tanki; // Tinggi air dalam cm
    
    // Menghitung persentase
    if (tinggiAir < 0) {
        tinggiAir = 0; // Jika tinggi air negatif, set ke 0
    }
    
    persentaseWaterLevel = (tinggiAir / tinggiTandon) * 100; // Menghitung persentase

    Serial.print("Tinggi Air: ");
    Serial.print(tinggiAir);
    Serial.println(" cm");
    
    Serial.print("Persentase: ");
    Serial.print(persentaseWaterLevel);
    Serial.println(" %");
}

void readKelembapan(){
  int value = analogRead(AOUT_PIN); // read the analog value from sensor

  // Menghitung persentase kelembaban
  // Rentang nilai adalah dari 1040 (kering) ke 17 (lembab)
  int maxDryValue = 1040;
  int minWetValue = 17;

  // Menghitung kelembaban dalam persentase
  // Nilai kelembaban = ((nilai - nilai minimum) / (nilai maksimum - nilai minimum)) * 100
  int moisturePercentage = map(value, minWetValue, maxDryValue, 100, 0);

  Serial.print("Moisture: ");
  Serial.print(moisturePercentage);
  Serial.println("%");
  
}
void readDistance(){
  long duration, jarak;
  digitalWrite(triggerPin, LOW);
  delayMicroseconds(2); 
  digitalWrite(triggerPin, HIGH);
  delayMicroseconds(10); 
  digitalWrite(triggerPin, LOW);
  duration = pulseIn(echoPin, HIGH);
  volum_tanki = (duration/2) / 29.1;
  Serial.println("jarak :");
  Serial.print(volum_tanki);
  Serial.println(" cm");
  
}