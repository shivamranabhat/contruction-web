document.addEventListener("DOMContentLoaded", function() {
    var mediaElement = document.getElementById("image");

    if (mediaElement !== null) {
        mediaElement.addEventListener("change", function() {
            var input = this;
            var url = input.value;
            var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();

            if (input.files && input.files[0]) {
                if (ext === "mp4" || ext === "webm") {
                    displayVideo(input.files[0]);
                } else if (ext === "gif" || ext === "png" || ext === "jpeg" || ext === "jpg") {
                    displayImage(input.files[0]);
                } else {
                    resetPreview();
                    // Handle unsupported file types or display an error message
                }
            }
        });
    }
});

function displayVideo(file) {
    var reader = new FileReader();
    reader.onload = function(e) {
        var videoPlayer = document.getElementById("mediaPlayer");
        videoPlayer.style.display = "block";
        videoPlayer.innerHTML = '<source src="' + e.target.result + '" type="video/mp4">';
        videoPlayer.load();
        videoPlayer.play();

        var imageResult = document.getElementById("imageResult");
        imageResult.style.display = "none";
        imageResult.setAttribute("src", "");
    };
    reader.readAsDataURL(file);
}

function displayImage(file) {
    var reader = new FileReader();
    reader.onload = function(e) {
        var imageResult = document.getElementById("imageResult");
        imageResult.style.display = "block";
        imageResult.setAttribute("src", e.target.result);

        var videoPlayer = document.getElementById("mediaPlayer");
        videoPlayer.style.display = "none";
        videoPlayer.innerHTML = "";
    };
    reader.readAsDataURL(file);
}

function resetPreview() {
    var imageResult = document.getElementById("imageResult");
    imageResult.style.display = "none";
    imageResult.setAttribute("src", "");

    var videoPlayer = document.getElementById("mediaPlayer");
    videoPlayer.style.display = "none";
    videoPlayer.innerHTML = "";
}