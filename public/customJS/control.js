document.addEventListener('DOMContentLoaded', function() {
    // Fetch the CSRF token from the meta tag
    let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    // Add event listeners to the toggle switches
    document.getElementById('toggleSwitchRelay1').addEventListener('change', function() {
        let state = this.checked ? 1 : 0;
        controlRelay(1, state);
    });

    document.getElementById('toggleSwitchRelay2').addEventListener('change', function() {
        let state = this.checked ? 1 : 0;
        controlRelay(2, state);
    });

    function controlRelay(relayId, state) {
        fetch("{{ url('control-relay') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': token
                },
                body: JSON.stringify({
                    relay_id: relayId,
                    state: state
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.message) {
                    console.log(data.message);
                }
            })
            .catch(error => console.error('Error:', error));
    }

    //fetch data relay
    function fetchRelayData() {
        $.get("{{ url('get-relay-data') }}", function(data) {
            // Update toggle switch status based on relay data
            updateToggleSwitchStatus(1, data.relay1 === '1');
            updateToggleSwitchStatus(2, data.relay2 === '1');
        });
    }

    // Function to update toggle switch status based on relay data
    function updateToggleSwitchStatus(relayId, state) {
        const toggleSwitch = document.getElementById('toggleSwitchRelay' + relayId);
        toggleSwitch.checked = state;
    }
    // Fetch data periodically
    $(document).ready(function() {
        setInterval(function() {

            fetchRelayData();


            $.get("{{ url('readKelembapan') }}", function(data) {
                $("#kelembapan").text(data.kelembapan);
                const kelembapanPercentage = (data.kelembapan / data.maxKelembapan) * 100;
                $("#kelembapan-progress").css("width", kelembapanPercentage + "%");
            });
            $.get("{{ url('readVolume_air') }}", function(data) {
                $("#volume_air").text(data.volume_air);
                const volume_airPercentage = (data.volume_air / data.maxVolume_air) * 100;
                $("#volume_air-progress").css("width", volume_airPercentage + "%");
            });

        }, 1000);
    });
});
