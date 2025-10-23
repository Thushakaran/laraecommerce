<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dark Bootstrap Admin </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="admin/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="admin/vendor/font-awesome/css/font-awesome.min.css">
    <!-- Custom Font Icons CSS-->
    <link rel="stylesheet" href="admin/css/font.css">
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="admin/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="admin/css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="admin/img/favicon.ico">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>

<body>
    <header class="header">
        <nav class="navbar navbar-expand-lg">

            <div class="container-fluid d-flex align-items-center justify-content-between">
                <div class="navbar-header">
                    <!-- Navbar Header--><a href="index.html" class="navbar-brand">
                        <div class="brand-text brand-big visible text-uppercase"><strong class="text-primary">Dark</strong><strong>Admin</strong></div>
                        <div class="brand-text brand-sm"><strong class="text-primary">D</strong><strong>A</strong></div>
                    </a>
                    <!-- Sidebar Toggle Btn-->
                    <button class="sidebar-toggle"><i class="fa fa-long-arrow-left"></i></button>
                </div>
                <div class="right-menu list-inline no-margin-bottom">
                    <!-- Log out               -->
                    <div class="list-inline-item logout">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();"
                                style="display: flex; align-items: center; gap: 6px;">

                                <!-- Logout Icon (Heroicon) -->
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" style="width: 18px; height: 18px;">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6A2.25 2.25 0 005.25 5.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M18 12h-9m9 0l-3-3m3 3l-3 3" />
                                </svg>

                                {{ __('Log Out') }}
                            </x-responsive-nav-link>

                        </form>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        <nav id="sidebar">
            <!-- Sidebar Header-->
            <div class="sidebar-header d-flex align-items-center">
                <div class="avatar"><img src="img/avatar-6.jpg" alt="..." class="img-fluid rounded-circle"></div>
                <div class="title">
                    <h1 class="h5">Admin</h1>
                    <p>E-Commerce</p>
                </div>
            </div>
            <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
            <ul class="list-unstyled">
                <li class="active"><a href="index.html"> <i class="icon-home"></i>Home </a></li>
                <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Category </a>
                    <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                        <li><a href="{{route('admin.addcategory')}}">Add Category</a></li>
                        <li><a href="{{route('admin.viewcategory')}}">View Category</a></li>
                    </ul>
                </li>
                <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Product</a>
                    <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                        <li><a href="{{route('admin.addproduct')}}">Add Product</a></li>
                        <li><a href="{{route('admin.viewproduct')}}">View Product</a></li>
                        <li><a href="{{route('admin.vieworders')}}">View Orders</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- Sidebar Navigation end-->
        <div class="page-content">
            <div class="page-header">
                <div class="container-fluid">
                    <h2 class="h5 no-margin-bottom">Dashboard</h2>
                </div>
            </div>
            <section class="no-padding-top no-padding-bottom">
                @yield('dashboard')

                @yield('add_category')

                @yield('view_category')

                @yield('update_category')

                @yield('add_product')

                @yield('view_orders')
            </section>

            <footer class="footer">
                <div class="footer__block block no-margin-bottom">
                    <div class="container-fluid text-center">
                        <!-- Please do not remove the backlink to us unless you support us at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
                        <p class="no-margin-bottom">2018 &copy; Your company. Download From <a target="_blank" href="https://templateshub.net">Templates Hub</a>.</p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <!-- JavaScript files-->
    <script src="admin/vendor/jquery/jquery.min.js"></script>
    <script src="admin/vendor/popper.js/umd/popper.min.js"> </script>
    <script src="admin/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="admin/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="admin/vendor/chart.js/Chart.min.js"></script>
    <script src="admin/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="admin/js/charts-home.js"></script>
    <script src="admin/js/front.js"></script>
</body>

</html>