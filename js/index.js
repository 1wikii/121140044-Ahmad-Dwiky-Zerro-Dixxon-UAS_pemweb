// Membuat variabel untuk mengubah isi main sesuai sidebar
let h1 = document.getElementById('h1-main');
let content = document.getElementById('content-main');

// Membuat fungsi untuk menghandle sidebar ketika di klik
// Sistemnya sama dengan listener event hanya saja listeningnya berada pada HTML onclick()
function menuItemClicked(id){
   let menuItem = document.getElementById(id);
   let menuItemData = document.getElementById('menu-item-data');
   let menuItemFormulir = document.getElementById('menu-item-formulir');

   menuItemData.classList.remove('active');   // untuk reset setiap klik
   menuItemFormulir.classList.remove('active');

   menuItem.classList.add('active');  // mengubah warna saat klik

}


function authClicked(id){
   if(id == 'sign-in'){
      window.location.href = './signin.php';
   }
   else{
      window.location.href = './login.php';
   }

   // pindah ke logout.php untuk menghapus session
   if(id == 'log-out'){ 
      window.location.href = './logout.php';
   }
}