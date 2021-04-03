<?php
    
  include('index_function.php');

  if (isset($_GET['out'])) {
    deleteSessionOrder();
  }

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Nikah Yuk Official Website</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <style>
      .khususAboutCard{
        padding-left:2%;
      }
    </style>
  </head>
<body>

<!-- Navbar (sit on top) -->
  <div class="w3-top">
    <div id="menu1" class="w3-bar w3-black w3-large w3-opacity-min w3-padding w3-card">
      <a href="index.php#home" class="w3-bar-item w3-button"><b>Nikah</b> Yuk</a>
      <!-- Float links to the right. Hide them on small screens -->
      <div class="w3-right">
        <a href="index.php#projects" class="w3-bar-item w3-button w3-hide-small">Layanan Kami</a>
        <a href="index.php#paket" class="w3-bar-item w3-button w3-hide-small">Paket Kami</a>
        <a href="index.php#about" class="w3-bar-item w3-button w3-hide-small">Team Kami</a>
        <a href="index.php#contact" class="w3-bar-item w3-button w3-hide-small">Hubungi Kami</a>
        <?php
          if(isset($_SESSION['user'])){
            echo "<a href=\"member/member.php\" class=\"w3-bar-item w3-button w3-border-right w3-hide-small\">".$_SESSION['user']."</a>
                <a href=\"index.php?out='1'\" class=\"w3-bar-item w3-button w3-hide-small\">Log Out</a>";
          }else{
            echo"<a onclick=\"login()\" 
            class=\"w3-bar-item w3-button w3-hide-small\">Log In/Register</a>";
          }
        ?>
        <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right 
          w3-hide-large w3-hide-medium" onclick="myFunction()"><i id="openMenu" class="fas fa-bars"></i></a>
      </div>

      <div id="demo" class="w3-bar-block w3-hide w3-hide-large w3-hide-medium">
        <a href="index.php#projects" class="w3-bar-item w3-button">Layanan Kami</a>
        <a href="index.php#paket" class="w3-bar-item w3-button">Paket Kami</a>
        <a href="index.php#about" class="w3-bar-item w3-button">Team Kami</a>
        <a href="index.php#contact" class="w3-bar-item w3-button">Hubungi Kami</a>
        <?php
          if(isset($_SESSION['user'])){
            echo "<a href=\"member/member.php\" class=\"w3-bar-item w3-button w3-border-right\">".$_SESSION['user']."</a>
                <a href=\"index.php?out='1'\" class=\"w3-bar-item w3-button\">Log Out</a>";
          }else{
            echo"<a onclick=\"login()\" 
            class=\"w3-bar-item w3-button\">Log In/Register</a>";
          }
        ?>
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"></a>
      </div>
    </div>
  </div>

  <div id="login_modal" class="w3-modal">
      <div class="w3-modal-content w3-animate-top w3-card-4">
          <header class="w3-container w3-black w3-center"> 
              <span onclick="document.getElementById('login_modal').style.display='none'" 
                  class="w3-button w3-display-topright"><i class="fas fa-times" style="font-size:25px;"></i></span>
              <h2>Login</h2>
          </header>
          <div class="w3-container w3-padding">
              <form action="" method="post" id ="form1">
                  <input class="w3-input w3-border" id="username1" type="text" placeholder="Username" name="username" />
                  <input class="w3-input w3-section w3-border" id="password1" type="password" placeholder="Password" name="password" />
                  <button class="w3-button w3-black w3-section" name="login_btn" type="submit">Masuk</button>
              </form>
          </div>
          <footer class="w3-container w3-black">
              <p>Belum punya akun? Silahkan <a onclick="register()" class="registerLink w3-text-blue"><b>register</b></a> dulu.</p>
          </footer>
      </div>
  </div>

  <div id="register_modal" class="w3-modal">
      <div class="w3-modal-content w3-animate-top w3-card-4">
          <header class="w3-container w3-black w3-center"> 
              <span onclick="document.getElementById('register_modal').style.display='none'" 
                  class="w3-button w3-display-topright"><i class="fas fa-times" style="font-size:25px;"></i></span>
              <h2>Register</h2>
          </header>
          <div class="w3-container w3-padding">
              <form action="" method="post">
                  <input class="w3-input w3-border" type="text" placeholder="Username" required name="username" />
                  <input class="w3-input w3-section w3-border" type="text" placeholder="Email" required name="email" />
                  <input class="w3-input w3-section w3-border" type="text" placeholder="Nomor Gawai" required name="nohp" />
                  <input class="w3-input w3-section w3-border" type="password" placeholder="Password" required name="password" />
                  <button class="w3-button w3-black w3-section" name="regis_btn" type="submit">Daftar</button>
              </form>
          </div>
          <footer class="w3-container w3-black">
              <p>Sudah punya akun? Silahkan <a onclick="login()" class="registerLink w3-text-blue"><b>Log In</b></a> dulu.</p>
          </footer>
      </div>
  </div>

