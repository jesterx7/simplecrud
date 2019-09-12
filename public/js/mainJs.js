$(document).ready(function() {
	function inputImage(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function(e) {
				$(".displayImage").attr('src', e.target.result);
			}

			reader.readAsDataURL(input.files[0]);
		}
	}

	$("#photoData").change(function() {
		inputImage(this);
	});

	$("#editPhotoData").change(function() {
		inputImage(this);
	});

	$("#menu-toggle").click(function() {
		$("#sidebar-icon").toggleClass('fa-bars fa-chevron-left');
	});
});