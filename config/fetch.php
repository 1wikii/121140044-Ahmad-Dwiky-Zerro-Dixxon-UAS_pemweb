<?php

require_once './config/database.php';


class FETCH extends DATABASE{

   public function __construct(){
      
      $this->getConnection();    // membuat koneksi 

   }

   public function pushData($_nim, $_nama, $_prodi, $_jenis_kelamin, $_tanggal_lahir, $_alamat){

      // query untuk cek apakah data ada atau tidak di database
      $query1 = "SELECT * FROM users_data WHERE nim = '$_nim'";
      $result = mysqli_query($this->conn, $query1);

      // Periksa hasil query
      if (!$result) {
         die("Query gagal: " . mysqli_error($this->conn));
      }
      
      // memeriksa hasil fetch data apakah nim sudah dipakai untuk daftar
      if(mysqli_num_rows($result) >= 1 ){ 
         return 'akun-sudah-ada';
      }


      $browser = $_SERVER['HTTP_USER_AGENT'];   // mengambil jenis browser yang disimpan di variabel global
      $ip_pengguna = $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['REMOTE_ADDR'];  // menggunakan X_FORWARDED_FOR jika jaringan sekarang berada dalam proxy

      // menambah data di database
      $query2 = "INSERT INTO users_data(nim, nama, prodi, jenis_kelamin, tanggal_lahir, alamat,jenis_browser, ip_pengguna)
                  VALUES ('$_nim', '$_nama', '$_prodi', '$_jenis_kelamin', '$_tanggal_lahir', '$_alamat','$browser','$ip_pengguna')";
      $result = mysqli_query($this->conn, $query2);

      // Periksa hasil query
      if (!$result) {
         die("Query gagal: " . mysqli_error($this->conn));
      }

      // Tutup koneksi
      mysqli_close($this->conn);

      return 'berhasil';
   }


   public function fetchData(){
      
      // query untuk cek apakah data ada atau tidak di database
      $query1 = "SELECT nim, nama, prodi, jenis_kelamin, tanggal_lahir, alamat,jenis_browser, ip_pengguna 
                  FROM users_data";
      $result = mysqli_query($this->conn, $query1);

      $data = array();
      while ($row = mysqli_fetch_assoc($result)) {
         $data[] = $row;
      }

      // Menyimpan data ke dalam file JSON lokal
      $jsonFilePath = './data.json';
      file_put_contents($jsonFilePath, json_encode($data));

      // echo "<script> window.location.href = './data.php'; </script>";


   }
}