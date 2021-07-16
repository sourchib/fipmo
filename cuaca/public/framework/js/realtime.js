var text = document.getElementById('text');
var socket = io.connect('47.254.248.173:8885');
socket.on('data', function(message) {
text.innerHTML = message.data;
var content;
var img = "";
if (message.data <= 1900) {
        content = 'Hujan'; 
        img = "../assets/hujan.gif"
        document.getElementById("air").innerHTML = content;  
    }else{
      content = 'Tidak hujan';    
      img = "../assets/tidak_hujan.gif"  
      document.getElementById("air").innerHTML = content; 
    }
});