<?php
    
  $infoPage = pathinfo( __FILE__ );
  $page = $infoPage['filename'];  

  include('../index_function.php');

  if (isset($_GET['out'])) {
    deleteSessionOrder();
  }

?>

<!DOCTYPE html>
<html> 
  <head>
    <title>Ayo Nikah Official Website</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>

    <!--
    untuk css peringtan ngisi form pertanyaan
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <style>
      .khususAboutCard{
        padding-left:2%;
      }

      .starReview{
        color:#FFDF00; 
        font-size:12px;
      }
    </style>
  </head>
  <body>

    <!-- Navbar (sit on top) -->
    <div class="w3-top">
      <div id="menu1" class="w3-bar w3-black w3-large w3-opacity-min w3-padding w3-card">
        <a href="../index.php" class="w3-bar-item w3-button"><b>Mari</b> Nikah</a>
        <!-- Float links to the right. Hide them on small screens -->
        <div class="w3-right">
          <a href="../index.php#projects" class="w3-bar-item w3-button w3-hide-small">Layanan Kami</a>
          <a href="#contact" class="w3-bar-item w3-button w3-hide-small">Hubungi Kami</a>
          <?php
            if(isset($_SESSION['user'])){
              echo "<a href=\"../member/member.php\" class=\"w3-bar-item w3-button w3-border-right w3-hide-small\">".$_SESSION['user']."</a>
                  <a href=\"layanan_venue.php?out='1'\" class=\"w3-bar-item w3-button w3-hide-small\">Log Out</a>";
            }else{
              echo"<a onclick=\"login()\" 
              class=\"w3-bar-item w3-button w3-hide-small\">Log In/Register</a>";
            }
          ?>
          <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right 
            w3-hide-large w3-hide-medium" onclick="myFunction()"><i id="openMenu" class="fas fa-bars"></i></a>
        </div>

        <div id="demo" class="w3-bar-block w3-hide w3-hide-large w3-hide-medium">
          <a href="../index.php" class="w3-bar-item w3-button">Layanan Kami</a>
          <a href="#contact" class="w3-bar-item w3-button">Hubungi Kami</a>
          <?php
            if(isset($_SESSION['user'])){
                echo "<a href=\"../member/member.php\" class=\"w3-bar-item w3-button w3-border-right \">".$_SESSION['user']."</a>
                    <a href=\"layanan_venue.php?out='1'\" class=\"w3-bar-item w3-button \">Log Out</a>";
            }else{
                echo"<a onclick=\"login()\" 
                class=\"w3-bar-item w3-button\">Log In/Register</a>";
            }
          ?>
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"></a>
        </div>
      </div>
    </div>

            <!--cari cara masukin login ke file js-->

    <div id="login_modal" class="w3-modal">
        <div class="w3-modal-content w3-animate-top w3-card-4">
            <header class="w3-container w3-black w3-center"> 
                <span onclick="document.getElementById('login_modal').style.display='none'" 
                    class="w3-button w3-display-topright"><i class="fas fa-times" style="font-size:25px;"></i></span>
                <h2>Login</h2>
            </header>
            <div class="w3-container w3-padding">

                <div id="alert" class="w3-panel w3-red w3-display-container w3-hide">
                    <span onclick="this.parentElement.style.display='none'"
                    class="w3-button w3-large w3-display-topright"><i class="fas fa-times" style="font-size:25px;"></i></span>
                    <h3>Username dan password tidak cocok!</h3>
                    <p>Mohon masukkan username dan password yang sesuai serta karater alphanumeric.</p>
                </div>

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

    <!-- Page content -->
    <div class="w3-content w3-padding" style="max-width:1564px">

      <div id="orderSegmen">
        <div class="w3-container w3-padding-32">
          <h3 class="w3-border-bottom w3-center w3-border-light-grey w3-padding-16">Pesanan Anda</h3>
        </div>

        <div class="w3-row-padding" id="pesanan">
           <?php         
              tampilanOrder();             
           ?> 
        </div>

        <div class="w3-padding w3-center">
          <button class="w3-button w3-black" onclick="window.location.href = '../member/member.php';">Check Out</button> 
        </div>
                    
        <div class=" w3-center">
          <input id="tombolTampil" type="button" class="w3-button w3-black" 
            onclick="sembunyikan()" value="Sembunyikan Pesanan" />
        </div>
        
      </div>

      <?php
        if(isset($_SESSION['user'])){
          echo "<script language='javascript' type='text/JavaScript'>    
                  document.getElementById('orderSegmen').style.display='block';
                </script>"; 
        }else{
          echo "<script language='javascript' type='text/JavaScript'>  
                  document.getElementById('orderSegmen').style.display='none';
                </script>";
        }
      
      ?>

      <!-- Project Section -->
      <div class="w3-container w3-padding-32" id="projects">
        <h3 class="w3-border-bottom w3-center w3-border-light-grey w3-padding-16">Venue Kami Di Kota Surabaya</h3>
      </div>

      <div class="w3-row-padding">

        <?php
            if(isset($_SESSION['daftar_venue'])){
                foreach($_SESSION['daftar_venue'] as $info_item){
                    echo 
                    "<div class=\"w3-col l3 m6 w3-margin-bottom\">
                      <div class=\"w3-display-container w3-border\">
                        <img src=\"../".$info_item['path_gambar']."\" alt=\"venue\" style=\"width:100%\">
                        <div class=\"w3-padding\">
                          <h6>".$info_item['nama']."</h6>
                          ".getStarReview($info_item['bintang'])."
                          <span>(review ".$info_item['total_review'].")</span><br />
                          <span>Kapasitas: ".$info_item['kapasitas']." orang</span>
          
                          <div class=\"w3-center w3-padding-16\">
                              <a href=\"layanan_venue.php?input_venue=".$info_item['id']."\" class=\"w3-button w3-black\" style=\"width:65%;\" >Masukan</a>
                          </div>
          
                        </div>
                      </div>
                    </div>";                                       
                }
            }else{
                echo "<div style=\"text-align:center;\">Tidak Ada Data</div>";
            }
        ?>

        <!--
        <div class="w3-col l3 m6 w3-margin-bottom">
          <div class="w3-display-container w3-border">
              <img src="../gambar/venue/venue_1.jpeg" alt="venue" style="width:100%">
              <div class="w3-padding">
                <h6>Le Grandeur Mangga Dua Surabaya</h6>
                <span class="fas fa-star" style="color:#FFDF00; font-size:12px;"></span>
                <span class="fas fa-star" style="color:#FFDF00; font-size:12px;"></span>
                <span class="fas fa-star" style="color:#FFDF00; font-size:12px;"></span>
                <span class="fas fa-star" style="color:#FFDF00; font-size:12px;"></span>
                <span class="fas fa-star-half-alt" style="color:#FFDF00; font-size:12px;"></span>
                <span>(review 10)</span><br />
                <span>Kapasitas: 175 orang</span>

                <div class="w3-center w3-padding-16">
                  <form method="post" action="">
                    <button class="w3-button w3-black" style="width:65%;" name="btn_venue_1" 
                      type="submit">Masukan</button>
                  </form>
                </div>

              </div>
          </div>
        </div>
        <div class="w3-col l3 m6 w3-margin-bottom">
          <div class="w3-display-container w3-border">
              <img src="../gambar/venue/venue_2.jpg" alt="venue" style="width:100%">
              <div class="w3-padding">
                <h6>Thamrin Nine Ballroom Menur</h6>
                <span class="fas fa-star" style="color:#FFDF00; font-size:12px;"></span>
                <span class="fas fa-star" style="color:#FFDF00; font-size:12px;"></span>
                <span class="fas fa-star" style="color:#FFDF00; font-size:12px;"></span>
                <span class="fas fa-star" style="color:#FFDF00; font-size:12px;"></span>
                <span class="far fa-star" style="color:#FFDF00; font-size:12px;"></span>
                <span>(review 15)</span><br />
                <span>Kapasitas: 120 orang</span>
              </div>

              <div class="w3-center w3-padding-16">
                <form method="post" action="">
                  <button class="w3-button w3-black" style="width:65%;" name="btn_venue_2" 
                    type="submit">Masukan</button>
                </form>
              </div>
          </div>
        </div>
        <div class="w3-col l3 m6 w3-margin-bottom">
          <div class="w3-display-container w3-border">
              <img src="../gambar/venue/venue_3.jpg" alt="venue" style="width:100%">
              <div class="w3-padding">
                <h6>Skenoo Hall Emporium Dukuh Kupang</h6>
                <span class="fas fa-star" style="color:#FFDF00; font-size:12px;"></span>
                <span class="fas fa-star" style="color:#FFDF00; font-size:12px;"></span>
                <span class="fas fa-star" style="color:#FFDF00; font-size:12px;"></span>
                <span class="fas fa-star-half-alt" style="color:#FFDF00; font-size:12px;"></span>
                <span class="far fa-star" style="color:#FFDF00; font-size:12px;"></span>
                <span>(review 6)</span><br />
                <span>Kapasitas: 100 orang</span>
              </div>
              <div class="w3-center w3-padding-16">
                <form method="post" action="">
                  <button class="w3-button w3-black" style="width:65%;" name="btn_venue_3" 
                    type="submit">Masukan</button>
                </form>
              </div>
          </div>
        </div>
        <div class="w3-col l3 m6 w3-margin-bottom">
          <div class="w3-display-container w3-border">
              <img src="../gambar/venue/venue_4.jpg" alt="venue" style="width:100%">
              <div class="w3-padding">
                <h6>The Ritz-Carlton Gubeng</h6>
                <span class="fas fa-star" style="color:#FFDF00; font-size:12px;"></span>
                <span class="fas fa-star" style="color:#FFDF00; font-size:12px;"></span>
                <span class="fas fa-star" style="color:#FFDF00; font-size:12px;"></span>
                <span class="far fa-star" style="color:#FFDF00; font-size:12px;"></span>
                <span class="far fa-star" style="color:#FFDF00; font-size:12px;"></span>
                <span>(review 9)</span><br />
                <span>Kapasitas: 155 orang</span>
              </div>
              <div class="w3-center w3-padding-16">
                <form method="post" action="">
                  <button class="w3-button w3-black" style="width:65%;" name="btn_venue_4" 
                    type="submit">Masukan</button>
                </form>
              </div>
          </div>
        </div>
        -->

      </div>
      
      <!--
      <div class="w3-row-padding">
        <div class="w3-col l3 m6 w3-margin-bottom">
          <div class="w3-display-container w3-border">
              <img src="../gambar/venue/venue_5.jpg" alt="venue" style="width:100%" />
              <div class="w3-padding">
                <h6>House Of Blessing Pakuwon</h6>
                <span class="fas fa-star" style="color:#FFDF00; font-size:12px;"></span>
                <span class="fas fa-star" style="color:#FFDF00; font-size:12px;"></span>
                <span class="fas fa-star" style="color:#FFDF00; font-size:12px;"></span>
                <span class="far fa-star" style="color:#FFDF00; font-size:12px;"></span>
                <span class="far fa-star" style="color:#FFDF00; font-size:12px;"></span>
                <span>(review 4)</span><br />
                <span>Kapasitas: 90 orang</span>
              </div>
              <div class="w3-center w3-padding-16">
                <form method="post" action="">
                  <button class="w3-button w3-black" style="width:65%;" name="btn_venue_5" 
                    type="submit">Masukan</button>
                </form>
              </div>
          </div>
        </div>
        <div class="w3-col l3 m6 w3-margin-bottom">
          <div class="w3-display-container w3-border">
              <img src="../gambar/venue/venue_6.jpg" alt="venue" style="width:100%" />
              <div class="w3-padding">
                <h6>Thamrin Nine Ballroom Menur</h6>
                <span class="far fa-star" style="color:#FFDF00; font-size:12px;"></span>
                <span class="far fa-star" style="color:#FFDF00; font-size:12px;"></span>
                <span class="far fa-star" style="color:#FFDF00; font-size:12px;"></span>
                <span class="far fa-star" style="color:#FFDF00; font-size:12px;"></span>
                <span class="far fa-star" style="color:#FFDF00; font-size:12px;"></span>
                <span>(review 0)</span><br />
                <span>Kapasitas: 105 orang</span>
              </div>
              <div class="w3-center w3-padding-16">
                <form method="post" action="">
                  <button class="w3-button w3-black" style="width:65%;" name="btn_venue_6" 
                    type="submit">Masukan</button>
                </form>
              </div>
          </div>
        </div>
        <div class="w3-col l3 m6 w3-margin-bottom">
          <div class="w3-display-container w3-border">
                <img src="../gambar/venue/venue_7.jpg" alt="venue" style="width:100%" />
              <div class="w3-padding">
                <h6>Batavia Sunda Kelapa Sidoarjo</h6>
                <span class="fas fa-star" style="color:#FFDF00; font-size:12px;"></span>
                <span class="fas fa-star" style="color:#FFDF00; font-size:12px;"></span>
                <span class="fas fa-star" style="color:#FFDF00; font-size:12px;"></span>
                <span class="fas fa-star-half-alt" style="color:#FFDF00; font-size:12px;"></span>
                <span class="far fa-star" style="color:#FFDF00; font-size:12px;"></span>
                <span>(review 13)</span><br />
                <span>Kapasitas: 110 orang</span>
              </div>
              <div class="w3-center w3-padding-16">
                <form method="post" action="">
                  <button class="w3-button w3-black" style="width:65%;" name="btn_venue_7" 
                    type="submit">Masukan</button>
                </form>
              </div>
          </div>
        </div>
        <div class="w3-col l3 m6 w3-margin-bottom">
          <div class="w3-display-container w3-border">
              <img src="../gambar/venue/venue_8.jpg" alt="venue" style="width:100%" />
              <div class="w3-padding">
                <h6>The Allwynn Grand Tanjung</h6>
                <span class="fas fa-star" style="color:#FFDF00; font-size:12px;"></span>
                <span class="fas fa-star" style="color:#FFDF00; font-size:12px;"></span>
                <span class="fas fa-star" style="color:#FFDF00; font-size:12px;"></span>
                <span class="far fa-star" style="color:#FFDF00; font-size:12px;"></span>
                <span class="far fa-star" style="color:#FFDF00; font-size:12px;"></span>
                <span>(review 1)</span><br />
                <span>Kapasitas: 200 orang</span>
              </div>
              <div class="w3-center w3-padding-16">
                <form method="post" action="">
                  <button class="w3-button w3-black" style="width:65%;" name="btn_venue_8" 
                    type="submit">Masukan</button>
                </form>
              </div>
          </div>
        </div>
      </div>
     

      <div class="w3-row-padding">
        <div class="w3-col l3 m6 w3-margin-bottom">
          <div class="w3-display-container w3-border">
              <img src="../gambar/venue/venue_9.jpg" alt="venue" style="width:100%" />
              <div class="w3-padding">
                <h6>Sampoerna Strategic Square Perak</h6>
                <span class="fas fa-star" style="color:#FFDF00; font-size:12px;"></span>
                <span class="fas fa-star" style="color:#FFDF00; font-size:12px;"></span>
                <span class="fas fa-star" style="color:#FFDF00; font-size:12px;"></span>
                <span class="fas fa-star" style="color:#FFDF00; font-size:12px;"></span>
                <span class="fas fa-star-half-alt" style="color:#FFDF00; font-size:12px;"></span>
                <span>(review 5)</span><br />
                <span>Kapasitas: 125 orang</span>
              </div>
              <div class="w3-center w3-padding-16">
                <form method="post" action="">
                  <button class="w3-button w3-black" style="width:65%;" name="btn_venue_9" 
                    type="submit">Masukan</button>
                </form>
              </div>
          </div>
        </div>
      </div>
       --->

      <!-- Contact Section -->
      <div class="w3-container w3-padding-32" id="contact">
        <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">Hubungi Kami</h3>

        <div class="w3-row">
          <!-- dibawah dikasi container buat ngasi padding ke masing2 kolum, klo nggak nentuin m5 l5 
          maka gak mau responsive-->
          <div class="w3-col w3-container m6 l6 w3-border-right">
            <p>Ayo <i>tanya</i> agar mimpi pernikahan anda semakin nyata.</p>
            <div id="alert1" class="w3-panel w3-red w3-display-container w3-round">
              <p><strong>Tolong!</strong> Isi dengan benar, dengan huruf alphanumeric.</p>
            </div>
            <?php
              //alasan makek php karena klo makek php cumna di bagian form actionnya aja acces denied
              echo "<form action=\"".$page_terkirim."\" method=\"post\">
                      <input class=\"w3-input w3-border\" type=\"text\" id=\"nameID\" 
                        placeholder=\"Nama Anda\" required name=\"Name\" />
                      <input class=\"w3-input w3-section w3-border\" id=\"emailID\" type=\"text\" 
                        placeholder=\"Email\" required name=\"Email\" />
                      <input class=\"w3-input w3-section w3-border\" id=\"mesID\" type=\"text\" 
                        placeholder=\"Pertanyaan\" required name=\"Comment\" />
                      <button class=\"w3-button w3-black w3-section\" onclick=\"checkFirst()\" 
                        type=\"submit\"/>KIRIM</button>
                    </form>";
            ?>
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

      var alert = document.getElementById('alert1');
      alert.style.display = 'none';

      function checkFirst(){
        var name = checkName();
        var email = checkEmail();
        var message = checkMessage();

        if(name === true && email === true && message === true){

        }else{
            alert.style.display = 'block';
        }
      }

      function checkName(){
        var name = document.getElementById('nameID');

        if(name.value !== '' && name.value.match(/[A-Za-z0-9]/g)){                
            $(document).ready(function(){
                $("#nameID").removeClass('border-danger');
                $("#nameID").addClass('border-success');
            });
            return true; 
        }else{
            $(document).ready(function(){
                $("#nameID").removeClass('border-success');
                $("#nameID").addClass('border-danger');  
            });
            return false;
        }
      }

      function checkEmail(){
          var mail = document.getElementById('emailID');

          if(!(mail.value === "") && (mail.value.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/))){
              $(document).ready(function(){
                  $("#emailID").removeClass('border-danger');
                  $("#emailID").addClass('border-success');
              });
              return true;
          }else{
              $(document).ready(function(){
                  $("#emailID").removeClass('border-success');
                  $("#emailID").addClass('border-danger');
              });
              return false;
          }
      }

      function checkMessage(){
          var message = document.getElementById('mesID'); 
          //nanti tambahan gimana caranya ngefilter karakter2 lain selain alphanumeric
          if(message.value !== '' && message.value.match(/[A-Za-z0-9]/g)){                
              $(document).ready(function(){
                  $("#mesID").removeClass('border-danger');
                  $("#mesID").addClass('border-success');
              });
              return true; 
          }else{
              $(document).ready(function(){
                  $("#mesID").removeClass('border-success');
                  $("#mesID").addClass('border-danger');  
              });
              return false;
          }
      }

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

      function sembunyikan(){
        var x = document.getElementById('pesanan');
        var z = document.getElementById('tombolTampil');

        if (x.className.indexOf("w3-hide") == -1) {
          x.className += " w3-hide";
          document.getElementById('tombolTampil').value = "Tampilkan Pesanan";
        }else { 
          x.className = x.className.replace("w3-hide", "");
          z.value ="Sembunyikan Pesanan";
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
