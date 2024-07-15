let isConnectFail = true;

function isBrokerSet() {
    let bool =
        document.getElementById("host").value !== "" &&
        document.getElementById("port").value !== "" &&
        document.getElementById("topic").value !== "";

    if (!bool) {
        alert("Please fill all the fields");
        return false;
    }

    return true;
}

function back() {
    window.location.href = "/";
}

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
    console.log(message.payloadString);
}

function publishMessage(message, speed) {
    if (message == "Up") {
        msg = "U";
    } else if (message == "Left") {
        msg = "L";
    } else if (message == "Right") {
        msg = "R";
    } else if (message == "Down") {
        msg = "D";
    } else if (message == "Stop") {
        msg = "S";
    }

    msg += speed;

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

const startLogging = (direction) => {
    speed = document.getElementById("speed").value;

    publishMessage(direction, speed);
    console.log(direction);
};

const stopLogging = () => {
    publishMessage("Stop", 100);
    console.log("Stop");
};

document
    .getElementById("up")
    .addEventListener("mousedown", () => startLogging("Up"));
document
    .getElementById("left")
    .addEventListener("mousedown", () => startLogging("Left"));
document
    .getElementById("right")
    .addEventListener("mousedown", () => startLogging("Right"));
document
    .getElementById("down")
    .addEventListener("mousedown", () => startLogging("Down"));

document.getElementById("up").addEventListener("mouseup", stopLogging);
document.getElementById("left").addEventListener("mouseup", stopLogging);
document.getElementById("right").addEventListener("mouseup", stopLogging);
document.getElementById("down").addEventListener("mouseup", stopLogging);
