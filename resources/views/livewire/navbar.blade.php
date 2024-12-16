<header class="construct header-curvy">

    <div class="container ">
        <div class="clearfix nav-container">
            <div class="pull-left logo d-sm-none">
                <a href="{{route('index')}}">
                    <img src="https://rangin.com.np/assets/images/logo.png" width="150" alt="Plumberx">
                </a>
            </div>
            <nav class="pull-right mainmenu-container clearfix">
                <ul class="mainmenu pull-right">

                    <li
                        class="dropdown {{request()->segment(1)=='mission' || request()->segment(1)=='team' ? 'current' : ''}}">
                        <a href="#">About Us</a>
                        <ul class="submenu">
                            <li><a href="{{route('home.mission')}}">Our Mission</a></li>
                            <li><a href="{{route('home.team')}}">Our Team</a></li>
                            <li><a href="404.html">FAQs</a></li>
                        </ul>
                    </li>

                    <li class="{{request()->segment(1)=='our-business' ? 'current' : ''}}"><a
                            href="{{route('home.business')}}">Our Business</a>
                    </li>
                    <li class="{{request()->segment(1)=='projects' ? 'current' : ''}}">
                        <a href="{{route('home.projects')}}">Projects</a>
                    </li>

                    <li class="{{request()->segment(1)=='news' ? 'current' : ''}}">
                        <a href="{{route('home.blogs')}}">News</a>
                    </li>
                    <li class="{{request()->segment(1)=='contact' ? 'current' : ''}}"><a
                            href="{{route('home.contact')}}">Contact Us</a></li>
                </ul>
            </nav>
        </div>
        <div class="ham-menu">
            <div class="mobile-nav">
                <div class="brand-logo">
                    <img src="https://rangin.com.np/assets/images/logo.png" width="150" alt="">
                </div>
                <button class="toggle-nav"><i class="fa fa-bars"></i></button>
            </div>
            <div class="dropdown-menu">
                <ul>
                    <li><a href="{{route('index')}}" class="{{request()->segment(1)=='' ? 'current' : ''}}">Home</a>
                    </li>
                    <li class="has-submenu">
                        <a href="#" class="{{request()->segment(1)=='mission' || request()->segment(1)=='team' ? 'current' : ''}}">About Us</a>
                        <ul class="submenu">
                            <li><a href="{{route('home.mission')}}">Our Mission</a></li>
                            <li><a href="{{route('home.team')}}">Our Team</a></li>
                            <li><a href="#">FAQs</a></li>
                        </ul>
                    </li>
                    <li><a href="{{route('home.business')}}"
                            class="{{request()->segment(1)=='our-business' ? 'current' : ''}}">Our Business</a></li>

                    <li><a href="{{route('home.projects')}}"
                            class="{{request()->segment(1)=='projects' ? 'current' : ''}}">Projects</a></li>
                    <li><a href="{{route('home.blogs')}}"
                            class="{{request()->segment(1)=='news' ? 'current' : ''}}">News</a></li>
                    <li><a href="{{route('home.contact')}}"
                            class="{{request()->segment(1)=='contact' ? 'current' : ''}}">Contact</a></li>
                </ul>
            </div>
        </div>
    </div>

</header>