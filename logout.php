<?php 

session_start();


// Menghapus cookie di sisi server dengan mengisikan durasi timer menjadi minus
setcookie("user", $_SESSION['username'], time() - 3600, "/");

// unset semua variabel session yang ada saat ini
session_unset();

// menghapus session
session_destroy();



header("Location: ./login.php");  // kembali ke halaman login
exit;
?>