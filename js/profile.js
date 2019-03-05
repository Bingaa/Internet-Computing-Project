uploadPhoto = function(f) {
    if (f.files && f.files[0]) {
        var read = new FileReader();

        read.onload = function (e) {
            $('#profile')
                .attr('src', e.target.result)
                .width(200)
                .height(200);
        };

        read.readAsDataURL(f.files[0]);
    }
}

removePhoto = function(f) {
    document.getElementById('photoFile').value = "";
    $('#profile')
        .attr('src', '../images/error.png')
        .width(200)
        .height(200);
}

window.onload = function() { 
    var modal = document.getElementById('myModal');
    var btn = document.getElementById("profile");


    btn.onclick = function() {
        modal.style.display = "block";
    }


    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

}
