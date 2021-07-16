<!DOCTYPE html>
<php? include ?>
<html>
<head>
  <meta charset="utf-8">
  <!-- <meta http-equiv="Content-Security-Policy" content="default-src * 'self' 'unsafe-inline' 'unsafe-eval' data: gap: content:"> -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, viewport-fit=cover">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
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
</head>
<body>
  <div id="app">    
    <!-- Your main view, should have "view-main" class -->
    <div class="view view-main view-init safe-areas">       
      <div class="page">	
          <div class="layout-lagout">
            <a  class="link external" href="/fipmo/login/keluar.php" style="text-decoration: none; 
            float: right; font-weight: bold;
            ">Logout</a>
            
          </div>
        <div class="block grid-resizable-demo"> 
            <!-- Reponsive Center Atas -->
            <div class="row resizable" style="height: 50%; min-height: 50px">
                <div class="col demo-col-center-content" style="height: 100%">
                    <h3>Hello Sulaiman, </h3>
                    <p style="margin-top: -8px;" >Monitoring Kolam Ikan</p>
                    <div style="color:#0083FF ;">
                        <h3>Saklar</h3>
                        <h3 style="margin-top: -8px;">Kolam</h3>
                    </div>  <br>
                    <!-- Content Fipmo -->                    
                    <div class="text-center">
                        <img width="78%" src="framework/assets/gambar/icon-air.png" alt="gambar kran air">                       
                        <div class="page-content" style="margin-top: -30px;">
                            <div class="block">
                                <div class="row">
                                
                                <div class="col-100 medium-33">
                                    <div style="float: left; padding-left: 50px;">
                                        <form action="on.php">                                       
                                            <button class="button-relay" type="submit">
                                                <img width="70%" src="framework/assets/gambar/on.png" alt="on">
                                            </button>                                        
                                        </form>
                                    </div>  
                                    
                                    <div style="float: right; padding-right: 40px; margin-top: 0px;">
                                        <form action="off.php">
                                          <button class="button-relay" type="submit">
                                            <img width="70%" src="framework/assets/gambar/off.png" alt="off">
                                           </button>
                                        </form>                                     
                                    </div>
                                </div>
                              </div>                                
                        </div>                            
                        </div>        
                      </div> 
                    <!-- End Content -->
                </div>
            </div>
        </div>

<!-- Footer Bawah -->
      <!-- Text Footer -->
        <div class="position-absolute">
          <div class="block">            
          <div class="menu-layout">
            <div class="block">
              <div class="row " style="line-height:4px;">
                <div class="col">
                  <a type="button" href="/fipmo/saklar/saklar.php" class="link external"><div class="img-saklar"></div></a>
                  <a type="button" class="text-decoration-none text-footer-img text-center text-white link external" href="/fipmo/saklar/saklar.php">Saklar</a>
                </div>
                <div class="col">
                <a type="button" href="http://47.254.248.173:8885" class="link external"><div class="img-cuaca"></div></a>
                  <a type="button" class="text-decoration-none text-footer-img text-center text-white link external" href="http://47.254.248.173:8885">Cuaca</a>
                </div>
                <div class="col">
                <a type="button" href="http://47.254.248.173:8887" class="link external"><div class="img-ph"></div></a>
                  <a type="button" class="text-decoration-none text-footer-img text-center text-white link external" href="http://47.254.248.173:8887">pH Air</a>
                </div>
                <div class="col ">
                  <a type="button" href="http://47.254.248.173:8886" class="link external"> <div class="img-kolam"></div></a>
                  <a type="button" class="text-decoration-none text-footer-img text-center text-white link external" href="http://47.254.248.173:8886">Level Air</a>
                </div>
              </div>
            </div>
          </div>
          </div>
        </div>
        <!-- Footer Bawah -->
        <div class="row resizable" style="height: 50%; min-height: 50px">
          <div class="col demo-col-center-content" style="height: 100%;"> 
            <img style="width: 100%; height: 100%; max-height: 65%; " src="framework/assets/gambar/bg-footer-layout.png" alt="footer">
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
