<x-layout>
    <x-slot:title>{{ $title }}</x-slot>

    <div x-data="{ isModalShow: true, isFirstModalShow: true }">
        <x-card-body margin-top="0" margin-bottom="10">

            <div class="sm:col-span-3">
                <x-label>Status</x-label>
                <div class="mt-2">
                    <x-input-field type="text" name="status" id="status" value="Disconnected"></x-input-field>
                </div>
            </div>
            
            <div class="sm:col-span-3">
                <x-label>Connection</x-label>
                <div class="mt-2">
                    <x-button @click="isModalShow = !isModalShow" type="button" button-color="indigo" id="btnShowModal">Show</x-button>
                </div>
            </div>
    
        </x-card-body>

        <div class="flex items-center justify-center">
        
            <div class="grid grid-cols-3 gap-4">
                <!-- Empty div to align buttons -->
                <div></div>
                
                <!-- Up Arrow Button -->
                <button id="up" class="w-16 h-16 bg-blue-500 text-white rounded-full flex items-center justify-center transform rotate-45">
                    <span class="transform -rotate-45">▲</span>
                </button>
                
                <!-- Empty div to align buttons -->
                <div></div>
                
                <!-- Left Arrow Button -->
                <button id="left" class="w-16 h-16 bg-blue-500 text-white rounded-full flex items-center justify-center transform rotate-45">
                    <span class="transform -rotate-135">▲</span>
                </button>
                
                <!-- Center Button -->
                <div></div>
                
                <!-- Right Arrow Button -->
                <button id="right" class="w-16 h-16 bg-blue-500 text-white rounded-full flex items-center justify-center transform rotate-45">
                    <span class="transform rotate-45">▲</span>
                </button>
                
                <!-- Empty div to align buttons -->
                <div></div>
                
                <!-- Down Arrow Button -->
                <button id="down" class="w-16 h-16 bg-blue-500 text-white rounded-full flex items-center justify-center transform rotate-45">
                    <span class="transform rotate-135">▲</span>
                </button>
                
                <!-- Empty div to align buttons -->
                <div></div>
            </div>
        </div>
    
        <div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            
            <div 
                x-show="isModalShow"
                x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true">
            </div>
          
            <div
                x-show="isModalShow"
                x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
                class="fixed inset-0 z-10 w-screen overflow-y-auto">
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    
                    <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
    
                        <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                            <div class="sm:flex sm:items-start">
                                <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                    <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                                    </svg>
                                </div>
                                <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                    <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Connect to MQTT Broker</h3>
                                    {{-- <div class="mt-2">
                                        <p class="text-sm text-gray-500">Are you sure you want to deactivate your account? All of your data will be permanently removed. This action cannot be undone.</p>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
    
                        <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                            <x-card-body>
                                <div class="sm:col-span-3">
                                <x-label for="host" is-required="true">Host / IP Address</x-label>
                                <div class="mt-2">
                                    <x-input-field name="host" id="host" autocomplete="host" placeholder="e.g. test.mosquitto.org" value="test.mosquitto.org" required/>
                                </div>
                                </div>
                        
                                <div class="sm:col-span-3">
                                <x-label for="port" is-required="true">Port</x-label>
                                <div class="mt-2">
                                    <x-input-field type="number" name="port" id="port" autocomplete="port" placeholder="e.g. 8080" value="8080" required/>
                                </div>
                                </div>
                        
                                <div class="sm:col-span-3">
                                <x-label for="username">Username</x-label>
                                <div class="mt-2">
                                    <x-input-field type="text" name="username" id="username" autocomplete="username" placeholder="e.g. username" />
                                </div>
                                </div>
                        
                                <div class="sm:col-span-3">
                                <x-label for="password">Password</x-label>
                                <div class="mt-2">
                                    <x-input-field type="password" name="password" id="password" autocomplete="password" placeholder="********" />
                                </div>
                                </div>
                        
                                <div class="col-span-full">
                                <x-label for="topic" is-required="true">Topic</x-label>
                                <div class="mt-2">
                                    <x-input-field type="text" name="topic" id="topic" autocomplete="topic" placeholder="#" value="orewana" required/>
                                </div>
                                </div>
                            
                            </x-card-body>
                        </div>
    
                        <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                            <x-button @click="isBrokerSet() === true ? (isModalShow = !isModalShow, isFirstModalShow = false, startConnect) : ''"  type="button" button-color="indigo" id="btnConnect">Connect</x-button>
                            <x-button @click="isFirstModalShow === true ? back : isModalShow = !isModalShow" type="button" button-color="red" id="btnConnect">Cancel</x-button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
      
    <script src={{ asset('js/mqtt/paho-mqtt.js') }}></script>
    <script>
        let isConnectFail = true;

        function isBrokerSet() {
            let bool = document.getElementById('host').value !== '' && document.getElementById('port').value !== '' && document.getElementById('topic').value !== '';

            if (!bool) {
                alert('Please fill all the fields');
                return false;
            }

            return true;
        };

        function back() {
            window.location.href = '/';
        };

        function startConnect() {
            clientID = "client-" + parseInt(Math.random() * 100);
            isConnectFail = true;

            host = document.getElementById("host").value;
            port = document.getElementById("port").value;
            userId = document.getElementById("username").value;
            passwordId = document.getElementById("password").value;

            // Create a client instance
            client = new Paho.MQTT.Client(host, Number(port), clientID);

            // set callback handlers
            client.onConnectionLost = onConnectionLost;
            client.onMessageArrived = onMessageArrived;

            // connect the client
            client.connect({ onSuccess: onConnect, onFailure: onFailure });      
        }

        // called when the client connects
        function onConnect() {
            isConnectFail = false;

            // Once a connection has been made, make a subscription and send a message.
            document.getElementById("btnConnect").disabled = true;
            document.getElementById("status").value = "Connected";

            topic = document.getElementById("topic").value;
            client.subscribe(topic);

            alert("Connection success");
        }

        function onFailure(error) {
            isConnectFail = true;
            alert(error.errorMessage);
        }

        // called when the client loses its connection
        function onConnectionLost(responseObject) {
            if (responseObject.errorCode !== 0) {
                document.getElementById("btnConnect").disabled = false;
                document.getElementById("status").value = "Disconnected";
                alert("Connection lost: " + responseObject.errorMessage);
            }
        }

        // called when a message arrives
        function onMessageArrived(message) {
            console.log(message.payloadString)
        }

        function publishMessage(message) {
            msg = message;
            topic = document.getElementById("topic").value;

            message = new Paho.MQTT.Message(msg);
            message.destinationName = topic;

            try {
                client.send(message);
            } catch (e) {
                alert(getDateTimeNow() + " | Error: " + e);
                return;
            }
        }

        function startDisconnect() {
            client.disconnect();
            document.getElementById("btnConnect").disabled = false;
        }

        let interval;

        const startLogging = (direction) => {
            interval = setInterval(() => {
                publishMessage(direction);
                console.log(direction);
            }, 10);
        };

        const stopLogging = () => {
            clearInterval(interval);
        };

        document.getElementById('up').addEventListener('mousedown', () => startLogging('Up'));
        document.getElementById('left').addEventListener('mousedown', () => startLogging('Left'));
        document.getElementById('right').addEventListener('mousedown', () => startLogging('Right'));
        document.getElementById('down').addEventListener('mousedown', () => startLogging('Down'));

        document.getElementById('up').addEventListener('mouseup', stopLogging);
        document.getElementById('left').addEventListener('mouseup', stopLogging);
        document.getElementById('right').addEventListener('mouseup', stopLogging);
        document.getElementById('down').addEventListener('mouseup', stopLogging);

        document.getElementById('up').addEventListener('mouseleave', stopLogging);
        document.getElementById('left').addEventListener('mouseleave', stopLogging);
        document.getElementById('right').addEventListener('mouseleave', stopLogging);
        document.getElementById('down').addEventListener('mouseleave', stopLogging);
    </script>
</x-layout>