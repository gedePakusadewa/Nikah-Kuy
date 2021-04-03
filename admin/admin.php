<?php
    
  include('../index_function.php');

  if (isset($_GET['out'])) {
      unset($_SESSION['admin']);
      header("Location: ../index.php");
      exit();
  }

  /*
  if(!isset($_SESSION['admin'])){
    header("Location: index.php");
    exit();
  }
  */

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Admin Nikah Yuk Official Website</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  </head>
  <body>

    <!-- Navbar (sit on top) -->
    <div class="w3-top">
      <div id="menu1" class="w3-bar w3-black w3-large w3-opacity-min w3-padding w3-card">
        <!-- Float links to the right. Hide them on small screens -->
        <div class="w3-right">
          <a href="index.php#projects" class="w3-bar-item w3-button w3-hide-small">Lihat Daftar Pengguna</a>
          <a href="index.php#paket" class="w3-bar-item w3-button w3-hide-small">Lihat Histori Pemesanan</a>
          <a href="index.php#about" class="w3-bar-item w3-button w3-hide-small">Liat Daftar Pertanyaan</a>
          <a href="index.php#contact" class="w3-bar-item w3-button w3-hide-small">Hubungi Developer</a>
          <a href="index.php#contact" class="w3-bar-item w3-button w3-hide-small">Ubah Password</a>
          <a href="admin.php?out='1'" class="w3-bar-item w3-button w3-hide-small">Log Out</a>
          <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right 
            w3-hide-large w3-hide-medium" onclick="myFunction()">Menu <i id="openMenu" class="fas fa-bars"></i></a>
        </div>

        <div id="demo" class="w3-bar-block w3-hide w3-hide-large w3-hide-medium">
          <a href="index.php#projects" class="w3-bar-item w3-button ">Lihat Daftar Pengguna</a>
          <a href="index.php#paket" class="w3-bar-item w3-button ">Lihat Histori Pemesanan</a>
          <a href="index.php#about" class="w3-bar-item w3-button ">Liat Daftar Pertanyaan</a>
          <a href="index.php#contact" class="w3-bar-item w3-button ">Hubungi Developer</a>
          <a href="index.php#contact" class="w3-bar-item w3-button ">Ubah Password</a>
          <a href="admin.php?out='1'" class="w3-bar-item w3-button ">Log Out</a>
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"></a>
        </div>
      </div>
    </div>

    <!-- Header -->
    <header class="w3-display-container w3-content w3-wide" style="max-width:1500px;" id="home">
      <img class="w3-image" src="../gambar/admin/homepage.jpg" alt="Architecture" width="1500" height="800">
      <div class="w3-display-middle w3-margin-top w3-center">
        <h1 class="w3-text-white w3-round-large w3-padding w3-black w3-opacity-min" 
          style="font-size:3vw;"><b>Admin Nikah Yuk</b></h1>
      </div>
    </header>

    <!-- Page content -->
    <div class="w3-content w3-padding" style="max-width:1564px">

      <!-- Contact Section -->
      <div class="w3-container w3-padding-32" id="contact">
        <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">Hubungi Developer</h3>
        
        <div class="w3-row">
          <!-- dibawah dikasi container buat ngasi padding ke masing2 kolum, klo nggak nentuin m5 l5 
          maka gak mau responsive-->
          <div class="w3-col w3-container m6 l6">
            <p>Ada permasalahan dengan penggunaan website atau permasalahan lain yang terkait website, 
              silahkan hubungi kami di:</p>
            <div class="w3-row">
              <div class="w3-col w3-container m1 l1">
                <a href="https://www.google.co.id/maps"><span class='fas fa-map-marked-alt' style="font-size:25px;"></span></a>
              </div>
              <div class="w3-col w3-container m11 l11">
                <span>Jalan Agung Made 90YXCD No ITC, Gubeng, Surabaya, Indonesia.</span>
              </div>
            </div>

            <div class="w3-row">
              <div class="w3-col w3-container m1 l1">
                <span class='fas fa-phone-square-alt' style="font-size:25px;"></span>
              </div>
              <div class="w3-col w3-container m11 l11">
                <span>0361-000-YYY-XXX</span>
              </div>
            </div>

            <div class="w3-row">
              <div class="w3-col w3-container m1 l1">
                <span class='fab fa-whatsapp-square' style="font-size:25px; color:#25D366;"></span>
              </div>
              <div class="w3-col w3-container m11 l11">
                <span>087-XXXX-XXXX (Mbak Nana)</span>
              </div>
            </div>
      
          </div>   
        </div>

      </div>

    <!-- End page content -->
    </div>


    <!-- Footer -->
    <footer class="w3-center w3-black w3-padding-16">
    </footer>

    <script>
      function myFunction() {
        var x = document.getElementById("demo");
        var y = document.getElementById('openMenu');
        if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
            y.className = "fas fa-times";
        } else { 
            x.className = x.className.replace("w3-show", "");
            y.className = "fas fa-bars";
        }
      }

      function closeNav() {
        var x = document.getElementById("demo");
        x.className = x.className.replace("w3-show", "");
      } 

      function login(){
            document.getElementById('login_modal').style.display='block';
            document.getElementById('register_modal').style.display='none';
        }

      function register(){
          document.getElementById('login_modal').style.display='none';
          document.getElementById('register_modal').style.display='block';

      }
    </script>

  </body>
</html>
