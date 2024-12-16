<x-guest-layout>
    <div class="wrapper">
        <section class="login-content">
            <div class="row m-0 align-items-center vh-100 justify-content-center" style="background-color: #F5F7F8">
                <div class="col-12 col-md-8 col-lg-6 col-xl-6">
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <div class="card card-transparent shadow-none d-flex justify-content-center mb-0 auth-card">
                                <div class="card-body">
                                    
                                    <h2 class="mb-2 text-center">Verify OTP</h2>
                                    <p class="text-center">Enter otp to verify your account.</p>
                                    <form method="POST" action="{{route('admin.forgot.verifyOtp',$email)}}">
                                        @csrf
                                        @if (session()->has('error'))
                                        <div class="font-medium text-danger">{{ __('Whoops! Something went wrong.') }}
                                        </div>
                                        <span class="text-danger d-block mb-2">
                                            {{ session('error') }}
                                        </span>
                                        @endif
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <input type="hidden" name="email" value="{{ $email }}">

                                                <div class="form-group">
                                                    <label for="token" value="{{ __('token') }}"
                                                        class="form-label">OTP</label>
                                                    <input type="text" class="form-control" id="token" name="token"
                                                        aria-describedby="token" value="{{ old('token') }}" autofocus
                                                        autocomplete="username">
                                                </div>
                                                @error('token')
                                                <p class="text-danger">{{$message}}</p>
                                                @enderror
                                            </div>


                                        </div>
                                        <div class="d-flex justify-content-center mb-5">
                                            <button type="submit" class="btn btn-primary w-100">{{__('Verify OTP
                                                ')}}</button>
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