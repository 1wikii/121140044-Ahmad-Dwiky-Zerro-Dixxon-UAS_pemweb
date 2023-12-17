> [!NOTE]
> Aplikasi website yang saya buat kali ini bernama `DATABASE` yang dapat melakukan user authetication dan menyimpan data dalam database mysql 
-
-
-
-


# Bagian 1: Client-side Programming (Bobot: 30%)

![image](https://github.com/1wikii/121140044-Ahmad-Dwiky-Zerro-Dixxon-UAS_pemweb/assets/92775985/dd534734-9a1e-41ea-9a58-ecd84c26aa13)
![image](https://github.com/1wikii/121140044-Ahmad-Dwiky-Zerro-Dixxon-UAS_pemweb/assets/92775985/c4bd62c1-82d0-498e-b45f-5164e47cef12)


*  Pada formulir dan formulir sign in pada gambar diatas saya menggunakan setidaknya 5 jenis input tag yaitu :
*  Teks
*  Email
*  Password
*  Checkbox


![image](https://github.com/1wikii/121140044-Ahmad-Dwiky-Zerro-Dixxon-UAS_pemweb/assets/92775985/3117f4d6-1d4c-4048-aca4-44e7f8bfe925)
![image](https://github.com/1wikii/121140044-Ahmad-Dwiky-Zerro-Dixxon-UAS_pemweb/assets/92775985/8995da8d-2518-497b-a2e6-c99897069362)


*  data yang ditampilkan di table merupakan data dari inputan user pada formulir yang disimpan ke database kemudian diambil menggunakan command mysqli
*  Pada OPP menggunakan method fetchData untuk mengambil data dari database mysql kemudian memasakuukan data ke dalam file JSON lokal agar dapat diakses oleh Javascript client

![image](https://github.com/1wikii/121140044-Ahmad-Dwiky-Zerro-Dixxon-UAS_pemweb/assets/92775985/d6902bf3-7ded-4fd4-9995-c85c63a6f0a2)

*  Event Javascript yang saya gunakan kali ini bukannya listener click menggunakan JS tetapi menggunakan attribure onclick() pada HTML
*  Fungsi pertama berfungsi untuk menambahkan class pada CSS agar active saat diklik
*  Fungsi kedua ada evenet handler untuk berpindah page dengan JS

-
# Bagian 2: Server-side Programming (Bobot: 30%)
-

![image](https://github.com/1wikii/121140044-Ahmad-Dwiky-Zerro-Dixxon-UAS_pemweb/assets/92775985/08af4d18-6eb7-410a-bd78-b41b7f8c7da6)

*  Pada form HTML menggunakan method POST agar data yang dikirim bersifat rahasia dikarena sensitif terkait dengan user auth
*  Melakukan parsing data dari form input menjadi variable PHP yang akan digunakan untuk dimasukan ke dalam database
*  Object pada gambar diatas adalah $account yang berarti akun untuk melakukan fetch data dengan method pushData pada class FETCH()

-
# Bagian 3: Database Management (Bobot: 20%)
-

![image](https://github.com/1wikii/121140044-Ahmad-Dwiky-Zerro-Dixxon-UAS_pemweb/assets/92775985/e8c85e71-b49c-4913-ae1f-5c91c5b904a4)
![image](https://github.com/1wikii/121140044-Ahmad-Dwiky-Zerro-Dixxon-UAS_pemweb/assets/92775985/5fd43c35-2646-4aad-b073-7560fadc6271)
![image](https://github.com/1wikii/121140044-Ahmad-Dwiky-Zerro-Dixxon-UAS_pemweb/assets/92775985/d0e659f4-2461-47bf-8ff9-6ee85bebde65)



*  saya menggunakan APACHE server dan MYSQL server yang disediakan oleh XAMPP, saya membuat tabel menggunan phpmyadmin melalui website resmi
*  saya membuat satu database bernama `users_uas` dan dua tabel `users_auth` untuk menyimpan data user yang melakukan sign in dan `users_data` untuk menyimpan data formulir mahasiswa
*  saya membuat class khusus bernama `DATABASE` untuk hanya melakukan koneksi ke database kemudian koneksi tersebut akan dipakai oleh child-childnya menggunakan konsep `inheritance`
*  menyimpan jenis browser dan ip pengguna juga pada gambar ketiga

-
# Bagian 4: State Management (Bobot: 20%)
-

![image](https://github.com/1wikii/121140044-Ahmad-Dwiky-Zerro-Dixxon-UAS_pemweb/assets/92775985/e0945646-4f46-4e1e-bf56-d948c821ffb6)
![image](https://github.com/1wikii/121140044-Ahmad-Dwiky-Zerro-Dixxon-UAS_pemweb/assets/92775985/a9d7e79e-faf2-4c77-9013-cf6d745b9d8a)
![image](https://github.com/1wikii/121140044-Ahmad-Dwiky-Zerro-Dixxon-UAS_pemweb/assets/92775985/c93f3e74-6491-4945-aa27-0781068beab0)



*  membuat session ketika user berhasil login seperti kode pada gambar diatas tak hanya session saya juga membuat cookie untuk menyinpan data user pada periode waktu 10800 detik atau 3 jam masa berlaku
*  menghapus session dan cookie ketika user melakukan logout
*  saya menggunakan Jquery untuk pengganti JS sebagai manipulator DOM, menggunakan Jquery jauh lebih praktis dan mudah juga dapat mencakup banyak event maupun permasalahan
*  pada kode diatas saya menggunakan `AJAX` `JQUERY` untuk membaca file lokal JSON yang berisi data yang diambil dari database kemudian menampilaknnya ke dalam tabel


-
# Bagian Bonus: Hosting Aplikasi Web (Bobot: 20%)
-

![image](https://github.com/1wikii/121140044-Ahmad-Dwiky-Zerro-Dixxon-UAS_pemweb/assets/92775985/38e7ceea-33a2-48ef-8be5-6ebe5dd102e2)


* saya menggunakan website  `infinityfree` sebagai provider hosting gratis kali ini
* hal-hal yang diperlukan yaitu pasti kode program, akun infinityfree, free SSL, dan Cname record karena hosting gratis ini menggunakan sub-domain dari website lain yang sudah tersedia pada website ini
*  `infinityfree` sangat cocok untuk saya dikarena interface `Cpanel` yang sangat mudah dimengerti dan tentunya website ini menyediakan SSL gratis
*  saya menggunakan password yang cukup rumit kemudian menggunakan SSL yang gratis tapi terpercaya
*  Konfigurasi server yang saya pakai Cpanel yang disediakan website menggunakan sistem operasi ubuntu sehingga masih terdapat htdocs dan gttaccess kemudian untuk konfigurasi firewall saya menggunakan SSL gratis, menggunakan database mysql mungkin hanya itu saja untuk konfigurasi server pada website saya.
