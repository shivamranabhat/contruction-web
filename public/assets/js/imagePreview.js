document.addEventListener("DOMContentLoaded", function() {
    var imageElement = document.getElementById("image");
    if (imageElement !== null) {
        imageElement.addEventListener("change", function() {
            var input = this;
            var url = input.value;
            var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
            if (input.files && input.files[0] && (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "svg" ||
                    ext == "jpg" || ext == "webp" || ext == "avif")) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById("imageResult").setAttribute("src", e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        });
    }

    var mainImage = document.getElementById("main_image");
    if (mainImage !== null) {
        mainImage.addEventListener("change", function() {
            var input = this;
            var url = input.value;
            var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
            if (input.files && input.files[0] && (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "svg" ||
                    ext == "jpg" || ext == "webp" || ext == "avif")) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById("mainImage").setAttribute("src", e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        });
    }
    var detailImg = document.getElementById("details_image");
    if (detailImg !== null) {
        detailImg.addEventListener("change", function() {
            var input = this;
            var url = input.value;
            var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
            if (input.files && input.files[0] && (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "svg" ||
                    ext == "jpg" || ext == "webp" || ext == "avif")) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById("detailsImg").setAttribute("src", e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        });
    }
    var coverImage = document.getElementById("cover_image");
    if (coverImage !== null) {
        coverImage.addEventListener("change", function() {
            var input = this;
            var url = input.value;
            var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
            if (input.files && input.files[0] && (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "svg" ||
                    ext == "jpg" || ext == "webp" || ext == "avif")) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById("coverImage").setAttribute("src", e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        });
    }


    var imageInput = document.getElementById('gallery_image');
    var imageContainer = document.getElementById('imageContainer');
    if (imageInput !== null) {
        imageInput.addEventListener('change', function () {
            var files = imageInput.files;

            // Clear previous images in the container
            imageContainer.innerHTML = '';

            for (var i = 0; i < files.length; i++) {
                var file = files[i];

                if (file.type.startsWith("image/")) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        var img = document.createElement('img');
                        img.src = e.target.result;
                        img.style.objectFit = 'cover';
                        img.width = 80;
                        img.height = 80;
                        imageContainer.appendChild(img);
                    };

                    reader.readAsDataURL(file);
                }
            }
        });
    }

    var main = document.getElementById('main_image');
    var mainImgContainer = document.getElementById('main-image-area');
    if (mainImgContainer !== null) {
        main.addEventListener('change', function () {
            var files = main.files;

            // Clear previous images in the container
            mainImgContainer.innerHTML = '';

            for (var i = 0; i < files.length; i++) {
                var file = files[i];

                if (file.type.startsWith("image/")) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        var img = document.createElement('img');
                        img.src = e.target.result;
                        img.style.objectFit = 'cover';
                        img.width = 80;
                        img.height = 80;
                        mainImgContainer.appendChild(img);
                    };

                    reader.readAsDataURL(file);
                }
            }
        });
    }

});
