<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard | Construction</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('main/img/favicon.png')}}" />

    <!-- Library / Plugin Css Build -->
    <link rel="stylesheet" href="{{asset('assets/css/core/libs.min.css')}}" />

    <!-- Aos Animation Css -->
    <link rel="stylesheet" href="{{asset('assets/vendor/aos/dist/aos.css')}}" />

    <!-- Design System Css -->
    <link rel="stylesheet" href="{{asset('assets/css/main-ui.min.css?v=3.0.0')}}" />
    <!-- Custom Css -->
    <link rel="stylesheet" href="{{asset('assets/css/custom.min.css?v=3.0.0')}}" />

    <!-- Dark Css -->
    <link rel="stylesheet" href="{{asset('assets/css/dark.min.css')}}" />

    <!-- Flash message Css -->
    <link rel="stylesheet" href="{{asset('assets/css/flash.css')}}" />

    <!-- Customizer Css -->
    <link rel="stylesheet" href="{{asset('assets/css/customizer.min.css')}}" />

    <!-- RTL Css -->
    <link rel="stylesheet" href="{{asset('assets/css/rtl.min.css')}}" />
    <!-- Date picker -->

    <!-- Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <!-- Flatpickr Month Select Plugin CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/plugins/monthSelect/style.css">

    <!-- Flatpickr JS -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <!-- Flatpickr Month Select Plugin JS -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/plugins/monthSelect/index.js"></script>


    <!-- CK editor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/super-build/ckeditor.js"></script>

    <!-- Styles -->
    @livewireStyles
</head>

