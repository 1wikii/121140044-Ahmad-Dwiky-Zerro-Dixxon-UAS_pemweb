
// Mengambil data dari session yang sudah dibuat ketika mengisi form
// kemudian membuat row data baru 

// Mengambil data dari server 
// menggunakan Jquery untuk membaca file JSON yang berisi data yang diambil dari database
$.ajax({
    url: './data.json',
    dataType: 'json',
    success: function(data) {

        for (let i = 0; i < data.length; i++) {

            let table = document.getElementById('mytable');
            let newRow = table.insertRow(table.rows.length);      // menghitung tr yang ada kemudian menentukan new row 

            let idx = 0;      // sebagai index cell atau td
            for (let key in data[i]) {
               
               let newTd = newRow.insertCell(idx);
               newTd.innerHTML = data[i][key];

               newTd.style.whiteSpace = "nowrap";
               newTd.style.maxHeight = "10px";
               newTd.style.maxWidth = "120px";
               newTd.style.padding = "3px 5px";
               newTd.style.overflowX = "auto";

               idx++;
            }
         }
        
    }
});




// dikarenakan <td> dibuat menggunakan Jquery maka <td> tersebut masuk dalam DOM tidak bisa 
// styling menggunakan CSS jadi harus menggunakan Jquery lainnya
// list warna


// membuat listener klik dengan Jquery
$(document).ready(function() {
   $("#refresh").on("click" , function () {
      location.reload();
   });
});




let color_0 = "hsl(50, 95%, 60%)"; 
let color_1 = "hsl(50 100% 80%)";
let color_2 = "hsl(50 100% 93%)";


$(document).ready(function() {
   $("#mytable td").css({
      "max-height": "10px",
      "max-width": "120px",
      "padding": "3px 5px",
      "white-space": "nowrap",
      "overflow-x": "auto",
      "text-align": "center",
   });
});



// let tdElements = document.getElementsByTagName("td");

// // Menambahkan gaya ke semua elemen <td>
// for (var i = 0; i < tdElements.length; i++) {
//    tdElements[i].style.maxHeight = "15px";
//    tdElements[i].style.maxWidth = "140px";
//    tdElements[i].style.padding = "2px 6px";
//    tdElements[i].style.whiteSpace = "nowrap";
//    tdElements[i].style.overflow = "auto";

//    // Customisasi scroll bar pada overflow
//    tdElements[i].style.scrollbarWidth = "4px";                 

// }





