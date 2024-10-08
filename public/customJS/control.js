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


            $.get("{{ url('readPln') }}", function(data) {
                $("#pln").text(data.pln);
                const plnPercentage = (data.pln / data.maxPln) * 100;
                $("#pln-progress").css("width", plnPercentage + "%");
            });
            $.get("{{ url('readBatt1') }}", function(data) {
                $("#batt1").text(data.batt1);
                const batt1Percentage = (data.batt1 / data.maxBatt1) * 100;
                $("#batt1-progress").css("width", batt1Percentage + "%");
            });
            $.get("{{ url('readBatt2') }}", function(data) {
                $("#batt2").text(data.batt2);
                const batt2Percentage = (data.batt2 / data.maxBatt2) * 100;
                $("#batt2-progress").css("width", batt2Percentage + "%");
            });
            $.get("{{ url('readSuhu') }}", function(data) {
                $("#suhu").text(data.suhu);
                const suhuPercentage = (data.suhu / data.maxSuhu) * 100;
                $("#suhu-progress").css("width", suhuPercentage + "%");
            });
        }, 1000);
    });
});
