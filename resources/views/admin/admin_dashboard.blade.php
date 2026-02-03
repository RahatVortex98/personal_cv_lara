<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin - MD. Raisul Islam Portfolio</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('admin/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendor/font-awesome/css/font-awesome.min.css') }}">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <link rel="stylesheet" href="{{ asset('admin/css/font.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/style.default.css') }}" id="theme-stylesheet">
    <link rel="stylesheet" href="{{ asset('admin/css/custom.css') }}">

    <link rel="shortcut icon" href="{{ asset('admin/img/favicon.ico') }}">

    @stack('styles') <!-- Allow page-specific CSS -->
</head>
<body>
    <!-- Header -->
    <header class="header">
        <nav class="navbar navbar-expand-lg">
            <div class="search-panel">
                <div class="search-inner d-flex align-items-center justify-content-center">
                    <div class="close-btn">Close <i class="fa fa-close"></i></div>
                    <form id="searchForm" action="#">
                        <div class="form-group">
                            <input type="search" name="search" placeholder="What are you searching for...">
                            <button type="submit" class="submit">Search</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="container-fluid d-flex align-items-center justify-content-between">
                <div class="navbar-header">
                    <a href="{{ route('admin.dashboard') }}" class="navbar-brand">
                        <div class="brand-text brand-big visible text-uppercase">
                            <strong>Admin</strong>
                        </div>
                    </a>
                </div>

                <div class="right-menu list-inline no-margin-bottom">
                    <div class="list-inline-item">
                        <a href="#" class="search-open nav-link"><i class="icon-magnifying-glass-browser"></i></a>
                    </div>
                    <div class="list-inline-item logout">
                        <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                            @csrf
                            <a href="#" onclick="event.preventDefault(); this.closest('form').submit();">
                                <i class="fa fa-sign-out"></i>
                                <span>Logout</span>
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!-- Main Wrapper -->
    <div class="d-flex align-items-stretch">
        <!-- Sidebar -->
        <nav id="sidebar">
            <div class="sidebar-header d-flex align-items-center"></div>
            <ul class="list-unstyled">
                <li>
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="icon-home"></i> Dashboard
                    </a>
                </li>

                <li>
                    <a href="#heroMenu" data-toggle="collapse" aria-expanded="false">
                        <i class="icon-windows"></i> Hero Section
                    </a>
                    <ul id="heroMenu" class="collapse list-unstyled">
                        <li><a href="{{ route('admin.hero') }}">View Heroes</a></li>
                        <li><a href="{{ route('admin.hero.create') }}">Add Hero</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#heroMenu" data-toggle="collapse" aria-expanded="false">
                        <i class="icon-windows"></i> About Section
                    </a>
                    <ul id="heroMenu" class="collapse list-unstyled">
                        <li><a href="{{ route('admin.about.view') }}">View About</a></li>
                        <li><a href="{{ route('admin.about.create') }}">Add About</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#heroMenu" data-toggle="collapse" aria-expanded="false">
                        <i class="icon-windows"></i> Qualification Section
                    </a>
                    <ul id="heroMenu" class="collapse list-unstyled">
                        <li><a href="{{ route('admin.qualification.view') }}">View Qualification</a></li>
                        <li><a href="{{ route('admin.qualification.create') }}">Add Qualification</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#heroMenu" data-toggle="collapse" aria-expanded="false">
                        <i class="icon-windows"></i> Project Section
                    </a>
                    <ul id="heroMenu" class="collapse list-unstyled">
                        <li><a href="{{ route('admin.project.view') }}">View Projects</a></li>
                        <li><a href="{{ route('admin.project.create') }}">Add Projects</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.messages.view') }}">
                            <i class="fa-solid fa-envelope me-2"></i>
                            <span>Messages</span>
                        </a>
                    </li>

                <!-- Add more menu items later -->
            </ul>
        </nav>

        <!-- Page Content -->
        <div class="page-content">
            @yield('content')

            <footer class="footer">
                <div class="footer__block block no-margin-bottom">
                    <div class="container-fluid text-center">
                        <p class="no-margin-bottom">© {{ date('Y') }} MD. Raisul Islam</p>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/popper.js/umd/popper.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/jquery.cookie/jquery.cookie.js') }}"></script>
    <script src="{{ asset('admin/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('admin/js/charts-home.js') }}"></script>
    <script src="{{ asset('admin/js/front.js') }}"></script>

    @stack('scripts')
</body>
</html>