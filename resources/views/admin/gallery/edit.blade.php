<x-app-layout>
    <div class="container-fluid content-inner mt-n5 py-0">
        <div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Gallery</h4>
                            </div>
                            <div class="back">
                                <a href="{{route('galleries')}}" class=" text-center btn btn-primary btn-icon mt-lg-0 mt-md-0 mt-3">
                                    <i class="btn-inner">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 25 25" fill="none" stroke="currentColor"><path  d="M24 12.001H2.914l5.294-5.295-.707-.707L1 12.501l6.5 6.5.707-.707-5.293-5.293H24v-1z" data-name="Left"/></svg>
                                    </i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body mt-2">
                            <form method="POST" action="{{ route('gallery.update',$gallery->slug) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="image-area mb-4"><img id="imageResult" src="{{ asset('storage/' . $gallery->image) }}"
                                    width="200"></div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="image">Image</label>
                                    <input class="form-control  @error('image') is-invalid @enderror {{ $errors->has('image') ? 'error' : '' }}" type="file" id="image" name="image" />
                                </div>
                                @error('image')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                                <button type="submit" class="btn btn-primary btn-block rounded-pill mb-4">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @push('scripts')
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var imageInput = document.getElementById('multipleImage');
                var imageContainer = document.getElementById('imageContainer');

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
                                img.width = 100;
                                img.height = 100;
                                imageContainer.appendChild(img);
                            };

                            reader.readAsDataURL(file);
                        }
                    }
                });

            });
        </script>
        @endpush
</x-app-layout>