<!-- Header -->
  <header class="w3-display-container w3-content w3-wide" style="max-width:1500px;" id="home">
    <img class="w3-image" src="gambar/homepage.jpg" alt="Architecture" width="1500" height="800">
    <div class="w3-display-middle w3-margin-top w3-center">
      <h1 class="w3-text-white w3-round-large w3-padding w3-black w3-opacity-min" 
        style="font-size:3vw;"><b>Kami Siap Membantu</b></h1>
    </div>
  </header>

  <!-- Page content -->
  <div class="w3-content w3-padding" style="max-width:1564px">

    <!-- Project Section -->
    <div class="w3-container w3-padding-32" id="projects">
      <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">Layanan Kami</h3>
    </div>

    <div class="w3-row-padding">
      <div class="w3-col l3 m6 w3-margin-bottom">
        <div class="w3-display-container">
          <div class="w3-display-topleft w3-black w3-padding">Venue</div>
            <a href="gedung/layanan_venue.php">
              <img src="gambar/venue/venue_1.jpeg" alt="House" style="width:100%">
            </a>
        </div>
      </div>
      <div class="w3-col l3 m6 w3-margin-bottom">
        <div class="w3-display-container">      
          <div class="w3-display-topleft w3-black w3-padding">Food & Beverage</div>
            <a href="food/layanan_food.php">
              <img src="gambar/layanan_catering.jpg" alt="House" style="width:100%" />
            </a>
        </div>
      </div>
      <div class="w3-col l3 m6 w3-margin-bottom">
        <div class="w3-display-container">
          <div class="w3-display-topleft w3-black w3-padding">Invation & Gift </div>
            <a href="undangan/layanan_undangan.php">
              <img src="gambar/layanan_undangan.jpg" alt="House" style="width:100%" />
            </a>
        </div>
      </div>
      <div class="w3-col l3 m6 w3-margin-bottom">
        <div class="w3-display-container">
          <div class="w3-display-topleft w3-black w3-padding">Dress & Accessories</div>
            <a href="dres/layanan_dres.php">
              <img src="gambar/layanan_pakaian.jpg" alt="House" style="width:100%" />
            </a>
        </div>
      </div>
    </div>

    <div class="w3-row-padding">
      <div class="w3-col l3 m6 w3-margin-bottom">
        <div class="w3-display-container">
          <div class="w3-display-topleft w3-black w3-padding">Dekorasi</div>
            <a href="dekorasi/layanan_dekor.php">
              <img src="gambar/dekorasi/dekor_4.jpg" alt="House" style="width:100%">
            </a>
        </div>
      </div>
      <div class="w3-col l3 m6 w3-margin-bottom">
        <div class="w3-display-container">
          <div class="w3-display-topleft w3-black w3-padding">Photo & Video</div>
            <a href="poto_video/layanan_poto.php">
              <img src="gambar/layanan_Photo_Video.jpg" alt="House" style="width:100%" />
            </a>
        </div>
      </div>
      
      <div class="w3-col l3 m6 w3-margin-bottom">
        <div class="w3-display-container">
          <div class="w3-display-topleft w3-black w3-padding">Entertainment</div>
            <a href="entertaiment/layanan_entertainment.php">
              <img src="gambar/layanan_enter.jpg" alt="House" style="width:100%" />
            </a>
        </div>
      </div>
      <div class="w3-col l3 m6 w3-margin-bottom">
        <div class="w3-display-container">
          <div class="w3-display-topleft w3-black w3-padding">Honeymoon</div>
            <a href="honeymoon/layanan_honeymoon.php">
              <img src="gambar/layanan_Honeymoon.jpg" alt="House" style="width:100%" />
            </a>
        </div>
      </div>
    </div>

    <div class="w3-container w3-padding-32" id="paket">
      <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">Paket Pernikahan Kami</h3>
    </div>

    <div class="w3-row-padding" >
        <div class="w3-quarter w3-margin-bottom">
          <ul class="w3-ul w3-border w3-white w3-center">
            <li class="w3-xlarge w3-padding-32" style="background-color:#d6af36;">Bronze</li>
            <li class="w3-padding-16">Gedung : tema tertentu, indoor, tidak ada outdoor</li>
            <li class="w3-padding-16">Catering : 2 menu Appetizers, 7 menu Maincourse, 2 menu Dessert</li>
            <li class="w3-padding-16">Tamu : maksimal 50 orang</li>
            <li class="w3-padding-16">Undangan : undangan media sosial, termasuk desain, tidak termasuk undangan fisik </li>
            <li class="w3-padding-16">
              <span>Harga dimulai dari</span>
              <h2>Rp. 6.000.000<span class="w3-text-red">*</span></h2>
            </li>
            <li class="w3-light-grey w3-padding-24 w3-border-left w3-border-right w3-border-bottom">
  
              <form method="post" action="paket/bronze.php">
                <button class="w3-button w3-padding-large w3-hover-black" name="btn_paket_bronze"  
                    style="background-color:#d6af36;" type="submit" >Cek Detail</button>
              </form>
            </li>
          </ul>
        </div>
        
        <div class="w3-quarter w3-margin-bottom">
          <ul class="w3-ul w3-border w3-white w3-center">
            <li class="w3-xlarge w3-padding-32" style="background-color:#c0c0c0;">Silver</li>
            <li class="w3-padding-16">Gedung : tema tertentu, indoor, outdoor</li>
            <li class="w3-padding-16">Catering : 3 menu Appetizers, 9 menu Maincourse, 3 menu Dessert</li>
            <li class="w3-padding-16">Tamu : maksimal 70 orang</li>
            <li class="w3-padding-16">Undangan : undangan media sosial, termasuk desain, tidak termasuk undangan fisik </li>
            <li class="w3-padding-16">
              <span>Harga dimulai dari</span>
              <h2>Rp. 9.000.000<span class="w3-text-red">*</span></h2>
            </li>
            <li class="w3-light-grey w3-padding-24">
              <form method="post" action="paket/silver.php">
                <button class="w3-button w3-padding-large w3-hover-black" name="btn_paket_silver"  
                    style="background-color:#c0c0c0;" type="submit" >Cek Detail</button>
              </form>
            </li>
          </ul>
        </div>
        
        <div class="w3-quarter">
          <ul class="w3-ul w3-white w3-center">
            <li class="w3-xlarge w3-padding-32 w3-border-bottom" style="background-color:#fee101;">Gold</li>
            <li class="w3-padding-16 w3-border-left w3-border-right" >Gedung : tema bebas, indoor, outdoor</li>
            <li class="w3-padding-16 w3-border-left w3-border-right">Catering : 5 menu Appetizers, 10 menu Maincourse, 5 menu Dessert</li>
            <li class="w3-padding-16 w3-border-left w3-border-right">Tamu : maksimal 100 orang</li>
            <li class="w3-padding-16 w3-border-left w3-border-right">Undangan : undangan media sosial,undangan fisik, termasuk desain </li>
            <li class="w3-padding-16 w3-border-left w3-border-right">
              <span>Harga dimulai dari</span>
              <h2>Rp. 14.000.000<span class="w3-text-red">*</span></h2>
            </li>
            <li class="w3-light-grey w3-padding-24">
              <form method="post" action="paket/gold.php">
                <button class="w3-button w3-padding-large w3-hover-black" name="btn_paket_gold"  
                    style="background-color:#fee101;" type="submit" >Cek Detail</button>
              </form>
            </li>
          </ul>
        </div>

        <div class="w3-quarter">
          <ul class="w3-ul w3-border w3-white w3-center">
            <li class=" w3-xlarge w3-padding-32" style="background-color:#d7d7d7;">Diamond</li>
            <li class="w3-padding-16">Gedung : tema bebas, indoor, outdoor</li>
            <li class="w3-padding-16">Catering : 6 menu Appetizers, 13 menu Maincourse, 6 menu Dessert</li>
            <li class="w3-padding-16">Tamu : maksimal 150 orang</li>
            <li class="w3-padding-16">Undangan : undangan media sosial,undangan fisik, termasuk desain </li>
            <li class="w3-padding-16">
              <span>Harga dimulai dari</span>
              <h2>Rp. 18.000.000<span class="w3-text-red">*</span></h2>
            </li>
            <li class="w3-light-grey w3-padding-24">
              <form method="post" action="paket/diamond.php">
                <button class="w3-button w3-padding-large w3-hover-black" name="btn_paket_diamond"  
                    style="background-color:#d7d7d7;" type="submit" >Cek Detail</button>
              </form>
            </li>
          </ul>
        </div>
        
    </div>
    
    <div class="w3-container">
      <p><span class="w3-text-red"><b>*</b></span>Harga menyesuaikan dengan permintaan anda dan harga dapat berubah sesuai situasi kondisi.</p>
    </div>
    
    <!-- About Section -->
    <div class="w3-container w3-padding-32" id="about">
      <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">Tentang Kami</h3>
      <p> Nikah Yuk merupakan sebuah perusahaan yang dirintis bersama oleh Tude, Fadhil, dan Moegi pada tahun 2018.
          Nikah Yuk berfokus pada semua hal yang terkait pernikahan kecuali mencarikan calon pengantin.
          Sejak berdiri, Nikah Yuk sudah menangani sejumlah projek pernikahan mulai dari kisaran lima juta sampai ratusan juta.
          Nikah Yuk terdiri dari sejumlah tim yang terus bertumbuh demi menunjang kreativitas layanan kami ke pelanggan.
      </p>
    </div>

    <div class="w3-row-padding w3-grayscale">
      <div class="w3-col l3 m6 w3-margin-bottom ">
        <img src="gambar/member.png" alt="John" style="width:100%">
        <h4>Tim Moegi Et al</h4>
        <p class="w3-opacity">Venue, Invitation & Gift</p>
        <p style="border-bottom:3px solid black;">Urusan Venue <i>indoor outdoor</i>, pembuatan desain, tema 
          Invitation & Gift ditangani Tim Moegi</p>
      </div>
      <div class="w3-col l3 m6 w3-margin-bottom">
        <img src="gambar/member.png" alt="Jane" style="width:100%">
        <h4>Tim Tude Et al</h4>
        <p class="w3-opacity">Dress & Accessories, Food & Beverage</p>
        <p style="border-bottom:3px solid black;">Tim Tude bertangung jawab terkait pakaian pernikahan, make-up 
          serta makanan minuman dan peralatannya</p>
      </div>
      <div class="w3-col l3 m6 w3-margin-bottom">
        <img src="gambar/member.png" alt="Mike" style="width:100%">
        <h4>Tim Fadhil Et al</h4>
        <p class="w3-opacity">Entertaiment, Dekorasi</p>
        <p style="border-bottom:3px solid black;">Tata ruang, tone ruangan serta MC dan band pengiring
          aksesoris tambahan untuk pernikahan Tim Fadhil</p>
      </div>
      <div class="w3-col l3 m6 w3-margin-bottom">
        <img src="gambar/member.png" alt="Dan" style="width:100%">
        <h4>Tim R Et al</h4>
        <p class="w3-opacity">Photo & Video, Honeymoon</p>
        <p style="border-bottom:3px solid black;">Foto video pernikahan, pencetakan foto serta semua urusan Honeymoon 
          ditangani Tim R</p>
      </div>
    </div>

    <!-- Contact Section -->
    <div class="w3-container w3-padding-32" id="contact">
      <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">Hubungi Kami</h3>
      
      <div class="w3-row">
        <!-- dibawah dikasi container buat ngasi padding ke masing2 kolum, klo nggak nentuin m5 l5 
        maka gak mau responsive-->
        <div class="w3-col w3-container m6 l6 w3-border-right">
          <p>Ayo <i>tanya</i> agar mimpi pernikahan anda semakin nyata.</p>
          <form action="/action_page.php" target="_blank">
            <input class="w3-input w3-border" type="text" placeholder="Nama Anda" required name="Name">
            <input class="w3-input w3-section w3-border" type="text" placeholder="Email" required name="Email">
            <input class="w3-input w3-section w3-border" type="text" placeholder="Pertanyaan" required name="Comment">
            <button class="w3-button w3-black w3-section" type="submit">KIRIM</button>
          </form>
        </div>

        <div class="w3-col w3-container m6 l6">
          <p> Atau <i>tanya</i> kami lewat:</p>
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
  <p>Temui Kami di Sosial Media Anda</p>
  <div>                
      <a href="http://www.youtube.com"><span class='fab fa-youtube' style="font-size:25px; color:red;"></span></a>
      <a href="http://www.instagram.com"><span class='fab fa-instagram' style="font-size:25px;"></span></a>
      <a href="http://www.facebook.com"><span class='fab fa-facebook-square' style="font-size:25px; color:#3b5998;">
        </span></a>
  </div>
  <p><span class='fa fa-copyright'> 2019</span></p>
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
