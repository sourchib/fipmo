var express = require('express'),
app = express(),
server = require('http').Server(app),
io = require('socket.io')(server),
port = 8886;
var mqtt = require('mqtt')
var dateTime = require('node-datetime');
var dt = dateTime.create();
var time_formatted = dt.format('Y-m-d H:M:S');

//var client = mqtt.connect('mqtt://147.139.201.35')
var client = mqtt.connect('mqtt://47.254.248.173',{clientId:"db_nama",username:"muchib",password:"muchib"})
var mysql = require('mysql');
var connection = mysql.createConnection({
host : 'localhost',
user : 'root',
password : 'admin',
database : 'fipmo'
});
connection.connect();
//Server start
server.listen(port, () => console.log('on port' + port))
//user server

app.use(express.static(__dirname + '/public'));
io.on('connection', onConnection);
var connectedSocket = null;
function onConnection(socket){
connectedSocket = socket;
}
client.on('connect', function () {
client.subscribe('Displays/espnext01hc/out', function (err) {
})
})
client.on('message', function (topic, message) {
// message is Buffer
console.log(message.toString())
connection.query('INSERT INTO kedalaman VALUES(NULL,"'+message.toString()+'","'+ time_formatted + '")', function (error, results,fields) {
if (error) throw error;
console.log('ok');
io.emit('data', { data: message.toString() });
// bagian untuk meneruskan data ke frontend pakai socket.io
});
})



