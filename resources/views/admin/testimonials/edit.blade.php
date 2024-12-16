<x-app-layout>
    <div class="container-fluid content-inner mt-n5 py-0">
        <div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Edit</h4>
                            </div>
                            <div class="back">
                                <a href="{{ route('testimonials') }}" class="text-center btn btn-primary btn-icon mt-lg-0 mt-md-0 mt-3">
                                    <i class="btn-inner">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 25 25" fill="none" stroke="currentColor">
                                            <path d="M24 12.001H2.914l5.294-5.295-.707-.707L1 12.501l6.5 6.5.707-.707-5.293-5.293H24v-1z" data-name="Left" />
                                        </svg>
                                    </i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body mt-2">
                            <form action="{{ route('testimonial.update', $testimonial->slug) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <!-- Name Field -->
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="name">Name</label>
                                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                                           value="{{ $testimonial->name }}" required />
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Rating Field -->
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="rating">Rating</label>
                                    <input type="number" name="rating" id="rating" class="form-control @error('rating') is-invalid @enderror"
                                           value="{{ $testimonial->rating }}" min="1" max="5" required />
                                    @error('rating')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Description Field -->
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="description">Description</label>
                                    <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" required>{{ $testimonial->description }}</textarea>
                                    @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-primary btn-block rounded-pill mb-3">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
