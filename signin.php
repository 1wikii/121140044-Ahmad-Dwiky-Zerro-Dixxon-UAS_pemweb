<?php

require_once './config/auth.php';


// memulai session
session_start();

if( isset($_SESSION['username']) ){

   echo "<script> alert('Anda sudah memiliki akun!'); </script>";
   echo "<script> window.location.href = './index.php'; </script>";

 }



if ( isset($_POST['submit']) ){     

   
   $username = $_POST['username'];
   $email = $_POST['email'];
   $password = $_POST['password']; 


   $account = new AUTH($username, $email, $password);   // membuat objek untuk menampung dan mengolah data denga method di dalam class
   
   $verif = $account->SIGNIN();   // panggil method untuk menjalankan signin

   if($verif == 'akun-sudah-ada'){
      echo 'alert("Akun sudah ada!");';

   }
   else{

      // Validation 
      if( $verif == 'berhasil'){

         echo "<script> alert('Berhasil mendaftar akun!'); </script>";
         echo "<script> window.location.href = './login.php'; </script>";
      }
   }

   echo "<script> alert('Sign in gagal!'); </script>";
   

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
            <h1 id="h1-main"> Sign In</h1>
         </header>

         <main id="content-main">
            
            <form id="form" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
               <h1>Sign In</h1>

                  <label>Username</label>
                  <input id="username" name="username" type="text" required> 

                  <label>Email</label>
                  <input id="email" name="email" type="email" required> 

                  <label>Password</label>
                  <input id="pass" name="password" type="password" required> 

                  <input class="button" name="submit" type="submit" value="Sign In"></input>

            </form>

         </main>
      </section>

   </div>


<script src="./js/index.js"></script>
   
</body>



</html>



