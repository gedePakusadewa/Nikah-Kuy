<?php
    
    include('index_function.php');

    if (isset($_GET['out'])) {
        unset($_SESSION['user']);
        header("Location: login.php");
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
            .registerLink:link {
                text-decoration: none;
            }

            .registerLink:visited {
                text-decoration: none;
            }

            .registerLink:hover {
                text-decoration: none;
            }

            .registerLink:active {
                text-decoration: none;
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
                    echo "<a href=\"member.php\" class=\"w3-bar-item w3-button w3-border-right w3-hide-small\">".$_SESSION['user']."</a>
                        <a href=\"login.php?out='1'\" class=\"w3-bar-item w3-button w3-hide-small\">Log Out</a>";
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
                    echo "<a href=\"member.php\" class=\"w3-bar-item w3-button w3-border-right \">".$_SESSION['user']."</a>
                        <a href=\"login.php?out='1'\" class=\"w3-bar-item w3-button \">Log Out</a>";
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

                <br /><br /><br />
    <div class="w3-padding w3-center" id="tesbutton">
                <button  onclick="tes()">tes</button>
      </div>

                <?php
                if(isset()){

                }
                ?>
    <script>


        function SetUserName()
        {
            var userName = "ulala";
            '<?php $_SESSION["tes"] = "' + userName + '"; ?>';
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
