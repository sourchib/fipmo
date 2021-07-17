var text = document.getElementById('text');
var socket = io.connect('47.254.248.173:8885');
socket.on('data', function(message) {
text.innerHTML = message.data;
var content;
var img = "";
if (message.data <= 1900) {
        content = 'Hujan'; 
        img = "/framework/assets/yes.gif"
	document.getElementById("gambar-cuaca").src = img;	
        document.getElementById("air").innerHTML = content;  
    }else{
      content = 'Tidak hujan';    
     img = "/framework/assets/no.gif"  
document.getElementById("gambar-cuaca").src = img;
      document.getElementById("air").innerHTML = content; 
    }
});
