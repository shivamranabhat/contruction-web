<x-guest-layout>
    <div class="wrapper">
        <section class="login-content">
            <div class="row m-0 align-items-center vh-100 justify-content-center" style="background-color: #F5F7F8">
                <div class="col-12 col-md-8 col-lg-6 col-xl-6">
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <div class="card card-transparent shadow-none d-flex justify-content-center mb-0 auth-card">
                                <div class="card-body">
                                    
                                    <h2 class="mb-2 text-center">Sign Up</h2>
                                    <p class="text-center">Login to stay connected.</p>
                                    <form method="POST" action="{{ route('admin.register') }}">
                                        @csrf
                                        @if (session()->has('error'))
                                        <div class="font-medium text-danger">{{ __('Whoops! Something went wrong.') }}</div>
                                        <span class="text-danger d-block mb-2">
                                            {{ session('error') }}
                                        </span>
                                        @endif
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="name" value="{{ __('name') }}"
                                                        class="form-label">Name</label>
                                                    <input type="text" class="form-control" id="name" name="name"
                                                        aria-describedby="name" value="{{ old('name') }}" autofocus
                                                        autocomplete="username">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="email" value="{{ __('Email') }}"
                                                        class="form-label">Email</label>
                                                    <input type="email" class="form-control" id="email" name="email"
                                                        aria-describedby="email" value="{{ old('email') }}" autofocus
                                                        autocomplete="username">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="password" value="{{ __('Password') }}"
                                                        class="form-label">Password</label>
                                                    <input type="password" class="form-control" id="password"
                                                        aria-describedby="password" name="password"
                                                        autocomplete="current-password">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 d-flex justify-content-between">
                                                <div class="form-check mb-3">
                                                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                                    <label class="form-check-label" for="remember">{{ __('Remember me') }}</label>
                                                </div>                                                
                                                <a href="{{route('admin.forgot.password')}}">
                                                    Forgot your password?
                                                </a>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center mb-5">
                                            <button type="submit" class="btn btn-primary w-100">{{__('Log
                                                in')}}</button>
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