var menu_btn = document.querySelector("#menu-btn");
var sidebar = document.querySelector("#sidebar");
var container = document.querySelector(".my-container");
var toastLiveExample = document.getElementById('liveToast');

menu_btn.addEventListener("click", () => {
  sidebar.classList.toggle("active-nav");
  container.classList.toggle("active-cont");
});

$(document).ready(function(){
  $('a[data-bs-toggle="tab"]').on('show.bs.tab', function (event) {
    localStorage.setItem('activeTab', $(event.target).attr('data-bs-target'));
  });

  var activeTab = localStorage.getItem('activeTab');
  if(activeTab){
    $('#myTab a[data-bs-target="' + activeTab + '"]').tab('show');
  }
});

$(document).ready(function() {
  $('#example').DataTable();
  $('#example2').DataTable();
  $('#example3').DataTable();
});

const desc_in = $('.desc-in').data('flashdata');
if (desc_in == "suc-in-adm") {
    Swal.fire(
      'Berhasil Melakukan Input!',
      'Admin Ditambahkan',
      'success'
    )
} else if (desc_in == "suc-ed-adm") {
    Swal.fire(
      'Berhasil Melakukan Perubahan!',
      'Data Admin Diubah',
      'success'
    )
} else if (desc_in == "suc-del-adm") {
    Swal.fire(
      'Berhasil Menghapus!',
      'Data Admin Telah Dihapus',
      'success'
    )
} else if (desc_in == "failed-log") {
    Swal.fire(
      'Gagal Melakukan Login!',
      'Email Atau Password Salah',
      'error'
    )
} else if (desc_in == "suc-in-brg") {
    Swal.fire(
      'Berhasil Menambahkan Barang!',
      'Barang Baru Ditambahkan',
      'success'
    )
} else if (desc_in == "suc-ed-brg") {
    Swal.fire(
      'Berhasil Mengubah Barang!',
      'Data Barang Diubah',
      'success'
    )
} else if (desc_in == "suc-del-brg") {
    Swal.fire(
      'Berhasil Menghapus!',
      'Data Barang Telah Dihapus',
      'success'
    )
} else if (desc_in == "suc-in-book") {
    Swal.fire(
      'Berhasil Menambahkan Buku!',
      'Buku Baru Ditambahkan',
      'success'
    )
} else if (desc_in == "suc-ed-cko") {
    Swal.fire(
      'Berhasil Mengubah!',
      'Status Pesanan Diubah',
      'success'
    )
} else if (desc_in == "suc-del-book") {
    Swal.fire(
      'Berhasil Menghapus!',
      'Data Buku Telah Dihapus',
      'success'
    )
}
// Clear the browser app cache
// document
//   .getElementById('btn-clear-cache')
//   .addEventListener('click', () => {
//     PWA.Navigator.clearCache();
//     var toast = new bootstrap.Toast(toastLiveExample);

//     toast.show();
//   })
// ;
