<?php

require_once './config/auth.php';


// memulai session
session_start(); 

if( isset($_SESSION['username']) ){

   echo "<script> alert('Anda sudah login!'); </script>";
   echo "<script> window.location.href = './index.php'; </script>";

 }

?>

<?php
if ( isset($_POST['submit']) ){  
   $email = $_POST['email'];
   $password = $_POST['password']; 

   if( !empty($email) && !empty($password) ){  // cek apakah kosong atau tidak

      $account = new AUTH(null, $email, $password); // membuat objek untuk menampung dan mengolah data denga method di dalam class
      
      $verif = $account->LOGIN();     // panggil method untuk menjalankan login

      if($verif == 'akun-tidak-ditemukan'){ 
         echo "<script> alert('Akun tidak ditemukan!'); </script>";
      }
      else {

         // Validation 
         if( $verif['status'] ){ 
      
            // membuat session yang akan menyimpan username yang akan ditampilkan nanti
            $_SESSION["username"] = $verif['username'];

            // membuat cookie dengan waktu aktif 3 jam
            // Menetapkan nilai cookie menjadi username
            $username = $verif['username'];
            setcookie("user", $username, time() + 10800, "/");  // Cookie berlaku selama 3 jam

               // Memeriksa apakah cookie "user" telah diatur
               if(isset($_COOKIE["user"])) {

                  echo "<script> alert('Cookie berhasil dibuat!') </script>";
               } else {
                  echo "Cookie 'user' tidak diatur.";
               }

            echo "<script> alert('Berhasil login!'); </script>";
            echo "<script> window.location.href = './formulir.php'; </script>";
            
         }
         else{
            echo "<script> alert('Login Gagal!'); </script>";
         }
      }
   }


}

?>






<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   

   <!-- #PIN  library open source yang menyediakan icon secara instan -->
   <script src="https://kit.fontawesome.com/c2b7ee3658.js" crossorigin="anonymous"></script>

   <link rel="stylesheet" href="./style/style.css">
   <link rel="stylesheet" href="./style/sidebar.css">
   <link rel="stylesheet" href="./style/form.css">

   <link rel="shortcut icon" href="./assets/icon.png" type="image/x-icon">

   <title> Database </title>


</head>
<body>
   

    <!-- Window's Content -->
   <div class="window--content">
   
      <section id="sidebar">

         <section class="sidebar--container">
            <header id="sidebar--header">
               <a class="logo" href="./index.php" title="Home Page"> <i class="fa-solid fa-database"> <span>Database</span></i> </a>
            </header>

            <nav id="sidebar--menu">
            <ul id="menu-items">
               <li>
                  <a class="menu-item" href="./data.php" id="menu-item-data" title="data" onclick="menuItemClicked('menu-item-data')">
                  <i class="fa-solid fa-rectangle-list"></i>
                  <span class="menu-item--text">Data</span>
                  </a>
               </li>
               <li>
                  <a class="menu-item" href="./formulir.php" id="menu-item-formulir" title="Formulir" onclick="menuItemClicked('menu-item-formulir')">
                  <i class="fa-solid fa-file-export"></i>
                  <span class="menu-item--text">Formulir</span>
                  </a>
            </ul>
            </nav>

            
         <button id="sign-in" onclick="authClicked('sign-in')"> <i class="fa-solid fa-user-plus"></i> <span>Sign In</span> </button>
         <button id="log-in" onclick="authClicked('log-in')"> <i class="fa-solid fa-right-to-bracket"></i> <span>Log In</span> </button>
         </section>


      </section>

      <section id="container-main">
         <header>
            <h1 id="h1-main"> Log In</h1>
         </header>

         <main id="content-main">
            
            <form id="form" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
               <h1> Log In</h1>

                  <label>Email</label>
                  <input id="email" name="email" type="email" required> 

                  <label>Password</label>
                  <input id="pass" name="password" type="password" required> 

                  <input class="button" name="submit" type="submit" value="Log In"></input>

               <!-- </div> -->
            </form>

         </main>
      </section>

   </div>


<script src="./js/index.js"></script>

   
</body>


</html>

