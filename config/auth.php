<?php

require_once './config/database.php';

class AUTH extends DATABASE{
      
   // User Attribute
   private $username;
   private $email;
   private $password;

   public function __construct($_username=NULL, $_email, $_password){
      $this->username = $_username;
      $this->email = $_email;
      $this->password = $_password;

      $this->getConnection();    // membuat koneksi 
   }


   public function LOGIN(){ 
      

      // query untuk cek email dan password apakah sesuai dengan yang ada di database
      $query2 = "SELECT username, email, password FROM users_auth WHERE email = '$this->email';";
      $result = mysqli_query($this->conn, $query2);

      // Periksa hasil query
      if (!$result) {
         die("Query gagal: " . mysqli_error($this->conn));
      }

      // periksa apakah ada data yang cocok
      if (mysqli_num_rows($result) > 0) { 
         
         // menyimpan data  
         while ($row = mysqli_fetch_assoc($result)) {
            $username = $row['username'];
            $email = $row['email'];
            $password = $row['password'];
         }
     }
     else{
      
      return 'akun-tidak-ditemukan';
     }


     $status = array( "status" => false,"username" => null);  // variabel status untuk menentukan status validasi

     // mencocokan email dan password
     if($this->email == $email && $this->password == $password){
         $status['status'] = true;
         $status['username'] = $username;
         return $status;
      }


      // Tutup koneksi
      mysqli_close($this->conn);

     return $status;
   
   }


   public function SIGNIN(){

      // query untuk cek apakah email ada atau tidak di database
      $query1 = "SELECT * FROM users_auth WHERE email = '$this->email'";
      $result = mysqli_query($this->conn, $query1);

      // Periksa hasil query
      if (!$result) {
         die("Query gagal: " . mysqli_error($this->conn));
      }
      
      // mencari email apakah sudah dipakai untuk daftar
      if(mysqli_num_rows($result) >= 1 ){
         return 'akun-sudah-ada';
      }




      $browser = $_SERVER['HTTP_USER_AGENT'];   // mengambil jenis browser yang disimpan di variabel global
      $ip_pengguna = $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['REMOTE_ADDR'];  // menggunakan X_FORWARDED_FOR jika jaringan sekarang berada dalam proxy

      // menambah data di database
      $query2 = "INSERT INTO users_auth(username, email, password, jenis_browser, ip_pengguna)
                  VALUES ('$this->username', '$this->email', '$this->password','$browser','$ip_pengguna')";
      $result = mysqli_query($this->conn, $query2);

      // Periksa hasil query
      if (!$result) {
         die("Query gagal: " . mysqli_error($this->conn));
      }

      // Tutup koneksi
      mysqli_close($this->conn);

      
      return 'berhasil';

   }
}
