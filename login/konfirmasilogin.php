<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<?php //akses file koneksi database
    include('koneksi.php');
    if (isset($_POST['login'])) {
        $user = $_POST['username'];
        $pass = $_POST['password'];
        $username = mysqli_real_escape_string($koneksi, $user);
        $password = mysqli_real_escape_string($koneksi, $pass); //cek username dan password
        $sql = "select * from `user` where `username`='$username' and `password`='$password'";
        $query = mysqli_query($koneksi, $sql);
        $jumlah = mysqli_num_rows($query);
        if (empty($user)) {
            header("Location:/fipmo/index.php?notif=userKosong");
        } else if (empty($pass)) {
            header("Location:/fipmo/index.php?notif=passKosong");
        } else if ($jumlah == 0) {
            header("Location:/fipmo/index.php?notif=userpassSalah");
        } else {
            session_start(); //get data 
            while ($data = mysqli_fetch_row($query)) {
                header("Location:../saklar/saklar.php");
            }
        }
    }
    ?>
</body>
</html>
