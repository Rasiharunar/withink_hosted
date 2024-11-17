<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbSensorTable extends Migration
{
    public function up()
    {
        Schema::create('tb_sensor', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Menambahkan foreign key

            $table->float('kelembapan'); // Kolom untuk kelembapan
            $table->float('volume_tanki'); // Kolom untuk volume tanki
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_sensor');
    }
}