<body>

    <!-- loader Start -->
    <div id="loading">
        <div class="loader simple-loader">
            <div class="loader-body"></div>
        </div>
    </div>
    <!-- loader END -->

    <aside class="sidebar sidebar-default sidebar-white sidebar-base navs-rounded-all ">
        <div class="sidebar-header d-flex align-items-center justify-content-start">
            <a class="navbar-brand d-flex align-items-center gap-1">
                <div class="logo-main">
                    <img src="{{asset('main/img/Nex Gen.png')}}" width="100" alt="logo">
                </div>
                <!--logo End-->
            </a>
            <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
                <i class="icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.25 12.2744L19.25 12.2744" stroke="currentColor" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M10.2998 18.2988L4.2498 12.2748L10.2998 6.24976" stroke="currentColor"
                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </i>
            </div>
        </div>
        <div class="sidebar-body pt-0 data-scrollbar">
            <div class="sidebar-list">
                <!-- Sidebar Menu Start -->
                <ul class="navbar-nav iq-main-menu" id="sidebar-menu">
                    <li class="nav-item static-item">
                        <a class="nav-link static-item disabled" tabindex="-1">
                            <span class="default-icon">Pages</span>
                            <span class="mini-icon">-</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{request()->segment(1) == 'dashboard' && request()->segment(2) ==  null ? 'active' : ''}}"
                            aria-current="page" href="{{route('dashboard')}}">
                            <i class="icon">
                                <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                                    class="icon-20">
                                    <path opacity="0.4"
                                        d="M16.0756 2H19.4616C20.8639 2 22.0001 3.14585 22.0001 4.55996V7.97452C22.0001 9.38864 20.8639 10.5345 19.4616 10.5345H16.0756C14.6734 10.5345 13.5371 9.38864 13.5371 7.97452V4.55996C13.5371 3.14585 14.6734 2 16.0756 2Z"
                                        fill="currentColor"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M4.53852 2H7.92449C9.32676 2 10.463 3.14585 10.463 4.55996V7.97452C10.463 9.38864 9.32676 10.5345 7.92449 10.5345H4.53852C3.13626 10.5345 2 9.38864 2 7.97452V4.55996C2 3.14585 3.13626 2 4.53852 2ZM4.53852 13.4655H7.92449C9.32676 13.4655 10.463 14.6114 10.463 16.0255V19.44C10.463 20.8532 9.32676 22 7.92449 22H4.53852C3.13626 22 2 20.8532 2 19.44V16.0255C2 14.6114 3.13626 13.4655 4.53852 13.4655ZM19.4615 13.4655H16.0755C14.6732 13.4655 13.537 14.6114 13.537 16.0255V19.44C13.537 20.8532 14.6732 22 16.0755 22H19.4615C20.8637 22 22 20.8532 22 19.44V16.0255C22 14.6114 20.8637 13.4655 19.4615 13.4655Z"
                                        fill="currentColor"></path>
                                </svg>
                            </i>
                            <span class="item-name">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{request()->segment(1) == 'slider' || request()->segment(2) ==  'slider' ? 'active' : ''}}"
                            aria-current="page" href="{{route('sliders')}}">
                            <i class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" class="icon-20" fill="none"
                                    viewBox="0 0 24 24">
                                    <g id="Interface / Slider_02">
                                        <path id="Vector"
                                            d="M14 18H21M3 18H5M5 18C5 19.3807 6.11929 20.5 7.5 20.5C8.88071 20.5 10 19.3807 10 18C10 16.6193 8.88071 15.5 7.5 15.5C6.11929 15.5 5 16.6193 5 18ZM20 12H21M3 12H10M13 6H21M13 6C13 4.61929 11.8807 3.5 10.5 3.5C9.11929 3.5 8 4.61929 8 6C8 7.38071 9.11929 8.5 10.5 8.5C11.8807 8.5 13 7.38071 13 6ZM3 6H4M16.5 14.5C15.1193 14.5 14 13.3807 14 12C14 10.6193 15.1193 9.5 16.5 9.5C17.8807 9.5 19 10.6193 19 12C19 13.3807 17.8807 14.5 16.5 14.5Z"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </g>
                                </svg>
                            </i>
                            <span class="item-name">Sliders</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{request()->segment(2) == 'content' ? 'active' : ''}}"
                            data-bs-toggle="collapse" href="#sidebar-content" role="button" aria-expanded="false"
                            aria-controls="sidebar-content">
                            <i class="icon">
                                <svg class="icon-20" width="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" stroke="currentColor" stroke-width="0.43200000000000005">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path
                                            d="M1 6v12h9V6zm8 11H2V7h7zm-8 3h22v1H1zM1 3h22v1H1zm11 4h11v1H12zm0 3h11v1H12zm0 3h11v1H12zm0 3h11v1H12z">
                                        </path>
                                        <path fill="none" d="M0 0h24v24H0z"></path>
                                    </g>
                                </svg>
                            </i>
                            <span class="item-name">Contents</span>
                            <i class="right-icon">
                                <svg class="icon-18" xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </i>
                        </a>
                        <ul class="sub-nav collapse" id="sidebar-content" data-bs-parent="#sidebar-menu">
                            <li class="nav-item">
                                <a class="nav-link {{request()->segment(2) == 'content' && request()->segment(3)== null ? 'text-primary' : ''}}"
                                    href="{{route('mains')}}">
                                    <i class="icon">
                                        <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                            viewBox="0 0 24 24" fill="currentColor">
                                            <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <i class="sidenav-mini-icon"> Main </i>
                                    <span class="item-name">Main Body</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{request()->segment(2) == 'content' && request()->segment(3)== 'contact' ? 'text-primary' : ''}}"
                                    href="{{route('contactContents')}}">
                                    <i class="icon">
                                        <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                            viewBox="0 0 24 24" fill="currentColor">
                                            <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <i class="sidenav-mini-icon"> Contact</i>
                                    <span class="item-name">Contact Section</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link {{request()->segment(2) == 'content' && request()->segment(3) == 'about' ? 'text-primary' : ''}}"
                                    href="{{route('abouts')}}">
                                    <i class="icon">
                                        <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                            viewBox="0 0 24 24" fill="currentColor">
                                            <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <i class="sidenav-mini-icon"> About Body </i>
                                    <span class="item-name">About Body</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{request()->segment(2) == 'content' && request()->segment(3) == 'footer' ? 'text-primary' : ''}}"
                                    href="{{route('footers')}}">
                                    <i class="icon">
                                        <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                            viewBox="0 0 24 24" fill="currentColor">
                                            <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <i class="sidenav-mini-icon"> Footer </i>
                                    <span class="item-name">Footer</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{request()->segment(2) == 'service' || request()->segment(2)=='services' ? 'active' : ''}}"
                            data-bs-toggle="collapse" href="#sidebar-service" role="button" aria-expanded="false"
                            aria-controls="sidebar-service">
                            <i class="icon">

                                <svg xmlns="http://www.w3.org/2000/svg" class="icon-20" width="20" fill="currentColor"
                                    viewBox="0 0 48 48">
                                    <g id="Layer_2" data-name="Layer 2">
                                        <g id="invisible_box" data-name="invisible box">
                                            <rect width="48" height="48" fill="none" />
                                            <rect width="48" height="48" fill="none" />
                                            <rect width="48" height="48" fill="none" />
                                        </g>
                                        <g id="icons_Q2" data-name="icons Q2">
                                            <g>
                                                <path
                                                    d="M28.7,18.8l-1.8,2.9,1.4,1.4,2.9-1.8,1,.4L33,25h2l.8-3.3,1-.4,2.9,1.8,1.4-1.4-1.8-2.9a4.2,4.2,0,0,0,.4-1L43,17V15l-3.3-.8a4.2,4.2,0,0,0-.4-1l1.8-2.9L39.7,8.9l-2.9,1.8-1-.4L35,7H33l-.8,3.3-1,.4L28.3,8.9l-1.4,1.4,1.8,2.9a4.2,4.2,0,0,0-.4,1L25,15v2l3.3.8A4.2,4.2,0,0,0,28.7,18.8ZM34,14a2,2,0,1,1-2,2A2,2,0,0,1,34,14Z" />
                                                <path
                                                    d="M42.2,28.7a5.2,5.2,0,0,0-4-1.1l-9.9,1.8a4.5,4.5,0,0,0-1.4-3.3L19.8,19H5a2,2,0,0,0,0,4H18.2l5.9,5.9a.8.8,0,0,1-1.2,1.2l-3.5-3.5a2,2,0,0,0-2.8,2.8l3.5,3.5a4.5,4.5,0,0,0,3.4,1.4,5.7,5.7,0,0,0,1.8-.3h0l13.6-2.4a1,1,0,0,1,.8.2.9.9,0,0,1,.3.7,1,1,0,0,1-.8,1L20.6,36.9,9.7,28H5a2,2,0,0,0,0,4H8.3l11.1,9.1,20.5-3.7a5,5,0,0,0,2.3-8.7Z" />
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                            </i>
                            <span class="item-name">Services</span>
                            <i class="right-icon">
                                <svg class="icon-18" xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </i>
                        </a>
                        <ul class="sub-nav collapse" id="sidebar-service" data-bs-parent="#sidebar-menu">
                            <li class="nav-item">
                                <a class="nav-link {{request()->segment(2) == 'service' && request()->segment(3)== null || request()->segment(2) == 'services' && request()->segment(3)== null ? 'text-primary' : ''}}"
                                    href="{{route('services')}}">
                                    <i class="icon">
                                        <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                            viewBox="0 0 24 24" fill="currentColor">
                                            <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <i class="sidenav-mini-icon"> Lists </i>
                                    <span class="item-name">Lists</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link {{request()->segment(2) == 'service' && request()->segment(3) == 'category' || request()->segment(3) == 'services' || request()->segment(2) == 'blogs' && request()->segment(3) == 'category' || request()->segment(3) == 'categories' ? 'text-primary' : ''}}"
                                    href="{{route('serviceCategories')}}">
                                    <i class="icon">
                                        <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                            viewBox="0 0 24 24" fill="currentColor">
                                            <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <i class="sidenav-mini-icon"> Category </i>
                                    <span class="item-name">Category</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{request()->segment(2) == 'blog' || request()->segment(2)=='blogs' ? 'active' : ''}}"
                            data-bs-toggle="collapse" href="#sidebar-blog" role="button" aria-expanded="false"
                            aria-controls="sidebar-blog">
                            <i class="icon">
                                <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.4"
                                        d="M18.8088 9.021C18.3573 9.021 17.7592 9.011 17.0146 9.011C15.1987 9.011 13.7055 7.508 13.7055 5.675V2.459C13.7055 2.206 13.5036 2 13.253 2H7.96363C5.49517 2 3.5 4.026 3.5 6.509V17.284C3.5 19.889 5.59022 22 8.16958 22H16.0463C18.5058 22 20.5 19.987 20.5 17.502V9.471C20.5 9.217 20.299 9.012 20.0475 9.013C19.6247 9.016 19.1177 9.021 18.8088 9.021Z"
                                        fill="currentColor"></path>
                                    <path opacity="0.4"
                                        d="M16.0842 2.56737C15.7852 2.25637 15.2632 2.47037 15.2632 2.90137V5.53837C15.2632 6.64437 16.1742 7.55437 17.2802 7.55437C17.9772 7.56237 18.9452 7.56437 19.7672 7.56237C20.1882 7.56137 20.4022 7.05837 20.1102 6.75437C19.0552 5.65737 17.1662 3.69137 16.0842 2.56737Z"
                                        fill="currentColor"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M8.97398 11.3877H12.359C12.77 11.3877 13.104 11.0547 13.104 10.6437C13.104 10.2327 12.77 9.89868 12.359 9.89868H8.97398C8.56298 9.89868 8.22998 10.2327 8.22998 10.6437C8.22998 11.0547 8.56298 11.3877 8.97398 11.3877ZM8.97408 16.3819H14.4181C14.8291 16.3819 15.1631 16.0489 15.1631 15.6379C15.1631 15.2269 14.8291 14.8929 14.4181 14.8929H8.97408C8.56308 14.8929 8.23008 15.2269 8.23008 15.6379C8.23008 16.0489 8.56308 16.3819 8.97408 16.3819Z"
                                        fill="currentColor"></path>
                                </svg>
                            </i>
                            <span class="item-name">Blogs</span>
                            <i class="right-icon">
                                <svg class="icon-18" xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </i>
                        </a>
                        <ul class="sub-nav collapse" id="sidebar-blog" data-bs-parent="#sidebar-menu">
                            <li class="nav-item">
                                <a class="nav-link {{request()->segment(2) == 'blog' && request()->segment(3)== null || request()->segment(2) == 'blogs' && request()->segment(3)== null ? 'text-primary' : ''}}"
                                    href="{{route('blogs')}}">
                                    <i class="icon">
                                        <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                            viewBox="0 0 24 24" fill="currentColor">
                                            <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <i class="sidenav-mini-icon"> Lists </i>
                                    <span class="item-name">Lists</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link {{request()->segment(2) == 'blog' && request()->segment(3) == 'category' || request()->segment(3) == 'categories' || request()->segment(2) == 'blogs' && request()->segment(3) == 'category' || request()->segment(3) == 'categories' ? 'text-primary' : ''}}"
                                    href="{{route('blogCategories')}}">
                                    <i class="icon">
                                        <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                            viewBox="0 0 24 24" fill="currentColor">
                                            <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <i class="sidenav-mini-icon"> Category </i>
                                    <span class="item-name">Category</span>
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link {{ request()->segment(2) == 'categories' || request()->segment(2)=='category' ? 'active' : '' }}"
                            href="{{ route('categories') }}">
                            <i class="icon">
                                <!-- New Icon for Categories -->
                                <svg width="20" class="icon-20" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M3.75 4.5L4.5 3.75H10.5L11.25 4.5V10.5L10.5 11.25H4.5L3.75 10.5V4.5ZM5.25 5.25V9.75H9.75V5.25H5.25ZM13.5 3.75L12.75 4.5V10.5L13.5 11.25H19.5L20.25 10.5V4.5L19.5 3.75H13.5ZM14.25 9.75V5.25H18.75V9.75H14.25ZM17.25 20.25H15.75V17.25H12.75V15.75H15.75V12.75H17.25V15.75H20.25V17.25H17.25V20.25ZM4.5 12.75L3.75 13.5V19.5L4.5 20.25H10.5L11.25 19.5V13.5L10.5 12.75H4.5ZM5.25 18.75V14.25H9.75V18.75H5.25Z"
                                        fill="currentColor" />
                                </svg>
                            </i>
                            <span class="item-name">Categories</span>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link {{request()->segment(2) == 'testimonials' || request()->segment(2)=='testimonial' ? 'active' : ''}}"
                            href="{{ route('testimonials') }}">
                            <i class="icon">
                                <svg class="icon-20" width="20" viewBox="0 0 20 20" fill="currentColor"
                                    xmlns="http://www.w3.org/2000/svg">

                                    <rect x="0" fill="none" width="20" height="20" />

                                    <g>

                                        <path
                                            d="M4 3h12c.55 0 1.02.2 1.41.59S18 4.45 18 5v7c0 .55-.2 1.02-.59 1.41S16.55 14 16 14h-1l-5 5v-5H4c-.55 0-1.02-.2-1.41-.59S2 12.55 2 12V5c0-.55.2-1.02.59-1.41S3.45 3 4 3zm11 2H4v1h11V5zm1 3H4v1h12V8zm-3 3H4v1h9v-1z" />

                                    </g>

                                </svg>
                            </i>
                            <span class="item-name">Testimonials</span>
                        </a>
                    </li>


                    <li>
                        <hr class="hr-horizontal">
                    </li>
                    <li class="nav-item static-item">
                        <a class="nav-link static-item " tabindex="-1">
                            <span class="default-icon">Messages</span>
                            <span class="mini-icon">-</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{request()->segment(2) == 'messages' ? 'active' : ''}}"
                            href="{{route('messages')}}">
                            <i class="icon">
                                <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.4"
                                        d="M22 15.94C22 18.73 19.76 20.99 16.97 21H16.96H7.05C4.27 21 2 18.75 2 15.96V15.95C2 15.95 2.006 11.524 2.014 9.298C2.015 8.88 2.495 8.646 2.822 8.906C5.198 10.791 9.447 14.228 9.5 14.273C10.21 14.842 11.11 15.163 12.03 15.163C12.95 15.163 13.85 14.842 14.56 14.262C14.613 14.227 18.767 10.893 21.179 8.977C21.507 8.716 21.989 8.95 21.99 9.367C22 11.576 22 15.94 22 15.94Z"
                                        fill="currentColor"></path>
                                    <path
                                        d="M21.4759 5.67351C20.6099 4.04151 18.9059 2.99951 17.0299 2.99951H7.04988C5.17388 2.99951 3.46988 4.04151 2.60388 5.67351C2.40988 6.03851 2.50188 6.49351 2.82488 6.75151L10.2499 12.6905C10.7699 13.1105 11.3999 13.3195 12.0299 13.3195C12.0339 13.3195 12.0369 13.3195 12.0399 13.3195C12.0429 13.3195 12.0469 13.3195 12.0499 13.3195C12.6799 13.3195 13.3099 13.1105 13.8299 12.6905L21.2549 6.75151C21.5779 6.49351 21.6699 6.03851 21.4759 5.67351Z"
                                        fill="currentColor"></path>
                                </svg>
                            </i>
                            <span class="item-name">Message</span>
                        </a>
                    </li>

                    <li>
                        <hr class="hr-horizontal">
                    </li>
                    <li class="nav-item static-item">
                        <a class="nav-link static-item disabled" tabindex="-1">
                            <span class="default-icon">Extra Components</span>
                            <span class="mini-icon">-</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{request()->segment(2) == 'page' ? 'active' : ''}}"
                            href="{{route('pages')}}">
                            <i class="icon">
                                <svg version="1.1" id="PAGE" xmlns="http://www.w3.org/2000/svg" width="20"
                                    class="icon-20" fill="currentColor" stroke="currentColor"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1800 1800"
                                    enable-background="new 0 0 1800 1800" xml:space="preserve" fill="currentColor">
                                    <g id="SVGRepo_bgCarrier" stroke-width="1.5"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <g>
                                            <path fill="currentColor"
                                                d="M1720.335,5.563H85.245c-43.937,0-79.679,35.739-79.679,79.667v1635.1c0,43.928,35.743,79.67,79.679,79.67 h1635.09c43.927,0,79.665-35.742,79.665-79.67V85.23C1800,41.302,1764.262,5.563,1720.335,5.563z M85.245,68.575h1635.09 c9.182,0,16.653,7.473,16.653,16.655v195.532H68.578V85.23C68.578,76.048,76.055,68.575,85.245,68.575z M1720.335,1736.988H85.245 c-9.19,0-16.667-7.472-16.667-16.658V343.774h1668.41V1720.33C1736.988,1729.517,1729.517,1736.988,1720.335,1736.988z">
                                            </path>
                                            <path fill="currentColor"
                                                d="M1518.679,1150.928H333.948c-47.154,0-85.517,38.363-85.517,85.517v315.061 c0,47.152,38.363,85.516,85.517,85.516h1184.73c47.154,0,85.518-38.363,85.518-85.516v-315.061 C1604.196,1189.291,1565.833,1150.928,1518.679,1150.928z M1541.184,1551.505c0,12.403-10.096,22.504-22.505,22.504H333.948 c-12.409,0-22.504-10.101-22.504-22.504v-315.061c0-12.412,10.096-22.505,22.504-22.505h1184.73 c12.409,0,22.505,10.093,22.505,22.505V1551.505z">
                                            </path>
                                            <path fill="currentColor"
                                                d="M333.948,913.886h305.565c47.153,0,85.517-38.365,85.517-85.519V522.802 c0-47.154-38.363-85.516-85.517-85.516H333.948c-47.154,0-85.517,38.362-85.517,85.516v305.565 C248.432,875.521,286.794,913.886,333.948,913.886z M311.444,522.802c0-12.408,10.096-22.504,22.504-22.504h305.565 c12.408,0,22.505,10.096,22.505,22.504v305.565c0,12.408-10.097,22.505-22.505,22.505H333.948 c-12.409,0-22.504-10.097-22.504-22.505V522.802z">
                                            </path>
                                            <path fill="currentColor"
                                                d="M1572.689,996.396H279.938c-17.401,0-31.506,14.108-31.506,31.505c0,17.406,14.105,31.507,31.506,31.507 h1292.751c17.401,0,31.507-14.101,31.507-31.507C1604.196,1010.505,1590.091,996.396,1572.689,996.396z">
                                            </path>
                                            <path fill="currentColor"
                                                d="M1572.689,832.116H858.558c-17.402,0-31.507,14.105-31.507,31.507c0,17.401,14.105,31.505,31.507,31.505 h714.132c17.401,0,31.507-14.104,31.507-31.505C1604.196,846.222,1590.091,832.116,1572.689,832.116z">
                                            </path>
                                            <path fill="currentColor"
                                                d="M1572.689,643.081H858.558c-17.402,0-31.507,14.105-31.507,31.506c0,17.401,14.105,31.505,31.507,31.505 h714.132c17.401,0,31.507-14.104,31.507-31.505C1604.196,657.186,1590.091,643.081,1572.689,643.081z">
                                            </path>
                                            <path fill="currentColor"
                                                d="M1572.689,454.044H858.558c-17.402,0-31.507,14.105-31.507,31.507c0,17.401,14.105,31.505,31.507,31.505 h714.132c17.401,0,31.507-14.104,31.507-31.505C1604.196,468.15,1590.091,454.044,1572.689,454.044z">
                                            </path>
                                            <circle fill="currentColor" cx="204.913" cy="171.616" r="50.635"></circle>
                                            <circle fill="currentColor" cx="364.694" cy="171.616" r="50.635"></circle>
                                            <circle fill="currentColor" cx="524.474" cy="171.616" r="50.635"></circle>
                                        </g>
                                    </g>
                                </svg>


                            </i>
                            <span class="item-name">Pages</span>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link {{request()->segment(2) == 'about' ? 'active' : ''}}"
                            data-bs-toggle="collapse" href="#sidebar-about" role="button" aria-expanded="false"
                            aria-controls="sidebar-about">
                            <i class="icon">
                                <svg class="icon-20" xmlns="http://www.w3.org/2000/svg" width="20" viewBox="0 0 24 24"
                                    fill="currentColor">
                                    <path
                                        d="M8 10.5378C8 9.43327 8.89543 8.53784 10 8.53784H11.3333C12.4379 8.53784 13.3333 9.43327 13.3333 10.5378V19.8285C13.3333 20.9331 14.2288 21.8285 15.3333 21.8285H16C16 21.8285 12.7624 23.323 10.6667 22.9361C10.1372 22.8384 9.52234 22.5913 9.01654 22.3553C8.37357 22.0553 8 21.3927 8 20.6832V10.5378Z"
                                        fill="currentColor" />
                                    <rect opacity="0.4" x="8" y="1" width="5" height="5" rx="2.5" fill="currentColor" />
                                </svg>
                            </i>
                            <span class="item-name">About</span>
                            <i class="right-icon">
                                <svg class="icon-18" xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </i>
                        </a>
                        <ul class="sub-nav collapse" id="sidebar-about" data-bs-parent="#sidebar-menu">

                            <li class="nav-item">
                                <a class="nav-link {{request()->segment(3) == 'team' ? 'text-primary' : ''}}"
                                    href="{{route('teams')}}">
                                    <i class="icon">
                                        <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                            viewBox="0 0 24 24" fill="currentColor">
                                            <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <i class="sidenav-mini-icon"> Team </i>
                                    <span class="item-name">Team</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{request()->segment(3) == 'galleries' ? 'text-primary' : ''}}"
                                    href="{{route('galleries')}}">
                                    <i class="icon">
                                        <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                            viewBox="0 0 24 24" fill="currentColor">
                                            <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <i class="sidenav-mini-icon"> Gallery </i>
                                    <span class="item-name">Gallery</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{request()->segment(2) == 'subscribers' ? 'active' : ''}}"
                            href="{{route('subscribers')}}">
                            <i class="icon">
                                <svg viewBox="0 0 24 24" fill="none" class="icon-20" width="25"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M3.691 8.507c0 2.847 1.582 5.29 3.806 5.29 2.223 0 3.803-2.443 3.803-5.29 0-2.846-1.348-4.51-3.803-4.51-2.456 0-3.806 1.664-3.806 4.51zM1.326 19.192c.82.537 2.879.805 6.174.805 3.295 0 5.353-.268 6.174-.804a.5.5 0 0 0 .225-.453c-.152-2.228-2.287-3.343-6.403-3.343-4.117 0-6.249 1.115-6.395 3.344a.5.5 0 0 0 .225.451zM18 17a1 1 0 0 1-1-1v-3h-3a1 1 0 1 1 0-2h3V8a1 1 0 1 1 2 0v3h3a1 1 0 1 1 0 2h-3v3a1 1 0 0 1-1 1z"
                                            fill="currentColor"></path>
                                    </g>
                                </svg>

                            </i>
                            <span class="item-name">Subscribers</span>
                        </a>
                    </li>


                    <li>
                        <hr class="hr-horizontal">
                    </li>
                    <li class="nav-item static-item">
                        <a class="nav-link static-item disabled" tabindex="-1">
                            <span class="default-icon">Settings</span>
                            <span class="mini-icon">-</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{request()->segment(2) == 'seo' ? 'active' : ''}}" data-bs-toggle="collapse"
                            href="#sidebar-seo" role="button" aria-expanded="false" aria-controls="sidebar-seo">
                            <i class="icon">
                                <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <ellipse cx="10.5992" cy="10.6532" rx="8.59922" ry="8.65324" fill="currentColor">
                                    </ellipse>
                                    <path opacity="0.4"
                                        d="M20.6745 21.9553C20.3405 21.9445 20.0228 21.807 19.7853 21.5705L17.7488 19.1902C17.3122 18.7909 17.2765 18.1123 17.6688 17.6689C17.8524 17.4831 18.102 17.3787 18.3624 17.3787C18.6228 17.3787 18.8725 17.4831 19.0561 17.6689L21.6172 19.7181C21.9861 20.0957 22.0999 20.6563 21.9078 21.1492C21.7157 21.6422 21.2535 21.9754 20.7279 22L20.6745 21.9553Z"
                                        fill="currentColor"></path>
                                </svg>

                            </i>
                            <span class="item-name">Seo</span>
                            <i class="right-icon">
                                <svg class="icon-18" xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </i>
                        </a>
                        <ul class="sub-nav collapse" id="sidebar-seo" data-bs-parent="#sidebar-menu">
                            <li class="nav-item">
                                <a class="nav-link {{request()->segment(3) == 'tags' ? 'text-primary' : ''}}"
                                    href="{{route('tags')}}">
                                    <i class="icon">
                                        <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                            viewBox="0 0 24 24" fill="currentColor">
                                            <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <i class="sidenav-mini-icon"> U </i>
                                    <span class="item-name">Tags</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{request()->segment(3) == 'open-graph' ? 'text-primary' : ''}}"
                                    href="{{route('graphs')}}">
                                    <i class="icon">
                                        <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                            viewBox="0 0 24 24" fill="currentColor">
                                            <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <i class="sidenav-mini-icon"> Graph </i>
                                    <span class="item-name">Open Graphs</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{request()->segment(3) == 'twitter-card' ? 'text-primary' : ''}}"
                                    href="{{route('cards')}}">
                                    <i class="icon">
                                        <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                            viewBox="0 0 24 24" fill="currentColor">
                                            <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <i class="sidenav-mini-icon"> A </i>
                                    <span class="item-name">Twitter Card</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{request()->segment(3) == 'scripts' ? 'text-primary' : ''}}"
                                    href="{{route('scripts')}}">
                                    <i class="icon">
                                        <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10"
                                            viewBox="0 0 24 24" fill="currentColor">
                                            <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <i class="sidenav-mini-icon"> A </i>
                                    <span class="item-name">Scripts</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{request()->segment(2) == 'account'? 'active' : ''}}"
                            href="{{route('accounts')}}">
                            <i class="icon">
                                <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11.9488 14.54C8.49884 14.54 5.58789 15.1038 5.58789 17.2795C5.58789 19.4562 8.51765 20.0001 11.9488 20.0001C15.3988 20.0001 18.3098 19.4364 18.3098 17.2606C18.3098 15.084 15.38 14.54 11.9488 14.54Z"
                                        fill="currentColor"></path>
                                    <path opacity="0.4"
                                        d="M11.949 12.467C14.2851 12.467 16.1583 10.5831 16.1583 8.23351C16.1583 5.88306 14.2851 4 11.949 4C9.61293 4 7.73975 5.88306 7.73975 8.23351C7.73975 10.5831 9.61293 12.467 11.949 12.467Z"
                                        fill="currentColor"></path>
                                    <path opacity="0.4"
                                        d="M21.0881 9.21923C21.6925 6.84176 19.9205 4.70654 17.664 4.70654C17.4187 4.70654 17.1841 4.73356 16.9549 4.77949C16.9244 4.78669 16.8904 4.802 16.8725 4.82902C16.8519 4.86324 16.8671 4.90917 16.8895 4.93889C17.5673 5.89528 17.9568 7.0597 17.9568 8.30967C17.9568 9.50741 17.5996 10.6241 16.9728 11.5508C16.9083 11.6462 16.9656 11.775 17.0793 11.7948C17.2369 11.8227 17.3981 11.8371 17.5629 11.8416C19.2059 11.8849 20.6807 10.8213 21.0881 9.21923Z"
                                        fill="currentColor"></path>
                                    <path
                                        d="M22.8094 14.817C22.5086 14.1722 21.7824 13.73 20.6783 13.513C20.1572 13.3851 18.747 13.205 17.4352 13.2293C17.4155 13.232 17.4048 13.2455 17.403 13.2545C17.4003 13.2671 17.4057 13.2887 17.4316 13.3022C18.0378 13.6039 20.3811 14.916 20.0865 17.6834C20.074 17.8032 20.1698 17.9068 20.2888 17.8888C20.8655 17.8059 22.3492 17.4853 22.8094 16.4866C23.0637 15.9589 23.0637 15.3456 22.8094 14.817Z"
                                        fill="currentColor"></path>
                                    <path opacity="0.4"
                                        d="M7.04459 4.77973C6.81626 4.7329 6.58077 4.70679 6.33543 4.70679C4.07901 4.70679 2.30701 6.84201 2.9123 9.21947C3.31882 10.8216 4.79355 11.8851 6.43661 11.8419C6.60136 11.8374 6.76343 11.8221 6.92013 11.7951C7.03384 11.7753 7.09115 11.6465 7.02668 11.551C6.3999 10.6234 6.04263 9.50765 6.04263 8.30991C6.04263 7.05904 6.43303 5.89462 7.11085 4.93913C7.13234 4.90941 7.14845 4.86348 7.12696 4.82926C7.10906 4.80135 7.07593 4.78694 7.04459 4.77973Z"
                                        fill="currentColor"></path>
                                    <path
                                        d="M3.32156 13.5127C2.21752 13.7297 1.49225 14.1719 1.19139 14.8167C0.936203 15.3453 0.936203 15.9586 1.19139 16.4872C1.65163 17.4851 3.13531 17.8066 3.71195 17.8885C3.83104 17.9065 3.92595 17.8038 3.91342 17.6832C3.61883 14.9167 5.9621 13.6046 6.56918 13.3029C6.59425 13.2885 6.59962 13.2677 6.59694 13.2542C6.59515 13.2452 6.5853 13.2317 6.5656 13.2299C5.25294 13.2047 3.84358 13.3848 3.32156 13.5127Z"
                                        fill="currentColor"></path>
                                </svg>
                            </i>
                            <span class="item-name">Accounts</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{request()->segment(2) == 'contact-details' ? 'active' : ''}}"
                            href="{{route('contactDetails')}}">
                            <i class="icon">
                                <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M11.5317 12.4724C15.5208 16.4604 16.4258 11.8467 18.9656 14.3848C21.4143 16.8328 22.8216 17.3232 19.7192 20.4247C19.3306 20.737 16.8616 24.4943 8.1846 15.8197C-0.493478 7.144 3.26158 4.67244 3.57397 4.28395C6.68387 1.17385 7.16586 2.58938 9.61449 5.03733C12.1544 7.5765 7.54266 8.48441 11.5317 12.4724Z"
                                        fill="currentColor"></path>
                                </svg>
                            </i>
                            <span class="item-name">Contacts</span>
                        </a>
                    </li>

                    <li class="nav-item mb-5">
                        <a class="nav-link {{request()->segment(2) == 'faqs' ? 'active' : ''}}"
                            href="{{route('faqs')}}">
                            <i class="icon">
                                <svg class="icon-20" width="20" fill="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path
                                            d="M12,1A11,11,0,1,0,23,12,11.013,11.013,0,0,0,12,1Zm0,20a9,9,0,1,1,9-9A9.011,9.011,0,0,1,12,21Zm1-4.5v2H11v-2Zm3-7a3.984,3.984,0,0,1-1.5,3.122A3.862,3.862,0,0,0,13.063,15H11.031a5.813,5.813,0,0,1,2.219-3.936A2,2,0,0,0,13.1,7.832a2.057,2.057,0,0,0-2-.14A1.939,1.939,0,0,0,10,9.5,1,1,0,0,1,8,9.5V9.5a3.909,3.909,0,0,1,2.319-3.647,4.061,4.061,0,0,1,3.889.315A4,4,0,0,1,16,9.5Z">
                                        </path>
                                    </g>
                                </svg>
                            </i>
                            <span class="item-name">FAQs</span>

                        </a>

                    </li>

                </ul>
                <!-- Sidebar Menu End -->
            </div>
        </div>
        <div class="sidebar-footer"></div>
    </aside>
    <main class="main-content">
        <div class="position-relative iq-banner">
            <!--Nav Start-->
            <nav class="nav navbar navbar-expand-lg navbar-light iq-navbar">
                <div class="container-fluid navbar-inner">
                    <a href="#" class="navbar-brand">
                        <!--Logo start-->
                        <!--logo End-->

                        <!--Logo start-->
                        <div class="logo-main">
                            <div class="logo-normal">
                                <img src="{{asset('main/img/Nex Gen.png')}}" class="rounded-circle" width="100"
                                    alt="Logo">
                            </div>
                        </div>
                        <!--logo End-->
                    </a>
                    <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
                        <i class="icon">
                            <svg width="20px" class="icon-20" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z" />
                            </svg>
                        </i>
                    </div>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon">
                            <span class="mt-2 navbar-toggler-bar bar1"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                        </span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="mb-2 navbar-nav ms-auto align-items-center navbar-list mb-lg-0">
                            <li class="nav-item dropdown">
                                @if(auth()->user())
                                <a class="py-0 nav-link d-flex align-items-center" href="#" id="navbarDropdown"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="rounded-circle" style="border:1px solid #2e8fff">
                                        <img src="{{asset('main/img/Nex Gen.png')}}" alt="User-Profile"
                                            class="img-fluid avatar avatar-70">
                                    </span>
                                    <div class="caption ms-1 d-none d-md-block ">
                                        <h6 class="mb-0 caption-title text-dark">{{auth()->user()->name}}</h6>
                                        <p class="mb-0 caption-sub-title">{{auth()->user()->email}}</p>
                                    </div>
                                </a>
                                @endif
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="">Profile</a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <form action="" method="POST">
                                            @csrf
                                            <button class="dropdown-item" type="submit">
                                                Logout
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav> <!-- Nav Header Component Start -->
            <div class="iq-navbar-header" style="height: 215px;">
                <div class="container-fluid iq-container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="flex-wrap d-flex justify-content-between align-items-center">
                                <div>
                                    <h4 class="text-capitalize mt-5">Dashboard <svg class="icon-20" width="20"
                                            viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8.5 5L15.5 12L8.5 19" stroke="currentColor" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                        @if (request()->segment(2)
                                        != '')
                                        {{str_replace('-',' ',request()->segment(2))}}
                                        @else
                                        Home
                                        @endif
                                        @if (request()->segment(3)
                                        != '')
                                        <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8.5 5L15.5 12L8.5 19" stroke="currentColor" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                        {{str_replace('-',' ',request()->segment(3))}}
                                        @endif
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="iq-header-img">
                    <img src="{{asset('assets/images/dashboard/top-header.png')}}" alt="header"
                        class="theme-color-default-img img-fluid w-100 h-100 animated-scaleX">
                    <img src="{{asset('assets/images/dashboard/top-header1.png')}}" alt="header"
                        class="theme-color-purple-img img-fluid w-100 h-100 animated-scaleX">
                    <img src="{{asset('assets/images/dashboard/top-header2.png')}}" alt="header"
                        class="theme-color-blue-img img-fluid w-100 h-100 animated-scaleX">
                    <img src="{{asset('assets/images/dashboard/top-header3.png')}}" alt="header"
                        class="theme-color-green-img img-fluid w-100 h-100 animated-scaleX">
                    <img src="{{asset('assets/images/dashboard/top-header4.png')}}" alt="header"
                        class="theme-color-yellow-img img-fluid w-100 h-100 animated-scaleX">
                    <img src="{{asset('assets/images/dashboard/top-header5.png')}}" alt="header"
                        class="theme-color-pink-img img-fluid w-100 h-100 animated-scaleX">
                </div>
            </div> <!-- Nav Header Component End -->
            <!--Nav End-->
        </div>
        {{$slot}}
        @if(session()->has('success'))
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
                    <p class="mb-0"> {{session('success')}}</p>
                </div>
            </div>
        </div>
        @endif
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
        <div id="flash-error" class="error flash p-3 p-md-4 p-lg-3 p-xl-3 position-fixed bg-white rounded">
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

    </main>
    <a class="btn btn-fixed-end btn-primary btn-icon btn-setting" data-bs-toggle="offcanvas"
        data-bs-target="#offcanvasExample" role="button" aria-controls="offcanvasExample">
        <svg width="24" viewBox="0 0 24 24" class="animated-rotate icon-24" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd"
                d="M20.8064 7.62361L20.184 6.54352C19.6574 5.6296 18.4905 5.31432 17.5753 5.83872V5.83872C17.1397 6.09534 16.6198 6.16815 16.1305 6.04109C15.6411 5.91402 15.2224 5.59752 14.9666 5.16137C14.8021 4.88415 14.7137 4.56839 14.7103 4.24604V4.24604C14.7251 3.72922 14.5302 3.2284 14.1698 2.85767C13.8094 2.48694 13.3143 2.27786 12.7973 2.27808H11.5433C11.0367 2.27807 10.5511 2.47991 10.1938 2.83895C9.83644 3.19798 9.63693 3.68459 9.63937 4.19112V4.19112C9.62435 5.23693 8.77224 6.07681 7.72632 6.0767C7.40397 6.07336 7.08821 5.98494 6.81099 5.82041V5.82041C5.89582 5.29601 4.72887 5.61129 4.20229 6.52522L3.5341 7.62361C3.00817 8.53639 3.31916 9.70261 4.22975 10.2323V10.2323C4.82166 10.574 5.18629 11.2056 5.18629 11.8891C5.18629 12.5725 4.82166 13.2041 4.22975 13.5458V13.5458C3.32031 14.0719 3.00898 15.2353 3.5341 16.1454V16.1454L4.16568 17.2346C4.4124 17.6798 4.82636 18.0083 5.31595 18.1474C5.80554 18.2866 6.3304 18.2249 6.77438 17.976V17.976C7.21084 17.7213 7.73094 17.6516 8.2191 17.7822C8.70725 17.9128 9.12299 18.233 9.37392 18.6717C9.53845 18.9489 9.62686 19.2646 9.63021 19.587V19.587C9.63021 20.6435 10.4867 21.5 11.5433 21.5H12.7973C13.8502 21.5001 14.7053 20.6491 14.7103 19.5962V19.5962C14.7079 19.088 14.9086 18.6 15.2679 18.2407C15.6272 17.8814 16.1152 17.6807 16.6233 17.6831C16.9449 17.6917 17.2594 17.7798 17.5387 17.9394V17.9394C18.4515 18.4653 19.6177 18.1544 20.1474 17.2438V17.2438L20.8064 16.1454C21.0615 15.7075 21.1315 15.186 21.001 14.6964C20.8704 14.2067 20.55 13.7894 20.1108 13.5367V13.5367C19.6715 13.284 19.3511 12.8666 19.2206 12.3769C19.09 11.8873 19.16 11.3658 19.4151 10.928C19.581 10.6383 19.8211 10.3982 20.1108 10.2323V10.2323C21.0159 9.70289 21.3262 8.54349 20.8064 7.63277V7.63277V7.62361Z"
                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            <circle cx="12.1747" cy="11.8891" r="2.63616" stroke="currentColor" stroke-width="1.5"
                stroke-linecap="round" stroke-linejoin="round"></circle>
        </svg>
    </a>
    <!-- Wrapper End-->
    <!-- offcanvas start -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample" data-bs-scroll="true"
        data-bs-backdrop="true" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <div class="d-flex align-items-center">
                <h3 class="offcanvas-title me-3" id="offcanvasExampleLabel">Settings</h3>
            </div>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body data-scrollbar">
            <div class="row">
                <div class="col-lg-12">
                    <h5 class="mb-3">Scheme</h5>
                    <div class="d-grid gap-3 grid-cols-3 mb-4">
                        <div class="btn btn-border" data-setting="color-mode" data-name="color" data-value="auto">
                            <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill="currentColor" d="M7,2V13H10V22L17,10H13L17,2H7Z" />
                            </svg>
                            <span class="ms-2 "> Auto </span>
                        </div>

                        <div class="btn btn-border" data-setting="color-mode" data-name="color" data-value="dark">
                            <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill="currentColor"
                                    d="M9,2C7.95,2 6.95,2.16 6,2.46C10.06,3.73 13,7.5 13,12C13,16.5 10.06,20.27 6,21.54C6.95,21.84 7.95,22 9,22A10,10 0 0,0 19,12A10,10 0 0,0 9,2Z" />
                            </svg>
                            <span class="ms-2 "> Dark </span>
                        </div>
                        <div class="btn btn-border active" data-setting="color-mode" data-name="color"
                            data-value="light">
                            <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill="currentColor"
                                    d="M12,8A4,4 0 0,0 8,12A4,4 0 0,0 12,16A4,4 0 0,0 16,12A4,4 0 0,0 12,8M12,18A6,6 0 0,1 6,12A6,6 0 0,1 12,6A6,6 0 0,1 18,12A6,6 0 0,1 12,18M20,8.69V4H15.31L12,0.69L8.69,4H4V8.69L0.69,12L4,15.31V20H8.69L12,23.31L15.31,20H20V15.31L23.31,12L20,8.69Z" />
                            </svg>
                            <span class="ms-2 "> Light</span>
                        </div>
                    </div>
                    <hr class="hr-horizontal">
                    <div class="d-flex align-items-center justify-content-between">
                        <h5 class="mt-4 mb-3">Color Customizer</h5>
                        <button class="btn btn-transparent p-0 border-0" data-value="theme-color-default"
                            data-info="#079aa2" data-setting="color-mode1" data-name="color" data-bs-toggle="tooltip"
                            data-bs-placement="top" title="" data-bs-original-title="Default">
                            <svg class="icon-18" width="18" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M21.4799 12.2424C21.7557 12.2326 21.9886 12.4482 21.9852 12.7241C21.9595 14.8075 21.2975 16.8392 20.0799 18.5506C18.7652 20.3986 16.8748 21.7718 14.6964 22.4612C12.518 23.1505 10.1711 23.1183 8.01299 22.3694C5.85488 21.6205 4.00382 20.196 2.74167 18.3126C1.47952 16.4293 0.875433 14.1905 1.02139 11.937C1.16734 9.68346 2.05534 7.53876 3.55018 5.82945C5.04501 4.12014 7.06478 2.93987 9.30193 2.46835C11.5391 1.99683 13.8711 2.2599 15.9428 3.2175L16.7558 1.91838C16.9822 1.55679 17.5282 1.62643 17.6565 2.03324L18.8635 5.85986C18.945 6.11851 18.8055 6.39505 18.549 6.48314L14.6564 7.82007C14.2314 7.96603 13.8445 7.52091 14.0483 7.12042L14.6828 5.87345C13.1977 5.18699 11.526 4.9984 9.92231 5.33642C8.31859 5.67443 6.8707 6.52052 5.79911 7.74586C4.72753 8.97119 4.09095 10.5086 3.98633 12.1241C3.8817 13.7395 4.31474 15.3445 5.21953 16.6945C6.12431 18.0446 7.45126 19.0658 8.99832 19.6027C10.5454 20.1395 12.2278 20.1626 13.7894 19.6684C15.351 19.1743 16.7062 18.1899 17.6486 16.8652C18.4937 15.6773 18.9654 14.2742 19.0113 12.8307C19.0201 12.5545 19.2341 12.3223 19.5103 12.3125L21.4799 12.2424Z"
                                    fill="#31BAF1" />
                                <path
                                    d="M20.0941 18.5594C21.3117 16.848 21.9736 14.8163 21.9993 12.7329C22.0027 12.4569 21.7699 12.2413 21.4941 12.2512L19.5244 12.3213C19.2482 12.3311 19.0342 12.5633 19.0254 12.8395C18.9796 14.283 18.5078 15.6861 17.6628 16.8739C16.7203 18.1986 15.3651 19.183 13.8035 19.6772C12.2419 20.1714 10.5595 20.1483 9.01246 19.6114C7.4654 19.0746 6.13845 18.0534 5.23367 16.7033C4.66562 15.8557 4.28352 14.9076 4.10367 13.9196C4.00935 18.0934 6.49194 21.37 10.008 22.6416C10.697 22.8908 11.4336 22.9852 12.1652 22.9465C13.075 22.8983 13.8508 22.742 14.7105 22.4699C16.8889 21.7805 18.7794 20.4073 20.0941 18.5594Z"
                                    fill="#0169CA" />
                            </svg>
                        </button>
                    </div>
                    <div class="grid-cols-5 mb-4 d-grid gap-x-2">
                        <div class="btn btn-border bg-transparent" data-value="theme-color-blue" data-info="#573BFF"
                            data-setting="color-mode1" data-name="color" data-bs-toggle="tooltip"
                            data-bs-placement="top" title="" data-bs-original-title="Theme-1">
                            <svg class="customizer-btn icon-32" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                width="32">
                                <circle cx="12" cy="12" r="10" fill="#00C3F9" />
                                <path d="M2,12 a1,1 1 1,0 20,0" fill="#573BFF" />
                            </svg>
                        </div>
                        <div class="btn btn-border bg-transparent" data-value="theme-color-gray" data-info="#FD8D00"
                            data-setting="color-mode1" data-name="color" data-bs-toggle="tooltip"
                            data-bs-placement="top" title="" data-bs-original-title="Theme-2">
                            <svg class="customizer-btn icon-32" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                width="32">
                                <circle cx="12" cy="12" r="10" fill="#91969E" />
                                <path d="M2,12 a1,1 1 1,0 20,0" fill="#FD8D00" />
                            </svg>
                        </div>
                        <div class="btn btn-border bg-transparent" data-value="theme-color-red" data-info="#366AF0"
                            data-setting="color-mode1" data-name="color" data-bs-toggle="tooltip"
                            data-bs-placement="top" title="" data-bs-original-title="Theme-3">
                            <svg class="customizer-btn icon-32" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                width="32">
                                <circle cx="12" cy="12" r="10" fill="#DB5363" />
                                <path d="M2,12 a1,1 1 1,0 20,0" fill="#366AF0" />
                            </svg>
                        </div>
                        <div class="btn btn-border bg-transparent" data-value="theme-color-yellow" data-info="#6410F1"
                            data-setting="color-mode1" data-name="color" data-bs-toggle="tooltip"
                            data-bs-placement="top" title="" data-bs-original-title="Theme-4">
                            <svg class="customizer-btn icon-32" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                width="32">
                                <circle cx="12" cy="12" r="10" fill="#EA6A12" />
                                <path d="M2,12 a1,1 1 1,0 20,0" fill="#6410F1" />
                            </svg>
                        </div>
                        <div class="btn btn-border bg-transparent" data-value="theme-color-pink" data-info="#25C799"
                            data-setting="color-mode1" data-name="color" data-bs-toggle="tooltip"
                            data-bs-placement="top" title="" data-bs-original-title="Theme-5">
                            <svg class="customizer-btn icon-32" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                width="32">
                                <circle cx="12" cy="12" r="10" fill="#E586B3" />
                                <path d="M2,12 a1,1 1 1,0 20,0" fill="#25C799" />
                            </svg>
                        </div>

                    </div>
                    <hr class="hr-horizontal">
                    <h5 class="mb-3 mt-4">Scheme Direction</h5>
                    <div class="d-grid gap-3 grid-cols-2 mb-4">
                        <div class="text-center">
                            <img src="{{asset('assets/images/settings/dark/01.png')}}" alt="ltr"
                                class="mode dark-img img-fluid btn-border p-0 flex-column active mb-2"
                                data-setting="dir-mode" data-name="dir" data-value="ltr">
                            <img src="{{asset('assets/images/settings/light/01.png')}}" alt="ltr"
                                class="mode light-img img-fluid btn-border p-0 flex-column active mb-2"
                                data-setting="dir-mode" data-name="dir" data-value="ltr">
                            <span class=" mt-2"> LTR </span>
                        </div>
                        <div class="text-center">
                            <img src="{{asset('assets/images/settings/dark/02.png')}}" alt=""
                                class="mode dark-img img-fluid btn-border p-0 flex-column mb-2" data-setting="dir-mode"
                                data-name="dir" data-value="rtl">
                            <img src="{{asset('assets/images/settings/light/02.png')}}" alt=""
                                class="mode light-img img-fluid btn-border p-0 flex-column mb-2" data-setting="dir-mode"
                                data-name="dir" data-value="rtl">
                            <span class="mt-2 "> RTL </span>
                        </div>
                    </div>
                    <hr class="hr-horizontal">
                    <h5 class="mt-4 mb-3">Sidebar Color</h5>
                    <div class="d-grid gap-3 grid-cols-2 mb-4">
                        <div class="btn btn-border d-block" data-setting="sidebar" data-name="sidebar-color"
                            data-value="sidebar-white">
                            <span class=""> Default </span>
                        </div>
                        <div class="btn btn-border d-block" data-setting="sidebar" data-name="sidebar-color"
                            data-value="sidebar-dark">
                            <span class=""> Dark </span>
                        </div>
                        <div class="btn btn-border d-block" data-setting="sidebar" data-name="sidebar-color"
                            data-value="sidebar-color">
                            <span class=""> Color </span>
                        </div>

                        <div class="btn btn-border d-block" data-setting="sidebar" data-name="sidebar-color"
                            data-value="sidebar-transparent">
                            <span class=""> Transparent </span>
                        </div>
                    </div>
                    <hr class="hr-horizontal">
                    <h5 class="mt-4 mb-3">Sidebar Types</h5>
                    <div class="d-grid gap-3 grid-cols-3 mb-4">
                        <div class="text-center">
                            <img src="{{asset('assets/images/settings/dark/03.png')}}" alt="mini"
                                class="mode dark-img img-fluid btn-border p-0 flex-column mb-2" data-setting="sidebar"
                                data-name="sidebar-type" data-value="sidebar-mini">
                            <img src="{{asset('assets/images/settings/light/03.png')}}" alt="mini"
                                class="mode light-img img-fluid btn-border p-0 flex-column mb-2" data-setting="sidebar"
                                data-name="sidebar-type" data-value="sidebar-mini">
                            <span class="mt-2">Mini</span>
                        </div>
                        <div class="text-center">
                            <img src="{{asset('assets/images/settings/dark/04.png')}}" alt="hover"
                                class="mode dark-img img-fluid btn-border p-0 flex-column mb-2" data-setting="sidebar"
                                data-name="sidebar-type" data-value="sidebar-hover" data-extra-value="sidebar-mini">
                            <img src="{{asset('assets/images/settings/light/04.png')}}" alt="hover"
                                class="mode light-img img-fluid btn-border p-0 flex-column mb-2" data-setting="sidebar"
                                data-name="sidebar-type" data-value="sidebar-hover" data-extra-value="sidebar-mini">
                            <span class="mt-2">Hover</span>
                        </div>
                        <div class="text-center">
                            <img src="{{asset('assets/images/settings/dark/05.png')}}" alt="boxed"
                                class="mode dark-img img-fluid btn-border p-0 flex-column mb-2" data-setting="sidebar"
                                data-name="sidebar-type" data-value="sidebar-boxed">
                            <img src="{{asset('assets/images/settings/light/05.png')}}" alt="boxed"
                                class="mode light-img img-fluid btn-border p-0 flex-column mb-2" data-setting="sidebar"
                                data-name="sidebar-type" data-value="sidebar-boxed">
                            <span class="mt-2">Boxed</span>
                        </div>
                    </div>
                    <hr class="hr-horizontal">
                    <h5 class="mt-4 mb-3">Sidebar Active Style</h5>
                    <div class="d-grid gap-3 grid-cols-2 mb-4">
                        <div class="text-center">
                            <img src="{{asset('assets/images/settings/dark/06.png')}}" alt="rounded-one-side"
                                class="mode dark-img img-fluid btn-border p-0 flex-column mb-2" data-setting="sidebar"
                                data-name="sidebar-item" data-value="navs-rounded">
                            <img src="{{asset('assets/images/settings/light/06.png')}}" alt="rounded-one-side"
                                class="mode light-img img-fluid btn-border p-0 flex-column mb-2" data-setting="sidebar"
                                data-name="sidebar-item" data-value="navs-rounded">
                            <span class="mt-2">Rounded One Side</span>
                        </div>
                        <div class="text-center">
                            <img src="{{asset('assets/images/settings/dark/07.png')}}" alt="rounded-all"
                                class="mode dark-img img-fluid btn-border p-0 flex-column active mb-2"
                                data-setting="sidebar" data-name="sidebar-item" data-value="navs-rounded-all">
                            <img src="{{asset('assets/images/settings/light/07.png')}}" alt="rounded-all"
                                class="mode light-img img-fluid btn-border p-0 flex-column active mb-2"
                                data-setting="sidebar" data-name="sidebar-item" data-value="navs-rounded-all">
                            <span class="mt-2">Rounded All</span>
                        </div>
                        <div class="text-center">
                            <img src="{{asset('assets/images/settings/dark/08.png')}}" alt="pill-one-side"
                                class="mode dark-img img-fluid btn-border p-0 flex-column mb-2" data-setting="sidebar"
                                data-name="sidebar-item" data-value="navs-pill">
                            <img src="{{asset('assets/images/settings/light/09.png')}}" alt="pill-one-side"
                                class="mode light-img img-fluid btn-border p-0 flex-column mb-2" data-setting="sidebar"
                                data-name="sidebar-item" data-value="navs-pill">
                            <span class="mt-2">Pill One Side</span>
                        </div>
                        <div class="text-center">
                            <img src="{{asset('assets/images/settings/dark/09.png')}}" alt="pill-all"
                                class="mode dark-img img-fluid btn-border p-0 flex-column" data-setting="sidebar"
                                data-name="sidebar-item" data-value="navs-pill-all">
                            <img src="{{asset('assets/images/settings/light/08.png')}}" alt="pill-all"
                                class="mode light-img img-fluid btn-border p-0 flex-column" data-setting="sidebar"
                                data-name="sidebar-item" data-value="navs-pill-all">
                            <span class="mt-2">Pill All</span>
                        </div>
                    </div>
                    <hr class="hr-horizontal">
                    <h5 class="mt-4 mb-3">Navbar Style</h5>
                    <div class="d-grid gap-3 grid-cols-2 ">
                        <div class=" text-center">
                            <img src="{{asset('assets/images/settings/dark/11.png')}}" alt="image"
                                class="mode dark-img img-fluid btn-border p-0 flex-column mb-2" data-setting="navbar"
                                data-target=".iq-navbar" data-name="navbar-type" data-value="nav-glass">
                            <img src="{{asset('assets/images/settings/light/10.png')}}" alt="image"
                                class="mode light-img img-fluid btn-border p-0 flex-column mb-2" data-setting="navbar"
                                data-target=".iq-navbar" data-name="navbar-type" data-value="nav-glass">
                            <span class="mt-2">Glass</span>
                        </div>
                        <div class="text-center">
                            <img src="{{asset('assets/images/settings/dark/10.png')}}" alt="color"
                                class="mode dark-img img-fluid btn-border p-0 flex-column mb-2" data-setting="navbar"
                                data-target=".iq-navbar-header" data-name="navbar-type" data-value="navs-bg-color">
                            <img src="{{asset('assets/images/settings/light/11.png')}}" alt="color"
                                class="mode light-img img-fluid btn-border p-0 flex-column mb-2" data-setting="navbar"
                                data-target=".iq-navbar-header" data-name="navbar-type" data-value="navs-bg-color">
                            <span class="mt-2">Color</span>
                        </div>
                        <div class=" text-center">
                            <img src="{{asset('assets/images/settings/dark/12.png')}}" alt="sticky"
                                class="mode dark-img img-fluid btn-border p-0 flex-column mb-2" data-setting="navbar"
                                data-target=".iq-navbar" data-name="navbar-type" data-value="navs-sticky">
                            <img src="{{asset('assets/images/settings/light/12.png')}}" alt="sticky"
                                class="mode light-img img-fluid btn-border p-0 flex-column mb-2" data-setting="navbar"
                                data-target=".iq-navbar" data-name="navbar-type" data-value="navs-sticky">
                            <span class="mt-2">Sticky</span>
                        </div>
                        <div class="text-center">
                            <img src="{{asset('assets/images/settings/dark/13.png')}}" alt="transparent"
                                class="mode dark-img img-fluid btn-border p-0 flex-column mb-2" data-setting="navbar"
                                data-target=".iq-navbar" data-name="navbar-type" data-value="navs-transparent">
                            <img src="{{asset('assets/images/settings/light/13.png')}}" alt="transparent"
                                class="mode light-img img-fluid btn-border p-0 flex-column mb-2" data-setting="navbar"
                                data-target=".iq-navbar" data-name="navbar-type" data-value="navs-transparent">
                            <span class="mt-2">Transparent</span>
                        </div>
                        <div class="btn btn-border active col-span-full mt-4 d-block" data-setting="navbar"
                            data-name="navbar-default" data-value="default">
                            <span class=""> Default Navbar</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @livewireScripts
    <!-- Include jQuery first -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- Include Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script src="{{asset('assets/js/core/libs.min.js')}}"></script>

    <!-- External Library Bundle Script -->
    <script src="{{asset('assets/js/core/external.min.js')}}"></script>

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
    <!-- App Script -->
    @stack('scripts')
    <script src="{{asset('assets/js/main-ui.js')}}" defer></script>
    <script src="{{asset('assets/js/flash.js')}}" defer></script>
    <script src="{{ asset('assets/js/flatpicker.js') }}"></script>
</body>

</html>