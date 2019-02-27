function readURL(f) {
    if (f.files && f.files[0]) {
        var read = new FileReader();

        read.onload = function (e) {
            $('#profile')
                .attr('src', e.target.result)
                .width(150)
                .height(200);
        };

        read.readAsDataURL(f.files[0]);
    }
}