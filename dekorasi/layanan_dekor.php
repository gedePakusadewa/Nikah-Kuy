<?php
    
  include('../index_function.php');

  if (isset($_GET['out'])) {
      unset($_SESSION['user']);
      header("Location: layanan_dekor.php");
      exit();
  }

?>

<!DOCTYPE html>
<html> 
  <head>
    <title>Ayo Nikah Official Website</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
        <a href="../index.php" class="w3-bar-item w3-button"><b>Mari</b> Nikah</a>
        <!-- Float links to the right. Hide them on small screens -->
        <div class="w3-right">
          <a href="../index.php#projects" class="w3-bar-item w3-button w3-hide-small">Layanan Kami</a>
          <a href="#contact" class="w3-bar-item w3-button w3-hide-small">Hubungi Kami</a>
          <?php
            if(isset($_SESSION['user'])){
              echo "<a href=\"../member/member.php\" class=\"w3-bar-item w3-button w3-border-right w3-hide-small\">".$_SESSION['user']."</a>
                  <a href=\"layanan_dekor.php?out='1'\" class=\"w3-bar-item w3-button w3-hide-small\">Log Out</a>";
            }else{
              echo"<a onclick=\"login()\" 
              class=\"w3-bar-item w3-button w3-hide-small\">Log In/Register</a>";
            }
          ?>
          <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right 
            w3-hide-large w3-hide-medium" onclick="myFunction()"><i id="openMenu" class="fas fa-bars"></i></a>
        </div>

        <div id="demo" class="w3-bar-block w3-hide w3-hide-large w3-hide-medium">
          <a href="../index.php/index.php" class="w3-bar-item w3-button">Layanan Kami</a>
          <a href="#contact" class="w3-bar-item w3-button">Hubungi Kami</a>
          <?php
            if(isset($_SESSION['user'])){
                echo "<a href=\"../member/member.php\" class=\"w3-bar-item w3-button w3-border-right \">".$_SESSION['user']."</a>
                    <a href=\"layanan_dekor.php?out='1'\" class=\"w3-bar-item w3-button \">Log Out</a>";
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

        <div class="w3-row-padding" id="pesanan1">
            <div class="w3-col l3 m6 w3-margin-bottom">
                <div class="w3-display-container w3-border">
                <?php
                  if(isset($_SESSION['layanan_venue'])){
                    echo "<img src=\"".$_SESSION['layanan_venue']['gambar']."\" alt=\"House\" style=\"width:100%\">";
                  }else{
                    echo "<img src=\"../gambar/pesanan_kosong/venue.jpg\" alt=\"House\" style=\"width:100%\">";
                  } 
                ?>

                <div class="w3-padding">
                  <?php
                    if(isset($_SESSION['layanan_venue'])){
                      echo "<h6>".$_SESSION['layanan_venue']['nama']."</h6>";
                    }else{
                      echo "<h6>~~~~~~~~~~~~~~</h6>";
                    }       
                  ?>
                  <div class="w3-center w3-padding-16">
                    <form method="post" action="">
                      <?php
                        if(isset($_SESSION['layanan_venue'])){
                          echo "<button class=\"w3-button w3-black\" style=\"width:65%;\" name=\"hapus_venue\" 
                            type=\"submit\">Hapus</button>";
                        }else{
                          echo "<button class=\"w3-button w3-black\" style=\"width:65%;\" name=\"hapus_venue\" 
                            type=\"submit\" disabled >Hapus</button>";
                        }        
                      ?>
                    </form>
                  </div>
                </div>
                
                </div>
            </div>
            <div class="w3-col l3 m6 w3-margin-bottom">
                <div class="w3-display-container w3-border">
                    <?php
                    if(isset($_SESSION['layanan_food'])){
                        echo "<img src=\"".$_SESSION['layanan_food']['gambar']."\" alt=\"food\" style=\"width:100%\">";
                    }else{
                        echo "<img src=\"../gambar/pesanan_kosong/Food_Beverage.jpg\" alt=\"food\" style=\"width:100%\">";
                    } 
                    ?>

                    <div class="w3-padding">
                    <?php
                        if(isset($_SESSION['layanan_food'])){
                        echo "<h6>".$_SESSION['layanan_food']['nama']."</h6>";
                        }else{
                        echo "<h6>~~~~~~~~~~~~~~</h6>";
                        }       
                    ?>
                    <div class="w3-center w3-padding-16">
                        <form method="post" action="">
                        <?php
                            if(isset($_SESSION['layanan_food'])){
                            echo "<button class=\"w3-button w3-black\" style=\"width:65%;\" name=\"hapus_food\" 
                                type=\"submit\">Hapus</button>";
                            }else{
                            echo "<button class=\"w3-button w3-black\" style=\"width:65%;\" name=\"hapus_food\" 
                                type=\"submit\" disabled >Hapus</button>";
                            }        
                        ?>
                        </form>
                    </div>
                    </div>
                    
                </div>
            </div>
            <div class="w3-col l3 m6 w3-margin-bottom">
                <div class="w3-display-container w3-border">
                    <?php
                    if(isset($_SESSION['layanan_dres'])){
                        echo "<img src=\"".$_SESSION['layanan_dres']['gambar']."\" alt=\"dres\" style=\"width:100%\" />";
                    }else{
                        echo "<img src=\"../gambar/pesanan_kosong/dress_accessories.jpg\" alt=\"dres\" style=\"width:100%\" />";
                    } 
                    ?>

                    <div class="w3-padding">
                    <?php
                        if(isset($_SESSION['layanan_dres'])){
                        echo "<h6>".$_SESSION['layanan_dres']['nama']."</h6>";
                        }else{
                        echo "<h6>~~~~~~~~~~~~~~</h6>";
                        }       
                    ?>
                    <div class="w3-center w3-padding-16">
                        <form method="post" action="">
                        <?php
                            if(isset($_SESSION['layanan_dres'])){
                            echo "<button class=\"w3-button w3-black\" style=\"width:65%;\" name=\"hapus_dres\" 
                                type=\"submit\">Hapus</button>";
                            }else{
                            echo "<button class=\"w3-button w3-black\" style=\"width:65%;\" name=\"hapus_dres\" 
                                type=\"submit\" disabled >Hapus</button>";
                            }        
                        ?>
                        </form>
                    </div>
                    </div>
                    
                </div>
            </div>
            <div class="w3-col l3 m6 w3-margin-bottom">
                <div class="w3-display-container w3-border">
                  <?php
                    if(isset($_SESSION['layanan_undangan'])){
                        echo "<img src=\"".$_SESSION['layanan_undangan']['gambar']."\" alt=\"dres\" style=\"width:100%\" />";
                    }else{
                        echo "<img src=\"../gambar/pesanan_kosong/undangan.jpg\" alt=\"dres\" style=\"width:100%\" />";
                    } 
                  ?>

                    <div class="w3-padding">
                    <?php
                        if(isset($_SESSION['layanan_undangan'])){
                        echo "<h6>".$_SESSION['layanan_undangan']['nama']."</h6>";
                        }else{
                        echo "<h6>~~~~~~~~~~~~~~</h6>";
                        }       
                    ?>
                    <div class="w3-center w3-padding-16">
                        <form method="post" action="">
                        <?php
                            if(isset($_SESSION['layanan_undangan'])){
                            echo "<button class=\"w3-button w3-black\" style=\"width:65%;\" name=\"hapus_undangan\" 
                                type=\"submit\">Hapus</button>";
                            }else{
                            echo "<button class=\"w3-button w3-black\" style=\"width:65%;\" name=\"hapus_undangan\" 
                                type=\"submit\" disabled >Hapus</button>";
                            }        
                        ?>
                        </form>
                    </div>
                    </div>
                    
                </div>
            </div>
        </div>

        <div class="w3-row-padding" id="pesanan2">
          
          <div class="w3-col l3 m6 w3-margin-bottom">
                <div class="w3-display-container w3-border">
                  <?php
                    if(isset($_SESSION['layanan_dekorasi'])){
                        echo "<img src=\"".$_SESSION['layanan_dekorasi']['gambar']."\" alt=\"dekorasi\" style=\"width:100%\" />";
                    }else{
                        echo "<img src=\"../gambar/pesanan_kosong/dekorasi.jpg\" alt=\"dekorasi\" style=\"width:100%\" />";
                    } 
                  ?>

                    <div class="w3-padding">
                    <?php
                        if(isset($_SESSION['layanan_dekorasi'])){
                        echo "<h6>".$_SESSION['layanan_dekorasi']['nama']."</h6>";
                        }else{
                        echo "<h6>~~~~~~~~~~~~~~</h6>";
                        }       
                    ?>
                    <div class="w3-center w3-padding-16">
                        <form method="post" action="">
                        <?php
                            if(isset($_SESSION['layanan_dekorasi'])){
                            echo "<button class=\"w3-button w3-black\" style=\"width:65%;\" name=\"hapus_dekorasi\" 
                                type=\"submit\">Hapus</button>";
                            }else{
                            echo "<button class=\"w3-button w3-black\" style=\"width:65%;\" name=\"hapus_dekorasi\" 
                                type=\"submit\" disabled >Hapus</button>";
                            }        
                        ?>
                        </form>
                    </div>
                    </div>
                    
                </div>
          </div>
          <div class="w3-col l3 m6 w3-margin-bottom">
                <div class="w3-display-container w3-border">
                  <?php
                    if(isset($_SESSION['layanan_poto_video'])){
                        echo "<img src=\"".$_SESSION['layanan_poto_video']['gambar']."\" alt=\"poto_video\" style=\"width:100%\" />";
                    }else{
                        echo "<img src=\"../gambar/pesanan_kosong/photo_video.jpg\" alt=\"poto_video\" style=\"width:100%\" />";
                    } 
                  ?>

                    <div class="w3-padding">
                    <?php
                        if(isset($_SESSION['layanan_poto_video'])){
                        echo "<h6>".$_SESSION['layanan_poto_video']['nama']."</h6>";
                        }else{
                        echo "<h6>~~~~~~~~~~~~~~</h6>";
                        }       
                    ?>
                    <div class="w3-center w3-padding-16">
                        <form method="post" action="">
                        <?php
                            if(isset($_SESSION['layanan_poto_video'])){
                            echo "<button class=\"w3-button w3-black\" style=\"width:65%;\" name=\"hapus_poto_video\" 
                                type=\"submit\">Hapus</button>";
                            }else{
                            echo "<button class=\"w3-button w3-black\" style=\"width:65%;\" name=\"hapus_poto_video\" 
                                type=\"submit\" disabled >Hapus</button>";
                            }        
                        ?>
                        </form>
                    </div>
                    </div>
                    
                </div>
          </div>
          <div class="w3-col l3 m6 w3-margin-bottom">
                <div class="w3-display-container w3-border">
                  <?php
                    if(isset($_SESSION['layanan_entertainment'])){
                        echo "<img src=\"".$_SESSION['layanan_entertainment']['gambar']."\" alt=\"entertainment\" style=\"width:100%\" />";
                    }else{
                        echo "<img src=\"../gambar/pesanan_kosong/enter.jpg\" alt=\"entertainment\" style=\"width:100%\" />";
                    } 
                  ?>

                    <div class="w3-padding">
                    <?php
                        if(isset($_SESSION['layanan_entertainment'])){
                        echo "<h6>".$_SESSION['layanan_entertainment']['nama']."</h6>";
                        }else{
                        echo "<h6>~~~~~~~~~~~~~~</h6>";
                        }       
                    ?>
                    <div class="w3-center w3-padding-16">
                        <form method="post" action="">
                        <?php
                            if(isset($_SESSION['layanan_entertainment'])){
                            echo "<button class=\"w3-button w3-black\" style=\"width:65%;\" name=\"hapus_entertainment\" 
                                type=\"submit\">Hapus</button>";
                            }else{
                            echo "<button class=\"w3-button w3-black\" style=\"width:65%;\" name=\"hapus_entertainment\" 
                                type=\"submit\" disabled >Hapus</button>";
                            }        
                        ?>
                        </form>
                    </div>
                    </div>
                    
                </div>
          </div>
          <div class="w3-col l3 m6 w3-margin-bottom">
                <div class="w3-display-container w3-border">
                  <?php
                    if(isset($_SESSION['layanan_honeymoon'])){
                        echo "<img src=\"".$_SESSION['layanan_honeymoon']['gambar']."\" alt=\"honeymoon\" style=\"width:100%\" />";
                    }else{
                        echo "<img src=\"../gambar/pesanan_kosong/honeymoon.jpg\" alt=\"honeymoon\" style=\"width:100%\" />";
                    } 
                  ?>

                    <div class="w3-padding">
                    <?php
                        if(isset($_SESSION['layanan_honeymoon'])){
                        echo "<h6>".$_SESSION['layanan_honeymoon']['nama']."</h6>";
                        }else{
                        echo "<h6>~~~~~~~~~~~~~~</h6>";
                        }       
                    ?>
                    <div class="w3-center w3-padding-16">
                        <form method="post" action="">
                        <?php
                            if(isset($_SESSION['layanan_honeymoon'])){
                            echo "<button class=\"w3-button w3-black\" style=\"width:65%;\" name=\"hapus_honeymoon\" 
                                type=\"submit\">Hapus</button>";
                            }else{
                            echo "<button class=\"w3-button w3-black\" style=\"width:65%;\" name=\"hapus_honeymoon\" 
                                type=\"submit\" disabled >Hapus</button>";
                            }        
                        ?>
                        </form>
                    </div>
                    </div>
                    
                </div>
          </div>
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

      <!-- vendor Section -->
      <div class="w3-container w3-padding-32" id="projects">
        <h3 class="w3-border-bottom w3-center w3-border-light-grey w3-padding-16">
            Vendor Dekorasi Kami Di Surabaya</h3>
      </div>

      <div class="w3-row-padding" id="vendor_dres">
        <div class="w3-col l3 m6 w3-margin-bottom">
          <div class="w3-display-container w3-border">
              <img src="../gambar/dekorasi/dekor_1.jpg" alt="dekor" style="width:100%" />
              <div class="w3-padding">
                <h6>Olive Branch Decoration</h6>
                <span class="fas fa-star" style="color:#FFDF00; font-size:12px;"></span>
                <span class="far fa-star" style="color:#FFDF00; font-size:12px;"></span>
                <span class="far fa-star" style="color:#FFDF00; font-size:12px;"></span>
                <span class="far fa-star" style="color:#FFDF00; font-size:12px;"></span>
                <span class="far fa-star" style="color:#FFDF00; font-size:12px;"></span>
                <span>(review 3)</span><br />

                <div class="w3-center w3-padding-16">
                  <form method="post" action="">
                    <button class="w3-button w3-black" style="width:65%;" name="btn_dekorasi_1" 
                      type="submit">Masukan</button>
                  </form>
                </div>

              </div>
          </div>
        </div>
        <div class="w3-col l3 m6 w3-margin-bottom">
          <div class="w3-display-container w3-border">
              <img src="../gambar/dekorasi/dekor_2.jpeg" alt="dekor" style="width:100%" />
              <div class="w3-padding">
                <h6>Angela Florist & Decoration</h6>
                <span class="fas fa-star" style="color:#FFDF00; font-size:12px;"></span>
                <span class="fas fa-star" style="color:#FFDF00; font-size:12px;"></span>
                <span class="far fa-star" style="color:#FFDF00; font-size:12px;"></span>
                <span class="far fa-star" style="color:#FFDF00; font-size:12px;"></span>
                <span class="far fa-star" style="color:#FFDF00; font-size:12px;"></span>
                <span>(review 7)</span><br />
              </div>

              <div class="w3-center w3-padding-16">
                <form method="post" action="">
                  <button class="w3-button w3-black" style="width:65%;" name="btn_dekorasi_2" 
                    type="submit">Masukan</button>
                </form>
              </div>
          </div>
        </div>
        <div class="w3-col l3 m6 w3-margin-bottom">
          <div class="w3-display-container w3-border">
              <img src="../gambar/dekorasi/dekor_3.jpg" alt="dekor" style="width:100%" />
              <div class="w3-padding">
                <h6>Joelle Decoration</h6>
                <span class="fas fa-star" style="color:#FFDF00; font-size:12px;"></span>
                <span class="fas fa-star" style="color:#FFDF00; font-size:12px;"></span>
                <span class="far fa-star" style="color:#FFDF00; font-size:12px;"></span>
                <span class="far fa-star" style="color:#FFDF00; font-size:12px;"></span>
                <span class="far fa-star" style="color:#FFDF00; font-size:12px;"></span>
                <span>(review 11)</span><br />
              </div>
              <div class="w3-center w3-padding-16">
                <form method="post" action="">
                  <button class="w3-button w3-black" style="width:65%;" name="btn_dekorasi_3" 
                    type="submit">Masukan</button>
                </form>
              </div>
          </div>
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

    </div>
    <!-- End page content -->

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

      function sembunyikan(){
        var x = document.getElementById("pesanan1");
        var y = document.getElementById('pesanan2');
        var z = document.getElementById('tombolTampil');

        if (x.className.indexOf("w3-hide") == -1) {
            x.className += " w3-hide";
            y.className += " w3-hide";
            document.getElementById('tombolTampil').value = "Tampilkan Pesanan";
        } else { 
            x.className = x.className.replace("w3-hide", "");
            y.className = y.className.replace("w3-hide", "");
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
