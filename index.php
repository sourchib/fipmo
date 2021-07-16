<?php 
session_start();
include("login/koneksi.php");
if (isset($_GET["login"])) {
  $login = $_GET["login"];
  if ($login == "konfirmasi-login") {
    include("login/konfirmasilogin.php");
  } else if ($login == "keluar") {
    include("login/keluar.php");    
  } else if ($login == "konfirmasi-daftar") {
    include("login/konfirmasidaftar.php");  
  }
} ?>
  <?php
  //cek ada get include 
  if (isset($_GET["login"])) {
    $include = $_GET["login"];
    //cek apakah ada session id admin 
    if (isset($_SESSION['username'])) { ?>
            <?php
            if ($include == "login") {
              include("login/login.php");
            } else {
              include("index.php");
            }
            ?>
    <?php
    } else {
      //pemanggilan halaman form login 
      include("login/login.php");
    }
  } else {
    if (isset($_SESSION['username'])) {
      //pemanggilan ke halaman-halaman profil jika ada session 
    ?>
            <?php
            //pemanggilan profil 
            include("saklar/saklar.php");
            ?>
  <?php } else {
      //pemanggilan halaman form login
      include("login/login.php");
    }
  } ?>
