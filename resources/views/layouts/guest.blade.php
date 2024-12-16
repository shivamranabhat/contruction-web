<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Authentication | Yoga Holiday</title>
     <!-- Favicon -->
     <link rel="shortcut icon" href="{{asset('main/images/favicon.png')}}" />

   <!-- Library / Plugin Css Build -->
   <link rel="stylesheet" href="{{asset('assets/css/core/libs.min.css')}}" />

   <!-- Aos Animation Css -->
   <link rel="stylesheet" href="{{asset('assets/vendor/aos/dist/aos.css')}}" />

   <!-- Design System Css -->
   <link rel="stylesheet" href="{{asset('assets/css/main-ui.min.css?v=2.0.0')}}" />
   <!-- Custom Css -->
   <link rel="stylesheet" href="{{asset('assets/css/custom.min.css?v=2.0.0')}}" />

   <!-- Dark Css -->
   <link rel="stylesheet" href="{{asset('assets/css/dark.min.css')}}" />

   <!-- Customizer Css -->
   <link rel="stylesheet" href="{{asset('assets/css/customizer.min.css')}}" />

   <!-- RTL Css -->
   <link rel="stylesheet" href="{{asset('assets/css/rtl.min.css')}}" />
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Styles -->
    @livewireStyles
    </head>
    <body>
        <div class=" text-gray-900 antialiased">
            {{ $slot }}
        </div>
        @if(session()->has('message'))
        <div class="success flash p-3 p-md-4 p-lg-3 p-xl-3 position-fixed bg-white rounded" id="flash-success">
            <div class="d-flex flex-row align-item-center gap-3">
                <div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48" fill="none">
                        <path opacity="0.5"
                            d="M44 24C44 35.0457 35.0457 44 24 44C12.9543 44 4 35.0457 4 24C4 12.9543 12.9543 4 24 4C35.0457 4 44 12.9543 44 24Z"
                            fill="#92BCAE" />
                        <path
                            d="M32.0607 17.9393C32.6464 18.5251 32.6464 19.4749 32.0607 20.0607L22.0607 30.0607C21.4749 30.6464 20.5251 30.6464 19.9393 30.0607L15.9393 26.0607C15.3536 25.4749 15.3536 24.5251 15.9393 23.9393C16.5251 23.3536 17.4749 23.3536 18.0607 23.9393L21 26.8787L25.4697 22.409L29.9393 17.9393C30.5251 17.3536 31.4749 17.3536 32.0607 17.9393Z"
                            fill="#081C15" />
                    </svg>
                </div>
                <div class="message d-flex flex-column flex-start justify-content-center">
                    <h5>
                        Successfull
                    </h5>
                    <p class="mb-0"> {{session('message')}}</p>
                </div>
            </div>
        </div>
        @endif
        @if(session()->has('error'))
        <div id="flash-error"  class="error flash p-3 p-md-4 p-lg-3 p-xl-3 position-fixed bg-white rounded">
            <div class="d-flex flex-row align-item-center gap-3">
                <div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48" fill="none">
                        <path opacity="0.5"
                            d="M44 24C44 12.9543 35.0457 4 24 4C12.9543 4 4 12.9543 4 24C4 35.0457 12.9543 44 24 44C35.0457 44 44 35.0457 44 24Z"
                            fill="#FF6F6F" />
                        <path
                            d="M24 12.5C24.8284 12.5 25.5 13.1716 25.5 14V26C25.5 26.8284 24.8284 27.5 24 27.5C23.1716 27.5 22.5 26.8284 22.5 26V14C22.5 13.1716 23.1716 12.5 24 12.5Z"
                            fill="#081C15" />
                        <path
                            d="M24 34C25.1046 34 26 33.1046 26 32C26 30.8954 25.1046 30 24 30C22.8954 30 22 30.8954 22 32C22 33.1046 22.8954 34 24 34Z"
                            fill="#081C15" />
                    </svg>
                </div>
                <div class="message d-flex flex-column gap-2 flex-start justify-content-center">
                    <h5>
                        {{ session('error') }}
                    </h5>
                    <p class="mb-0">Please try again later!</p>
                </div>
            </div>
        </div>
        @endif
        @livewireScripts
        <!-- Library Bundle Script -->
        <script src="{{asset('assets/js/core/libs.min.js')}}"></script>
    
        <!-- External Library Bundle Script -->
        <script src="{{asset('assets/js/core/external.min.js')}}"></script>
    
        <!-- Widgetchart Script -->
        <script src="{{asset('assets/js/charts/widgetcharts.js')}}"></script>
    
        <!-- mapchart Script -->
        <script src="{{asset('assets/js/charts/vectore-chart.js')}}"></script>
        <script src="{{asset('assets/js/charts/dashboard.js')}}"></script>
    
        <!-- fslightbox Script -->
        <script src="{{asset('assets/js/plugins/fslightbox.js')}}"></script>
    
        <!-- Settings Script -->
        <script src="{{asset('assets/js/plugins/setting.js')}}"></script>
    
        <!-- Slider-tab Script -->
        <script src="{{asset('assets/js/plugins/slider-tabs.js')}}"></script>
    
        <!-- Form Wizard Script -->
        <script src="{{asset('assets/js/plugins/form-wizard.js')}}"></script>
    
        <!-- AOS Animation Plugin-->
        <script src="{{asset('assets/vendor/aos/dist/aos.js')}}"></script>

        
    </body>
</html>
