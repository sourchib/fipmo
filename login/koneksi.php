<?php
$koneksi = mysqli_connect("localhost", "root", "admin", "fipmo");
if (!$koneksi) {
    die("Error koneksi: " . mysqli_connect_errno());
}
?>
