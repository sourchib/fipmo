var kedalaman = document.getElementById('kedalaman');
var socket = io.connect('47.254.248.173:8886');
socket.on('data', function(message) {
kedalaman.innerHTML = message.data;
});