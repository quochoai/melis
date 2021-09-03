function readSingleImage(input, destination) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $(destination).removeClass('d-none');
            $(destination).html('<img src="' + e.target.result + '" width="200" />');
        }
        reader.readAsDataURL(input.files[0]);
    }
}