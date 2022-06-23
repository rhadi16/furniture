// sidenav
const sidenav = document.querySelectorAll('.sidenav');
M.Sidenav.init(sidenav);

// testimonial carousel
const testi = document.querySelectorAll('.carousel');
M.Carousel.init(testi);

// Modal
const modal = document.querySelectorAll('.modal');
M.Modal.init(modal);

// FormSelect
const select = document.querySelectorAll('select');
M.FormSelect.init(select);

// navbar scroll
$(document).ready(function() {
	$(document).scroll(function() {
		var wscroll = $(this).scrollTop();

		if( wscroll > $('.info-panel').offset().top - 100 ) {
			$('.navcol').addClass('change');
		}
		else {
			$('.navcol').removeClass('change');
		}
	});

});

const desc_in = $('.desc-in').data('flashdata');
if (desc_in == "success-reg") {
    Swal.fire(
      'Berhasil Melakukan Registrasi!',
      'Silahkan Login Sebagai Pelanggan',
      'success'
    )
} else if (desc_in == "failed-reg2") {
    Swal.fire(
      'Gagal Melakukan Registrasi!',
      'Silahkan Registrasi Ulang',
      'error'
    )
} else if (desc_in == "failed-log") {
    Swal.fire(
      'Gagal Melakukan Login!',
      'Email Atau Password Salah',
      'error'
    )
}