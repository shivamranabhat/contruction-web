<x-app-layout>
    <div class="container-fluid content-inner mt-n5 py-0">
        <div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Team</h4>
                            </div>
                            <div class="back">
                                <a href="{{route('teams')}}"
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
                            <form method="POST" action="{{ route('team.update',$team->slug) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-outline mb-3">
                                    <label class="form-label" for="name">Name</label>
                                    <input type="text" name="name" id="name"
                                        class="form-control @error('name') is-invalid @enderror {{ $errors->has('name') ? 'error' : '' }}"
                                        value="{{ $team->name }}" />
                                    @error('name')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="row align-items-end">
                                    <div class="col-12 col-lg-6 form-outline mb-3">
                                        <div class="image-area mb-3">
                                            <img id="imageResult" src="{{ asset('storage/' . $team->image) }}" width="80">
                                        </div>
                                        <label class="form-label" for="image">Image</label>
                                        <input class="form-control" type="file" id="image" name="image" />
    
                                    </div>
                                    <div class="col-12 col-lg-6 mb-3">
                                        <label class="form-label" for="alt">Image Alt</label>
                                        <input type="text" name="alt" id="alt"
                                            class="form-control @error('alt') is-invalid @enderror {{ $errors->has('alt') ? 'error' : '' }}"
                                            value="{{ $team->alt }}" />
                                        @error('alt')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-outline mb-3">
                                    <label class="form-label" for="role">Role</label>
                                    <input type="text" name="role" id="role"
                                        class="form-control @error('role') is-invalid @enderror {{ $errors->has('role') ? 'error' : '' }}"
                                        value="{{ $team->role }}" />
                                    @error('role')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <button type="submit"
                                    class="btn btn-primary btn-block rounded-pill mb-3">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @push('scripts')
       
        <script src="{{ asset('assets/js/imagePreview.js?v=').time() }}"></script>
        @endpush
</x-app-layout>