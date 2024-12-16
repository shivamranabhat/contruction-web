<x-guest-layout>
    <div class="wrapper">
        <section class="login-content">
            <div class="row m-0 align-items-center vh-100 justify-content-center" style="background-color: #F5F7F8">
                <div class="col-12 col-md-8 col-lg-6 col-xl-6">
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <div class="card card-transparent shadow-none d-flex justify-content-center mb-0 auth-card">
                                <div class="card-body">
                                    
                                    <h2 class="mb-2 text-center">Reset Password</h2>
                                    <p class="text-center">Create a new password for your account.</p>
                                    <form method="POST" action="{{route('admin.password.update',$email)}}">
                                        @csrf
                                        @if (session()->has('error'))
                                        <div class="font-medium text-danger">{{ __('Whoops! Something went wrong.') }}
                                        </div>
                                        <span class="text-danger d-block mb-2">
                                            {{ session('error') }}
                                        </span>
                                        @endif
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="password" value="{{ __('Password') }}"
                                                    class="form-label">Password</label>
                                                <input type="password" class="form-control" id="password"
                                                    aria-describedby="password" name="password"
                                                    autocomplete="current-password">
                                            </div>
                                            @error('password')
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="password" value="{{ __('Password') }}" class="form-label">Re
                                                    Enter Password</label>
                                                <input type="password" class="form-control" id="password_confirmation"
                                                    aria-describedby="password_confirmation"
                                                    name="password_confirmation"
                                                    autocomplete="current-password_confirmation">
                                            </div>
                                            @error('password_confirmation')
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                        <div class="d-flex justify-content-center mb-5">
                                            <button type="submit" class="btn btn-primary w-100">{{__('Reset
                                                Password')}}</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-guest-layout>