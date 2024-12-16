<x-app-layout>
    <div class="container-fluid content-inner mt-n5 py-0">
        <div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Profile</h4>
                            </div>
                        </div>
                        <div class="card-body mt-2">
                            <form action="{{route('adminProfile.update')}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="name">Name</label>
                                    <input type="text" name="name" id="name"
                                        class="form-control @error('name') is-invalid @enderror {{ $errors->has('name') ? 'error' : '' }}"
                                        value="{{ $account->name }}" />
                                    @error('name')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="email" name="email" id="email"
                                        class="form-control @error('email') is-invalid @enderror {{ $errors->has('email') ? 'error' : '' }}"
                                        value="{{ $account->email }}" />
                                    @error('email')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="password">New Password</label>
                                    <input type="password" name="password" id="password"
                                        class="form-control @error('password') is-invalid @enderror {{ $errors->has('password') ? 'error' : '' }}"
                                       />
                                    @error('password')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="password_confirmation">Confirm Password</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation"
                                        class="form-control @error('password_confirmation') is-invalid @enderror {{ $errors->has('password_confirmation') ? 'error' : '' }}" />
                                    @error('password_confirmation')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            
                                <button type="submit" class="btn btn-primary btn-block rounded-pill mb-4">Update
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>