var text = document.getElementById('text');
var socket = io.connect('47.254.248.173:8887');
var gauge = new LinearGauge({
    renderTo: 'gauge',
    width: 120,
    height: 270,
    valueBox: false,
    minValue: 0,
    maxValue: 16,
    majorTicks: [
        "0",
        "2",
        "3",
        "5",
        "7",
        "9",
        "13",
        "15"
    ],
    minorTicks: 2,
    strokeTicks: true,
    highlights: [
        {
            "from": 0,
            "to": 16,
            "color": "rgba(2, 128, 251)"
        }
    ],
    colorMajorTicks: "#000000",
    colorMinorTicks: "#000000",
    colorPlate: "#fff",
    borderShadowWidth: 0,
    borders: false,
    needleType: "arrow",
    needleWidth: 2,
    animationDuration: 1500,
    animationRule: "linear",    
    tickSide: "left",
    numberSide: "left",
    needleSide: "left",
    barStrokeWidth: 5,
    barBeginCircle: false,
    value: 75
}).draw();
socket.on('data', function(message) {
text.innerHTML = message.data;
gauge.value = message.data;
// gauge23.value = message.data;
var content;
if (message.data <= 6.0) {
        content = 'Rendah';      
        document.getElementById("ph").innerHTML = content;  
    }else if (message.data > 7.5 && message.data <= 7.8){
      content = 'Normal';     
      document.getElementById("ph").innerHTML = content; 
    }else if (message.data > 8){
      content = 'Tinggi';      
      document.getElementById("ph").innerHTML = content; 
    }
});