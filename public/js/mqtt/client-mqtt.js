function startConnect() {
    pageScroll();

    clientID = "client-" + parseInt(Math.random() * 100);
    host = document.getElementById("host").value;
    port = document.getElementById("port").value;
    userId = document.getElementById("username").value;
    passwordId = document.getElementById("password").value;

    document.getElementById("messageListener").innerHTML +=
        getDateTimeNow() +
        " | Connecting to " +
        host +
        " on port " +
        port +
        " with clientID " +
        clientID +
        "<br>";
    // Create a client instance
    client = new Paho.MQTT.Client(host, Number(port), clientID);

    // set callback handlers
    client.onConnectionLost = onConnectionLost;
    client.onMessageArrived = onMessageArrived;

    // connect the client
    client.connect({ onSuccess: onConnect });
}

// called when the client connects
function onConnect() {
    // Once a connection has been made, make a subscription and send a message.
    document.getElementById("btnConnect").disabled = true;
    document.getElementById("btnDisconnect").disabled = false;

    topic = document.getElementById("topic").value;
    client.subscribe(topic);

    document.getElementById("messageListener").innerHTML +=
        "<span> " +
        getDateTimeNow() +
        " | Subscribing to topic " +
        topic +
        "</span><br>";
}

// called when the client loses its connection
function onConnectionLost(responseObject) {
    if (responseObject.errorCode !== 0) {
        document.getElementById("messageListener").innerHTML +=
            "<span> " +
            getDateTimeNow() +
            " | onConnectionLost: " +
            responseObject.errorMessage +
            "</span><br>";

        document.getElementById("btnConnect").disabled = false;
        document.getElementById("btnDisconnect").disabled = true;
    }
}

// called when a message arrives
function onMessageArrived(message) {
    document.getElementById("messageListener").innerHTML +=
        "<span> " +
        getDateTimeNow() +
        " | onMessageArrived: " +
        message.payloadString +
        "</span><br>";
}

function publishMessage() {
    msg = document.getElementById("message").value;
    topic = document.getElementById("topicForSend").value;

    message = new Paho.MQTT.Message(msg);
    message.destinationName = topic;

    try {
        client.send(message);
    } catch (e) {
        document.getElementById("messageListener").innerHTML +=
            "<span> " + getDateTimeNow() + " | Error: " + e + "</span><br>";
        alert(getDateTimeNow() + " | Error: " + e);
        return;
    }

    document.getElementById("messageListener").innerHTML +=
        "<span> " +
        getDateTimeNow() +
        " Message: " +
        message.payloadString +
        " to topic " +
        topic +
        "</span><br>";
}

function startDisconnect() {
    client.disconnect();
    document.getElementById("messageListener").innerHTML +=
        "<span> Disconnected. </span><br>";

    document.getElementById("btnConnect").disabled = false;
    document.getElementById("btnDisconnect").disabled = true;
}

function clearLog() {
    document.getElementById("messageListener").innerHTML = "";
}

function getDateTimeNow() {
    return new Date().toLocaleString();
}

let positionBefore;

function pageScroll(e) {
    positionBefore = window.scrollY;

    window.scrollBy(0, 10);
    scrolldelay = setTimeout(pageScroll, 10);

    if (positionBefore === window.scrollY) {
        clearTimeout(scrolldelay);
    }
}
