<?php
//menyertakan file program koneksi.php pada register
require('koneksi.php');
//inisialisasi session
//session_start();
$error = '';
$validate = '';
// $valid ='';
//mengecek apakah form registrasi di submit atau tidak
if( isset($_POST['daftar']) ){   
        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $password1 = $_POST['password1'];
        $alamat_rumah = $_POST['alamat_rumah'];
        $alamat_kolam = $_POST['alamat_kolam'];
        $panjang = $_POST['panjang'];
        $lebar = $_POST['lebar'];
        $tinggi = $_POST['tinggi'];
        //cek apakah nilai yang diinputkan pada form ada yang kosong atau tidak
        if(!empty(trim($nama))&& 
        !empty(trim($username))&& 
        !empty(trim($password1))&&
        !empty(trim($alamat_rumah))&& 
        !empty(trim($alamat_kolam))&& 
        !empty(trim($panjang))&& 
        !empty(trim($lebar))&& 
        !empty(trim($tinggi))){
            if((preg_match('/^[0-9]*$/', $tinggi && $panjang && $lebar))){
                //memanggil method cek_nama untuk mengecek apakah user sudah terdaftar atau belum
                if( cek_nama($username,$koneksi) == 0 ){
                    //hashing password sebelum disimpan didatabase

                    //insert data ke database
                    $query = "INSERT INTO `user`(`id_user`, `nama`, `username`, `password`, `password1`, `alamat_rumah`,
                    `alamat_kolam`,`panjang`, `lebar`, `tinggi`) VALUES (
                        NULL,'$nama','$username','','$password1','$alamat_rumah','$alamat_kolam','$panjang',
                        '$lebar','$tinggi')";
                    $result   = mysqli_query($koneksi, $query);
                    //jika insert data berhasil maka akan diredirect ke halaman index.php serta menyimpan data username ke session
                    if ($result) {
                        $_SESSION['username'] = $username;                        
                        header('Location: /fipmo/login/keluar.php ');            
                    //jika gagal maka akan menampilkan pesan error
                    } else {
                        $error =  'Daftar akun baru gagal !!';
                    }
                }else{
                        $error =  'Username sudah terdaftar !!';
                }
        }else{
            $error = 'Masukan data dengan benarrr !!';
        }                
                if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
                    $error =  'Masukan data dengan benar !!';
                }      
                  
        }else {
            $error =  'Data tidak boleh kosong !!';
        }
        
    } 
    //fungsi untuk mengecek username apakah sudah terdaftar atau belum
    function cek_nama($username,$koneksi){
        $nama = mysqli_real_escape_string($koneksi, $username);
        $query = "SELECT * FROM user WHERE username = '$nama'";
        if( $result = mysqli_query($koneksi, $query) ) return mysqli_num_rows($result);
    }
?>