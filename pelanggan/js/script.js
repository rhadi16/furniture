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
  // $('#example2').DataTable();
  $('#example3').DataTable();
});

const desc_in = $('.desc-in').data('flashdata');
if (desc_in == "suc-ed-pro") {
    Swal.fire(
      'Berhasil!',
      'Profile Berhasil Diubah',
      'success'
    )
} else if (desc_in == "suc-in-pes") {
    Swal.fire(
      'Berhasil!',
      'Barang Ditambahkan Ke Keranjang',
      'success'
    )
} else if (desc_in == "suc-del-pes") {
    Swal.fire(
      'Berhasil!',
      'Pesanan Telah Dihapus',
      'success'
    )
} else if (desc_in == "suc-in-cko") {
    Swal.fire(
      'Berhasil!',
      'Barang Telah Check Out',
      'success'
    )
} else if (desc_in == "suc-ed-cko") {
    Swal.fire(
      'Berhasil!',
      'Bukti Transfer Diubah',
      'success'
    )
} else if (desc_in == "fal-in-pes2") {
    Swal.fire(
      'Gagal!',
      'Pesanan Melebihi Stok',
      'error'
    )
} else if (desc_in == "timeout-ker") {
    Swal.fire(
      'Gagal Dicheck-out!',
      'Pesanan Lebih Dari 1 Hari di Keranjang',
      'error'
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
