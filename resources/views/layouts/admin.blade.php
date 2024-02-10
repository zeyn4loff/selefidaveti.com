<!doctype html>
<html lang="az">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8"/>
    <title>Sünnəyə Dəvət | Flat Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/admin/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet"
          type="text/css"/>
    <!-- Icons Css -->
    <link href="{{ asset('assets/admin/css/icons.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- App Css-->
    <link href="{{ asset('assets/admin/libs/dropify/css/dropify.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/admin/libs/toast/toast.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/admin/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/admin/libs/richtext/richtext.min.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>
    <link href="{{ asset('assets/admin/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css"/>
</head>
<body data-sidebar="colored">
<!-- Begin page -->
<div id="layout-wrapper">
    <header id="page-topbar">
        <div class="navbar-header">
            <div class="d-flex">
                <!-- LOGO -->
                <div class="navbar-brand-box">
                    <a href="{{ route('admin.slider.index') }}" class="logo logo-dark">
              <span class="logo-sm">
              <img src="{{ asset('assets/admin/images/logo.svg') }}" alt="" height="22">
              </span>
                        <span class="logo-lg">
              <img src="{{ asset('assets/admin/images/logo-dark.png') }}" alt="" height="17">
              </span>
                    </a>
                    <a href="{{ route('admin.slider.index') }}" class="logo logo-light">
              <span class="logo-sm">
              <img src="{{ asset('assets/admin/images/logo-light.svg') }}" alt="" height="22">
              </span>
                        <span class="logo-lg">
              <img src="{{ asset('assets/admin/images/logo-light.png') }}" alt="" height="19">
              </span>
                    </a>
                </div>
                <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect"
                        id="vertical-menu-btn">
                    <i class="fa fa-fw fa-bars"></i>
                </button>
            </div>
            <div class="d-flex">
                <div class="dropdown d-inline-block d-lg-none ms-2">
                    <button type="button" class="btn header-item noti-icon waves-effect"
                            id="page-header-search-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="mdi mdi-magnify"></i>
                    </button>
                </div>
                <div class="dropdown d-none d-lg-inline-block ms-1">
                    <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
                        <i class="bx bx-fullscreen"></i>
                    </button>
                </div>
                <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="d-none d-xl-inline-block ms-1" key="t-henry">Admin</span>
                        <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        {{--                <a class="dropdown-item text-danger" href="{{ route('admin.logout.get') }}"><i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span key="t-logout">Çıxış</span></a>--}}
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- ========== Left Sidebar Start ========== -->
    <div class="vertical-menu">
        <div data-simplebar class="h-100">
            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <!-- Left Menu Start -->
                <ul class="metismenu list-unstyled" id="side-menu">
                    <li>
                        <a href="{{ route('admin.slider.index') }}" class="waves-effect">
                            <i class="bx bx-image"></i>
                            <span>Slayder</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-detail"></i>
                            <span>Bloq</span>
                        </a>
                        <ul class="sub-menu mm-collapse" aria-expanded="false">
                            <li><a href="{{ route('admin.blog-category.index') }}">Kateqoriya</a></li>
                            <li><a href="{{ route('admin.blog.index') }}">Bloq</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-music"></i>
                            <span>Audio</span>
                        </a>
                        <ul class="sub-menu mm-collapse" aria-expanded="false">
                            <li><a href="{{ route('admin.audio-category.index') }}">Kateqoriya</a></li>
                            <li><a href="{{ route('admin.audio.index') }}">Audio</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('admin.question.index') }}" class="waves-effect">
                            <i class="bx bx-question-mark"></i>
                            <span>Sual</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.contact.index') }}" class="waves-effect">
                            <i class="bx bx-phone"></i>
                            <span>Əlaqə</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.setting.index') }}" class="waves-effect">
                            <i class="bx bx-cog"></i>
                            <span>Parametr</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- Sidebar -->
        </div>
    </div>
    <!-- Left Sidebar End -->
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                @yield('content')
            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>document.write(new Date().getFullYear())</script>
                        © <a target="_blank" href="https://flatstudio.az">FlatStudio.az</a>
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-end d-none d-sm-block">
                            Develop by <a target="_blank" href="https://flatstudio.az">Zeynalov Manaf</a> & <a
                                target="_blank" href="https://flatstudio.az">Azer Gozalov</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- end main content-->
</div>
<!-- END layout-wrapper -->
<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>
<!-- JAVASCRIPT -->
<script src="{{ asset('assets/admin/libs/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/admin/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/admin/libs/metismenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('assets/admin/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/admin/libs/node-waves/waves.min.js') }}"></script>
<script src="{{ asset('assets/admin/libs/row-sorter/RowSorter.js') }}"></script>
<script src="{{ asset('assets/admin/libs/dropify/js/dropify.min.js') }}"></script>
<script src="{{ asset('assets/admin/libs/toast/toast.min.js') }}"></script>
<script src="{{ asset('assets/admin/libs/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ asset('assets/admin/libs/editor/tinymce.js') }}"></script>
<script src="https://cdn.jsdelivr.net/momentjs/latest/moment-with-locales.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="{{ asset('assets/admin/js/custom.js') }}"></script>
<script src="{{ asset('assets/admin/js/app.js') }}"></script>
</body>
</html>
