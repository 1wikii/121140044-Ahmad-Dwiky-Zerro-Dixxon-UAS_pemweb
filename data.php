<?php


include_once './config/fetch.php';

// memulai session
session_start();

 
if( isset($_SESSION['username']) ){    // cek apakah user sudah login atau belum

   $session_username = $_SESSION['username'];
   $isLoggedIn = true;

 }
 else{
   
   echo "<script> alert('Anda harus login terlebih dahulu!'); </script>";     // jika blm maka user harus login dahulu
   echo "<script> window.location.href = './login.php'; </script>";
 }

 // mengambil fetch data dari database
 // kemudian menyimpan ke dalan file JSON lokal
 $account = new FETCH();
 $verif = $account->fetchData();   // mengirim hasil fetch data dari database ke browser dengan format JSON


?>




<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   

   <!-- #PIN  library open source yang menyediakan icon secara instan -->
   <script src="https://kit.fontawesome.com/c2b7ee3658.js" crossorigin="anonymous"></script>

   <!-- #PIN menggunakan Jquery untuk mempermudah manipulasi DOM -->
   <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

   <link rel="stylesheet" href="./style/style.css">
   <link rel="stylesheet" href="./style/sidebar.css">
   <link rel="stylesheet" href="./style/data.css">

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

            
            <?php if( $isLoggedIn ): ?>
               <button > <i class="fa-solid fa-user-check"></i> <span> <?php echo $session_username; ?> </span> </button>
               <button id="log-in" onclick="authClicked('log-out')"> <i class="fa-solid fa-right-from-bracket"></i> <span>Log Out</span> </button>
            
            <?php else: ?>
               <button id="sign-in" onclick="authClicked('sign-in')"> <i class="fa-solid fa-user-plus"></i> <span>Sign In</span> </button>
               <button id="log-in" onclick="authClicked('log-in')"> <i class="fa-solid fa-right-to-bracket"></i> <span>Log In</span> </button>
               
            <?php endif; ?>

         </section>


      </section>

      <section id="container-main">
         <header>
            <h1> Data Mahasiswa </h1>
         </header>

         <main>

            <button id="refresh" >Refresh <i class="fa-solid fa-rotate"></i></button>
            <table id="mytable" border="1">
               <thead>
                  <tr>
                     <th>NIM</th>
                     <th>Nama</th>
                     <th>Program Studi</th>
                     <th>Jenis Kelamin</th>
                     <th>Tanggal Lahir</th>
                     <th>Alamat</th>
                     <th>Browser</th>
                     <th>Alamat IP</th>
                  </tr>
               </thead>
               <tbody>
                  
               <!-- isi data -->

               </tbody>
            </table>

         </main>
      </section>

   </div>

<script src="./js/data.js"></script>
<script src="./js/index.js"></script>
   
</body>



</html>





