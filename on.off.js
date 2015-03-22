var socket = io.connect();

        // Changes the led state
        function changeState(state){
            if (state==1){
                // Emit message changing the state to 1
                socket.emit('changeState', '{"state":1}');
                // Change led status on web page to ON
                document.getElementById("outputStatus").innerHTML = "Status: ON";
            }
            else if (state==0){
                // Emit message changing the state to 0
                socket.emit('changeState', '{"state":0}');
                // Change led status on web page to OFF
                document.getElementById("outputStatus").innerHTML = "Status: OFF";
            }
        }