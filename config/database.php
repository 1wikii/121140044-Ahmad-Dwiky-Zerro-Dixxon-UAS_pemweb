<?php

class DATABASE{
   private $host = 'localhost';
   private $DB_name = 'users_uas';
   private $DB_username = 'root';
   private $DB_password = '';
   private $table_name = '';
      public $conn;

   // method untuk membuat koneksi
   public function getConnection(){

      // Membuat koneksi dengan database mysql
      $this->conn = mysqli_connect($this->host, $this->DB_username, $this->DB_password, $this->DB_name);

      // cek koneksi apakah gagal 
      if (!$this->conn) {
         die("Koneksi database gagal : " . mysqli_connect_error());
     }
   }
}