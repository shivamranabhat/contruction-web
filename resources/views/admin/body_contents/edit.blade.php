<x-app-layout>
    <div class="conatiner-fluid content-inner mt-n5 py-0">
        <div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Contents</h4>
                            </div>
                            <div class="back">
                                <a href="{{route('mains')}}"
                                    class=" text-center btn btn-primary btn-icon mt-lg-0 mt-md-0 mt-3">
                                    <i class="btn-inner">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 25 25"
                                            fill="none" stroke="currentColor">
                                            <path
                                                d="M24 12.001H2.914l5.294-5.295-.707-.707L1 12.501l6.5 6.5.707-.707-5.293-5.293H24v-1z"
                                                data-name="Left" />
                                        </svg>
                                    </i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body mt-2">
                            <form method="POST" action="{{ route('main.update', $content->slug) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-outline mb-3">
                                    <label class="form-label" for="title">Title</label>
                                    <input type="text" name="title" id="title"
                                        class="form-control @error('title') is-invalid @enderror {{ $errors->has('title') ? 'error' : '' }}"
                                        value="{{ $content->title }}" />
                                </div>
                                <div class="row align-items-end">
                                    <div class="d-flex gap-4">
                                        <div class="image-area mb-4">
                                            <img id="imageResult" src="{{ asset('storage/' . $content->image) }}"
                                                width="150">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-outline mb-3">
                                            <label class="form-label" for="image">Image</label>
                                            <input class="form-control" type="file" id="image" name="image" />
                                            @error('image')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-outline mb-3">
                                            <label class="form-label" for="alt">Image Alt</label>
                                            <input type="text" name="alt" id="alt"
                                                class="form-control @error('alt') is-invalid @enderror {{ $errors->has('alt') ? 'error' : '' }}"
                                                value="{{ $content->alt  }}" />
                                            @error('alt')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-outline mb-3">
                                    <label class="form-label" for="subtitle">Subtitle</label>
                                    <textarea
                                        class="form-control @error('subtitle') is-invalid @enderror {{ $errors->has('subtitle') ? 'error' : '' }}"
                                        id="subtitle" name="subtitle" rows="1">{{ $content->subtitle }}</textarea>
                                    @error('subtitle')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-outline mb-3">
                                    <label class="form-label" for="description">Description</label>
                                    <textarea
                                        class="form-control @error('description') is-invalid @enderror {{ $errors->has('description') ? 'error' : '' }}"
                                        id="description" name="description"
                                        rows="1">{{ $content->description }}</textarea>
                                    @error('description')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <button type="submit"
                                    class="btn btn-primary btn-block rounded mb-3">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @push('scripts')
        <script src="{{ asset('assets/js/imagePreview.js') }}"></script>
        @endpush
</x-app-layout>