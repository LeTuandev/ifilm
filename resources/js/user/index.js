$(document).ready(function () {
	$('#customButton').click(function () {
		$('#customFile').click();
	});

	$('#customFile').on('change', function () {
		let files = !!this.files ? this.files : [];
		if (/^image/.test(files[0].type)) {
			let reader = new FileReader();
			reader.readAsDataURL(files[0]);
			reader.onloadend = function () {
				$(".avatar").attr("src", this.result);
				$('input[name="avatar"]').val(this.result);
			}
		}
	});
});
