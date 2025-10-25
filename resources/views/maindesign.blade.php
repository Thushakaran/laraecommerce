<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">

    <title>
        Giftos
    </title>

    <!-- slider stylesheet -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="frontend/css/bootstrap.css" />

    <!-- Custom styles for this template -->
    <link href="frontend/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="frontend/css/responsive.css" rel="stylesheet" />

    <!-- Custom Navigation Styles -->
    <style>
        .navbar-nav .nav-item {
            margin: 0 10px;
        }

        .navbar-nav .nav-link {
            color: #333 !important;
            font-weight: 500;
            padding: 10px 15px !important;
            border-radius: 5px;
            transition: all 0.3s ease;
            background: none !important;
            /* Remove background color including white */
        }

        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-item.active .nav-link {
            color: white !important;
            background: none !important;
            /* Prevent any background color on hover or active */
        }

        .user_option {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .dropdown-toggle {
            color: #333 !important;
            text-decoration: none;
            padding: 8px 15px;
            border-radius: 5px;
            transition: all 0.3s ease;
            background: none !important;
            /* Remove background color */
        }

        .dropdown-toggle:hover {
            color: white !important;
            background: none !important;
        }

        .dropdown-menu {
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 10px 0;
        }

        .dropdown-item {
            padding: 8px 20px;
            color: #333;
            transition: all 0.3s ease;
            background: none !important;
            /* Remove background color */
        }

        .dropdown-item:hover {
            color: #f7444e;
            background: none !important;
        }

        .cart-link {
            position: relative;
            color: #333 !important;
            text-decoration: none;
            padding: 8px 15px;
            border-radius: 5px;
            transition: all 0.3s ease;
            background: none !important;
            /* Remove background color */
        }

        .cart-link:hover {
            color: white !important;
            background: none !important;
        }

        .cart-count {
            position: absolute;
            top: -5px;
            right: -5px;
            /* background-color: #f7444e;  Remove red background */
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            font-size: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            background: none !important;
            /* Remove any default background */
            border: 1px solid #ccc;
            /* Optionally add border for visibility */
        }

        .btn-sm {
            padding: 6px 12px;
            font-size: 14px;
        }

        @media (max-width: 768px) {
            .user_option {
                flex-direction: column;
                gap: 10px;
                margin-top: 15px;
            }

            .navbar-nav {
                text-align: center;
                margin-top: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        <header class="header_section">
            <nav class="navbar navbar-expand-lg custom_nav-container ">
                <a class="navbar-brand" href="frontend/index.html">
                    <span>
                        Giftos
                    </span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class=""></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item {{ request()->routeIs('index') ? 'active' : '' }}">
                            <a class="nav-link" href="{{route('index')}}">
                                <i class="fa fa-home"></i> Home
                            </a>
                        </li>
                        <li class="nav-item {{ request()->routeIs('viewallproducts') ? 'active' : '' }}">
                            <a class="nav-link" href="{{route('viewallproducts')}}">
                                <i class="fa fa-shopping-bag"></i> Shop
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact">
                                <i class="fa fa-envelope"></i> Contact
                            </a>
                        </li>
                    </ul>
                    <div class="user_option">
                        @if(Auth::check())
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-user"></i>
                                <span>{{ Auth::user()->name }}</span>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{route('dashboard')}}">
                                    <i class="fa fa-tachometer-alt"></i> Dashboard
                                </a>
                                <a class="dropdown-item" href="{{route('myorders')}}">
                                    <i class="fa fa-list-alt"></i> My Orders
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out-alt"></i> Logout
                                </a>
                            </div>
                        </div>
                        @else
                        <a href="{{route('login')}}" class="px-3 py-1 rounded text-primary mr-2 login-link" style="transition:0.2s;">
                            <i class="fa fa-sign-in-alt"></i> Login
                        </a>
                        <a href="{{route('register')}}" class="px-3 py-1 rounded text-primary register-link" style="transition:0.2s;">
                            <i class="fa fa-user-plus"></i> Sign Up
                        </a>
                        @endif

                        <a href="{{route('cardproducts')}}" class="cart-link">
                            <i class="fa fa-shopping-cart"></i>
                            <span class="cart-count">{{$count}}</span>
                        </a>
                    </div>

                    @if(Auth::check())
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    @endif
                </div>
            </nav>
        </header>
        <!-- end header section -->
        <!-- slider section -->

        <section class="slider_section">
            <div class="slider_container">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="detail-box">
                                            <h1>
                                                Welcome To Our <br>
                                                Gift Shop
                                            </h1>
                                            <p>
                                                Sequi perspiciatis nulla reiciendis, rem, tenetur impedit, eveniet non necessitatibus error distinctio mollitia suscipit. Nostrum fugit doloribus consequatur distinctio esse, possimus maiores aliquid repellat beatae cum, perspiciatis enim, accusantium perferendis.
                                            </p>
                                            <a href="">
                                                Contact Us
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-5 ">
                                        <div class="img-box">
                                            <img style="width:600px" src="frontend/images/image3.jpeg" alt="" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </section>

        <!-- end slider section -->
    </div>
    <!-- end hero area -->

    <!-- shop section -->

    <section class="shop_section layout_padding">
        @yield('index')
        @yield('product_details')
        @yield('allproducts')
        @yield('view_cart_products')
        @yield('stripe')
    </section>

    <!-- end shop section -->







    <!-- contact section -->

    <section class="contact_section ">
        <div class="container px-0">
            <div class="heading_container ">
                <h2 class="">
                    Contact Us
                </h2>
            </div>
        </div>
        <div class="container container-bg">
            <div class="row">
                <div class="col-lg-7 col-md-6 px-0">
                    <div class="map_container">
                        <div class="map-responsive">
                            <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&q=Eiffel+Tower+Paris+France" width="600" height="300" frameborder="0" style="border:0; width: 100%; height:100%" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-5 px-0">
                    <form action="{{ route('index') }}" method="POST">
                        @csrf
                        <div>
                            <input type="text" name="name" placeholder="Name" required />
                        </div>
                        <div>
                            <input type="email" name="email" placeholder="Email" required />
                        </div>
                        <div>
                            <input type="text" name="phone" placeholder="Phone" required />
                        </div>
                        <div>
                            <input type="text" name="message" class="message-box" placeholder="Message" required />
                        </div>
                        <div class="d-flex ">
                            <button type="submit">
                                SEND
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <br><br><br>

    <!-- end contact section -->



    <!-- info section -->

    <section class="info_section  layout_padding2-top">
        <div class="social_container">
            <div class="social_box">
                <a href="">
                    <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
                <a href="">
                    <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
                <a href="">
                    <i class="fa fa-instagram" aria-hidden="true"></i>
                </a>
                <a href="">
                    <i class="fa fa-youtube" aria-hidden="true"></i>
                </a>
            </div>
        </div>
        <div class="info_container ">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-3">
                        <h6>
                            ABOUT US
                        </h6>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed doLorem ipsum dolor sit amet, consectetur adipiscing elit, sed doLorem ipsum dolor sit amet,
                        </p>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="info_form ">
                            <h5>
                                Newsletter
                            </h5>
                            <form action="#">
                                <input type="email" placeholder="Enter your email">
                                <button>
                                    Subscribe
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <h6>
                            NEED HELP
                        </h6>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed doLorem ipsum dolor sit amet, consectetur adipiscing elit, sed doLorem ipsum dolor sit amet,
                        </p>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <h6>
                            CONTACT US
                        </h6>
                        <div class="info_link-box">
                            <a href="">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                <span> Gb road 123 london Uk </span>
                            </a>
                            <a href="">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <span>+01 12345678901</span>
                            </a>
                            <a href="">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                <span> demo@gmail.com</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer section -->
        <footer class=" footer_section">
            <div class="container">
                <p>
                    &copy; <span id="displayYear"></span> All Rights Reserved By
                    <a href="https://html.design/">Web Tech Knowledge</a>
                </p>
            </div>
        </footer>
        <!-- footer section -->

    </section>

    <!-- end info section -->


    <script src="frontend/js/jquery-3.4.1.min.js"></script>
    <script src="frontend/js/bootstrap.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
    </script>
    <script src="frontend/js/custom.js"></script>


</body>

</html>