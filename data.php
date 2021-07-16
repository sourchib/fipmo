<?php
$conn = mysqli_connect("localhost", "root", "admin", "fipmo");
$result = mysqli_query($conn, "SELECT * FROM user");

//if($conn){
//	echo "koneksi host berhasil.<br/>";
//}else{
//	echo "koneksi gagal.<br/>";
//}

$data = array();
while ($row = mysqli_fetch_object($result))
{
    array_push($data, $row);
}
 
echo json_encode($data);
exit();
