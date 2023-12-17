<?php

require_once './config/fetch.php';

// memulai session
session_start();

if( isset($_SESSION['username']) ){  // cek session yang ada

   $session_username = $_SESSION['username'];
   $isLoggedIn = true;

 }
 else{
   echo "<script> alert('Anda harus login terlebih dahulu!'); </script>";
   echo "<script> window.location.href = './login.php'; </script>";
 }

?>

<?php 

if ( isset($_POST['submit']) ){  

   $nim = $_POST['nim'];
   $nama = $_POST['nama'];
   $prodi = $_POST['prodi'];
   $jenis_kelamin = $_POST['jenis_kelamin'];
   $tanggal_lahir = $_POST['tanggal_lahir'];
   $alamat = $_POST['alamat']; 


   $account = new FETCH();
    
   $verif = $account->pushData($nim, $nama, $prodi, $jenis_kelamin, $tanggal_lahir, $alamat);

   if( $verif == 'akun-sudah-ada'){
      echo "<script> alert('Nim sudah terpakai!'); </script>";

   }

   else {

      // Validation 
      if( $verif == 'berhasil' ){ 
  
         echo "<script> alert('Data berhasil disimpan!'); </script>";
         echo "<script> window.location.href = './data.php'; </script>";

      }
      else{
         echo "<script> alert('Simpan data gagal!'); </script>";
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
            <h1 id="h1-main"> Formulir </h1>
         </header>

         <main id="content-main">

            <form id="form" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
               <h1>Formulir</h1>

                  <label>NIM</label>
                  <input id="nim" name="nim" type="text" required> 

                  <label>Nama</label>
                  <input id="nama" name="nama" type="text" required> 

                  <label>Program Studi</label>
                  <input id="prodi" name="prodi" type="text" required> 

                  <label>Jenis Kelamin</label>
                  <select id="jenis_kelamin" name="jenis_kelamin" type="text" required>
                     <option value="" selected disabled></option>
                     <option value="Laki-Laki">Laki-Laki</option>
                     <option value="Perempuan">Perempuan</option>
                  </select>

                  <label>Tanggal Lahir</label>
                  <input id="tanggal_lahir" name="tanggal_lahir" type="date" required> 

                  <label>Alamat</label>
                  <input id="alamat" name="alamat" type="text" required>

                  <input class="button" name="submit" type="submit" value="Simpan"></input>

            </form>

         </main>
      </section>

   </div>


<script src="./js/index.js"></script>
   
</body>



</html>







