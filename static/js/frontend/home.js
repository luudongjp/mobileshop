$(document).ready(function() {
	$(document).mousemove(function() {
		/* style when hover HANG-SAN-XUAT*/
		if ($('.hover1:hover').length > 0) {
			$('.hover-container1').css('display', 'block');
		}
		if (!($('.hover1:hover').length > 0) && !($('.hover-container1:hover').length > 0)) {
			$('.hover-container1').css('display', 'none');
		}
		/* style when hover MUC GIA*/
		if ($('.hover2:hover').length > 0) {
			$('.hover-container2').css('display', 'block');
		}
		if (!($('.hover2:hover').length > 0) && !($('.hover-container2:hover').length > 0)) {
			$('.hover-container2').css('display', 'none');
		}
	});
});
