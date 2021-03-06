<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Security-Policy" content="default-src * 'self' 'unsafe-inline' 'unsafe-eval' data: gap: content:">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, viewport-fit=cover">
  <meta name="theme-color" content="#007aff">
  <meta name="format-detection" content="telephone=no">
  <meta name="msapplication-tap-highlight" content="no">
  <title>fipmo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
  <link rel="apple-touch-icon" href="framework/assets/icons/app.png">
  <link rel="icon" href="framework/assets/icons/favicon.png">  
  <link rel="stylesheet" href="framework/framework7/framework7-bundle.min.css">
  <link rel="stylesheet" href="framework/css/icons.css">
  <link rel="stylesheet" href="framework/css/app.css">
  <link rel="stylesheet" href="framework/css/styles.css"> 
  <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>  -->
  <?php include("konfirmasidaftar.php"); ?>
</head>
<body>
  <div id="app">    
    <!-- Your main view, should have "view-main" class -->
    <div class="view view-main view-init safe-areas">       
      <div class="page">
        <div class="block grid-resizable-demo">          
                <!-- Reponsive Center Atas --><br><br><br><br>
                <div class="row resizable" style="height: 50%; min-height: 50px">
                  <div class="col demo-col-center-content" style="height: 100%">                   
                      <!-- icon FIPMO -->
                       <div style="text-align:center;">
                          <img width="60%" src="framework/assets/2login/fipmo.png"
                           class="rounded mx-auto d-block" alt="icon"/>
                        </div><br><br><br>
                        <!-- <div class="login_container"> -->
                        <h4 class="layout_container">Login to your Account </h4>              
                          <form action="login/konfirmasilogin.php" method="POST">
                            <div class="list" style="top: -15px;"> 
                              <ul>
                                <li class="item-content item-input item-input-outline">
                                  <div class="item-inner">
                                    <!-- <div class="item-title item-label">Username</div> -->
                                    <div class="item-input-wrap">
                                      <input type="text" name="username" placeholder="Your username" />
                                    </div>
                                  </div>
                                </li>
                                <li class="item-content item-input item-input-outline ">
                                  <div class="item-inner">
                                    <!-- <div class="item-title item-label">Password</div> -->
                                    <div class="item-input-wrap ">
                                      <input type="password" name="password" placeholder="Your password" />
                                    </div>
                                  </div>
                                </li>
                                <!-- <div style="clear: both;"></div> -->
                              </ul>
                              <div style="text-align: center;">
                              <?php if (!empty($_GET['notif'])) { ?>
                                  <?php if ($_GET['notif'] == "userKosong") { ?>
                                      <span class="text-danger"> Maaf Username Tidak Boleh Kosong </span>
                                  <?php } else if ($_GET['notif'] == "passKosong") { ?>
                                      <span class="text-danger"> Maaf Password Tidak Boleh Kosong </span>
                                  <?php } else if ($_GET['notif'] == "userpassSalah"){ ?>
                                      <span class="text-danger"> Setelah Daftar, Anda Harus Konfirmasi </span>
                                  <?php } ?>
                              <?php
                              }
                              ?>
                              </div> 
                              <div class="list" >
                              <div class="button-size">
                                <ul>
                                  <li>
                                <button style="height: 50px;" type="submit" name="login" class="col button button-round button-fill" value="Masuk">
                                    Login</button>
                                  </li>
                                </ul>
                              </div>
                            </div>  
                            </div>
                            <!-- Button login -->
                              <!-- Validasi input -->
                                <div style="text-align:center; font-size:medium;">
                                  <?php if($error != ''){ ?>
                                        <span class="text-danger"> 
                                            Silahkan daftar akun kembali <br> <?= $error; ?> 
                                        </span>
                                  <?php } ?>
                                  <?php if($validate != '') {?> -->
                                      <span class="text-danger">
                                      Silahkan daftar akun kembali <br><?= $validate; ?></span>
                                  <?php }?>
                                  </div>
                                  <!-- End validase input -->
                          </form>

                          <!-- Registrasi Menu -->
                          <div class="login-screen">
                          <div class="view">
                            <div class="page">
                              <div class="login-screen-title">
                                <img width="100%" src="framework/assets/gambar/img.png" alt="navbar-registrasi">                                
                              </div>
                              <div class="position-absolute layout_container" 
                              style="color: white; padding-top: 6%;">    
                                <h5>Silahkan,</h5>
                                <h3>Daftar akun</h3>
                              </div>
                              <div class="page-content login-screen-content">
                                <form method="POST" action="index.php" enctype="multipart/form-data">
                                  <div class="list">

                                    <ul>
                                      <li class="item-content item-input item-input-outline">
                                            <div class="item-inner">
                                              <div class="item-title item-label">Nama Lengkap</div>
                                              <div class="item-input-wrap">
                                                <input type="text" name="nama" placeholder="Nama Lengkap" id="nama" value=""/>      
                                              </div>
                                            </div>
                                      </li>

                                      <li class="item-content item-input item-input-outline">
                                            <div class="item-inner">
                                              <div class="item-title item-label">Username</div>
                                              <div class="item-input-wrap">
                                                <input type="text" name="username" placeholder="Username" id="username" value=""/>
                                              </div>
                                            </div>
                                      </li>

                                      <li class="item-content item-input item-input-outline">
                                        <div class="item-inner">
                                          <div class="item-title item-label">Password</div>
                                          <div class="item-input-wrap">
                                            <input type="password" name="password1" placeholder="Password" id="password1" value=""/>
                                          </div>
                                        </div>
                                      </li>

                                      <li class="item-content item-input item-input-outline">
                                        <div class="item-inner">
                                          <div class="item-title item-label">Alamat Rumah</div>
                                          <div class="item-input-wrap">
                                            <input type="text" name="alamat_rumah" placeholder="Alamat Rumah" id="alamat_rumah" value=""/>
                                          </div>
                                        </div>
                                      </li>

                                      <li class="item-content item-input item-input-outline">
                                        <div class="item-inner">
                                          <div class="item-title item-label">Alamat Kolam</div>
                                          <div class="item-input-wrap">
                                            <input type="text" name="alamat_kolam" placeholder="Alamat Kolam" id="alamat_kolam" value=""/>
                                          </div>
                                        </div>
                                      </li>
                                      
                                        <div class="row">
                                          <div class="col resizable" style="min-width: 20px">
                                            <li class="item-content item-input item-input-outline">
                                              <div class="item-inner">
                                                <div class="item-title item-label">Panjang</div>
                                                <div class="item-input-wrap">
                                                  <input type="text" name="panjang" placeholder="CM" id="panjang" value=""/>
                                                </div>
                                              </div>
                                            </li>

                                          </div>
                                          <div class="col resizable" style="min-width: 20px">
                                            <li class="item-content item-input item-input-outline">
                                              <div class="item-inner">
                                                <div class="item-title item-label">Lebar</div>
                                                <div class="item-input-wrap">
                                                  <input type="text" name="lebar" placeholder="CM" id="lebar" value=""/>
                                                </div>
                                              </div>
                                            </li>
                                          </div>
                                          <div class="col resizable" style="min-width: 20px">
                                            <li class="item-content item-input item-input-outline">
                                              <div class="item-inner">
                                                <div class="item-title item-label">Tinggi</div>
                                                <div class="item-input-wrap">
                                                  <input type="text" name="tinggi" placeholder="CM" id="tinggi" value=""/>
                                                </div>
                                              </div>
                                            </li>
                                          </div>
                                        </div>
                                    </ul>
                                  </div>

                                  <div class="list">
                                    <div class="button-size">
                                      <ul>
                                        <li>
                                          <button type="submit" name="daftar" class="col button button-round button-fill"
                                          value="daftar">Sign Up</button>
                                        </li>
                                      </ul>
                                    </div>
                                    <div class="block-footer">                                      
                                      <p><a class="link login-screen-close" href="#">Masuk Menu Login</a></p>
                                    </div>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div> 
                        
                        <!-- End Registrasi -->

                  </div>
                </div>
        </div>
                              
        <!-- Text Footer -->
        <div class="position-absolute">
          <div class="block">
              <p class="text-footer text-center"
                style="padding-top: 125px; padding-left: 88px;">
                Belum punya akun ? 
                <a href="#" style="text-decoration: none; color:white;" 
                  class="login-screen-open" data-login-screen=".login-screen">
                <span>Sign Up</span>
                </a>
               </p>
          </div>
        </div>
        <!-- Footer Bawah -->        
        <div class="row resizable" style="height: 50%; min-height: 50px">
          <div class="col demo-col-center-content" style="height: 100%;"> 
            <img style="width: 100%; height:150px; margin-top:115px ;" src="framework/assets/2login/text-bawah.png" alt="footer">
            </div>
          </div>

      </div>                
    </div> 
  </div>

  <!-- Framework7 library -->
  <script src="framework/framework7/framework7-bundle.min.js"></script>
  <!-- App routes -->
  <script src="framework/js/routes.js"></script>
  <!-- App store -->
  <script src="framework/js/store.js"></script>
  <!-- App scripts -->
  <script src="framework/js/app.js"></script>
</body>
</html>
