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

    <!-- Custom Admin Navigation Styles -->
    <style>
        #sidebar {
            background: #2c3e50;
        }

        #sidebar .heading {
            color: #ecf0f1;
            font-weight: 600;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin: 20px 0 10px 0;
            padding: 0 20px;
        }

        #sidebar ul li a {
            color: #bdc3c7;
            padding: 12px 20px;
            display: block;
            text-decoration: none;
            transition: all 0.3s ease;
            border-radius: 0;
        }

        #sidebar ul li a:hover {
            background: #34495e;
            color: #ecf0f1;
            padding-left: 25px;
        }

        #sidebar ul li.active a {
            background: #3498db;
            color: white;
        }

        #sidebar ul li ul li a {
            padding-left: 40px;
            font-size: 13px;
        }

        #sidebar ul li ul li a:hover {
            padding-left: 45px;
        }

        .sidebar-header {
            background: #34495e;
            padding: 20px;
            border-bottom: 1px solid #2c3e50;
        }

        .sidebar-header .title h1 {
            color: #ecf0f1;
            margin: 0;
        }

        .sidebar-header .title p {
            color: #bdc3c7;
            margin: 0;
            font-size: 12px;
        }

        .fa-chevron-down {
            transition: transform 0.3s ease;
        }

        .collapsed .fa-chevron-down {
            transform: rotate(-90deg);
        }

        .header {
            background: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .logout {
            background: #e74c3c;
            color: white;
            padding: 8px 15px;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .logout:hover {
            background: #c0392b;
        }

        .breadcrumb {
            background: transparent;
            padding: 0;
            margin: 5px 0 0 0;
            font-size: 14px;
        }

        .breadcrumb-item a {
            color: #6c757d;
            text-decoration: none;
        }

        .breadcrumb-item a:hover {
            color: #3498db;
        }

        .breadcrumb-item.active {
            color: #495057;
        }

        .page-actions {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .btn-action {
            padding: 6px 12px;
            font-size: 14px;
            border-radius: 4px;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn-primary-action {
            background: #3498db;
            color: white;
            border: 1px solid #3498db;
        }

        .btn-primary-action:hover {
            background: #2980b9;
            color: white;
        }

        .btn-secondary-action {
            background: #95a5a6;
            color: white;
            border: 1px solid #95a5a6;
        }

        .btn-secondary-action:hover {
            background: #7f8c8d;
            color: white;
        }
    </style>
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
            <!-- Sidebar Navigation Menus -->
            <span class="heading">Dashboard</span>
            <ul class="list-unstyled">
                <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <a href="{{route('dashboard')}}">
                        <i class="icon-home"></i> Dashboard
                    </a>
                </li>
            </ul>

            <span class="heading">Management</span>
            <ul class="list-unstyled">
                <li>
                    <a href="#categoryDropdown" aria-expanded="false" data-toggle="collapse">
                        <i class="icon-tag"></i> Categories
                        <i class="fa fa-chevron-down float-right"></i>
                    </a>
                    <ul id="categoryDropdown" class="collapse list-unstyled">
                        <li><a href="{{route('admin.addcategory')}}">
                                <i class="fa fa-plus"></i> Add Category
                            </a></li>
                        <li><a href="{{route('admin.viewcategory')}}">
                                <i class="fa fa-list"></i> View Categories
                            </a></li>
                    </ul>
                </li>
                <li>
                    <a href="#productDropdown" aria-expanded="false" data-toggle="collapse">
                        <i class="icon-bag"></i> Products
                        <i class="fa fa-chevron-down float-right"></i>
                    </a>
                    <ul id="productDropdown" class="collapse list-unstyled">
                        <li><a href="{{route('admin.addproduct')}}">
                                <i class="fa fa-plus"></i> Add Product
                            </a></li>
                        <li><a href="{{route('admin.viewproduct')}}">
                                <i class="fa fa-list"></i> View Products
                            </a></li>
                    </ul>
                </li>
                <li class="{{ request()->routeIs('admin.vieworders') ? 'active' : '' }}">
                    <a href="{{route('admin.vieworders')}}">
                        <i class="icon-list"></i> Orders
                    </a>
                </li>
            </ul>

            <span class="heading">Quick Actions</span>
            <ul class="list-unstyled">
                <li>
                    <a href="{{route('index')}}" target="_blank">
                        <i class="fa fa-external-link-alt"></i> View Website
                    </a>
                </li>
            </ul>
        </nav>
        <!-- Sidebar Navigation end-->
        <div class="page-content">
            <div class="page-header">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h2 class="h5 no-margin-bottom">@yield('page-title', 'Dashboard')</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                                    @yield('breadcrumb')
                                </ol>
                            </nav>
                        </div>
                        <div class="page-actions">
                            @yield('page-actions')
                        </div>
                    </div>
                </div>
            </div>
            <section class="no-padding-top no-padding-bottom">
                @yield('dashboard')

                @yield('add_category')

                @yield('view_category')

                @yield('update_category')

                @yield('add_product')

                @yield('update_product')

                @yield('view_product')

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