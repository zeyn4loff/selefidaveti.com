<!doctype html>
<html class="no-js" lang="az">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Sünnəyə Dəvət</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{ url($setting->favicon) }}">
    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('assets/site/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/site/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/site/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/site/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/site/css/imageRevealHover.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/site/css/swiper-bundle.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/site/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/site/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/site/css/spacing.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/site/libs/audio-player/css/green-audio-player.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/site/css/main.css') }}">
</head>
<body>
<div id="preloader">
    <div id="loading-center">
        <div id="loading-center-absolute">
            <div class="object" id="object_one"></div>
            <div class="object" id="object_two"></div>
            <div class="object" id="object_three"></div>
        </div>
    </div>
</div>
<button class="scroll__top scroll-to-target" data-target="html">
    <i class="fas fa-angle-up"></i>
</button>
<header class="header__style-six">
    <div class="header__top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-6 col-sm-6 order-2 order-lg-0">
                    <div class="header__top-search">
                        <form action="#">
                            <input type="text" placeholder="Search here...">
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 col-md-3 order-0 order-lg-2 d-none d-md-block">
                    <div class="header__top-logo logo text-lg-center">
                        <a href="{{ route('site.home.get') }}" class="logo-dark"><img
                                src="{{ url($setting->logo_black) }}" alt="Logo"></a>
                        <a href="{{ route('site.home.get') }}" class="logo-light"><img
                                src="{{ url($setting->logo_white) }}" alt="Logo"></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-3 col-sm-6 order-3 d-none d-sm-block">
                    <div class="header__top-right">
                        <ul class="list-wrap">
                            <li class="news-btn"><a href="{{ route('site.question.create.get') }}" class="btn"><span
                                        class="btn-text">Sual ver</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="header-fixed-height"></div>
    <div id="sticky-header" class="tg-header__area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="tgmenu__wrap">
                        <nav class="tgmenu__nav">
                            <div class="logo d-block d-md-none">
                                <a href="{{ route('site.home.get') }}" class="logo-dark"><img
                                        src="{{ url($setting->logo_black) }}"
                                        alt="Logo"></a>
                                <a href="{{ route('site.home.get') }}" class="logo-light"><img
                                        src="{{ url($setting->logo_white) }}"
                                        alt="Logo"></a>
                            </div>
                            <div class="tgmenu__navbar-wrap tgmenu__main-menu d-none d-lg-flex">
                                <ul class="navigation">
                                    <li><a href="{{ route('site.home.get') }}">Ana səhifə</a></li>
                                    @foreach($categories as $parentCategory)
                                        @if($parentCategory->children->isNotEmpty())
                                            <li class="menu-item-has-children"><a
                                                    href="{{ route('site.blog-category.slug.get', $parentCategory->slug) }}">{{ $parentCategory->name }}</a>
                                                <ul class="sub-menu">
                                                    @foreach($parentCategory->children as $childCategory)
                                                        <li>
                                                            <a href="{{ route('site.blog-category.slug.get', [$parentCategory->slug, $childCategory->slug]) }}">{{ $childCategory->name }}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @else
                                            <li>
                                                <a href="{{ route('site.blog-category.slug.get', $parentCategory->slug) }}">{{ $parentCategory->name }}</a>
                                            </li>
                                        @endif
                                    @endforeach
                                    <li class="menu-item-has-children"><a
                                            href="#">Audio dərslər</a>
                                        <ul class="sub-menu">
                                            @foreach($audioCategories as $audioCategory)
                                                <li><a href="{{ route('site.audio-category.slug.get', $audioCategory->slug ) }}">{{ $audioCategory->name }}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="tgmenu__action">
                                <ul class="list-wrap">
                                    <li class="mode-switcher">
                                        <nav class="switcher__tab">
                                            <span class="switcher__btn light-mode"><i class="flaticon-sun"></i></span>
                                            <span class="switcher__mode"></span>
                                            <span class="switcher__btn dark-mode"><i class="flaticon-moon"></i></span>
                                        </nav>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                        <div class="mobile-nav-toggler"><i class="fas fa-bars"></i></div>
                    </div>
                    <div class="tgmobile__menu">
                        <nav class="tgmobile__menu-box">
                            <div class="close-btn"><i class="fas fa-times"></i></div>
                            <div class="nav-logo">
                                <a href="{{ route('site.home.get') }}" class="logo-dark"><img
                                        src="{{ url($setting->logo_black) }}"
                                        alt="Logo"></a>
                                <a href="{{ route('site.home.get') }}" class="logo-light"><img
                                        src="{{ url($setting->logo_white) }}"
                                        alt="Logo"></a>
                            </div>
                            <div class="tgmobile__search">
                                <form action="#">
                                    <input type="text" placeholder="Search here...">
                                    <button><i class="far fa-search"></i></button>
                                </form>
                            </div>
                            <div class="tgmobile__menu-outer">
                            </div>
                            <div class="social-links">
                                <ul class="list-wrap">
                                    <li><a target="_blank" href="https://facebook.com/{{ $contacts->facebook }}"><i
                                                class="fab fa-facebook-f"></i> Facebook</a></li>
                                    <li><a target="_blank" href="https://youtube.com/{{ $contacts->youtube }}"><i
                                                class="fab fa-youtube"></i> Youtube</a></li>
                                    <li><a target="_blank" href="https://telegram.com/{{ $contacts->telegram }}"><i
                                                class="fab fa-telegram"></i> Telegram</a></li>
                                    <li><a target="_blank" href="https://instagram.com/{{ $contacts->instagram }}"><i
                                                class="fab fa-instagram"></i> Instagram</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <div class="tgmobile__menu-backdrop"></div>
                </div>
            </div>
        </div>
    </div>
</header>
<main>
    @yield('content')
</main>
<footer class="footer-area black-bg">
    <div class="container">
        <div class="footer__logo-wrap">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-4">
                    <div class="footer__logo logo">
                        <a href="{{ route('site.home.get') }}"><img src="{{ url($setting->logo_white) }}"
                                                                    alt="Logo"></a>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8">
                    <div class="footer__social">
                        <ul class="list-wrap">
                            <li><a target="_blank" href="https://facebook.com/{{ $contacts->facebook }}"><i
                                        class="fab fa-facebook-f"></i> Facebook</a></li>
                            <li><a target="_blank" href="https://youtube.com/{{ $contacts->youtube }}"><i
                                        class="fab fa-youtube"></i> Youtube</a></li>
                            <li><a target="_blank" href="https://telegram.com/{{ $contacts->telegram }}"><i
                                        class="fab fa-telegram"></i> Telegram</a></li>
                            <li><a target="_blank" href="https://instagram.com/{{ $contacts->instagram }}"><i
                                        class="fab fa-instagram"></i> Instagram</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer__copyright">
            <div class="row">
                <div class="col-lg-3">
                    <div class="copyright__text">
                        <p>Site developing by <a target="_blank" href="https://instagram.com/zeyn4loff">Zeyn4loff</a></p>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="copyright__menu">
                        <ul class="list-wrap">
                            <li><a href="{{ route("site.home.get") }}">ANA SƏHİFƏ</a></li>
                            @foreach($categories as $parentCategory)
                                <li>
                                    <a href="{{ route("site.blog-category.slug.get", $parentCategory->slug) }}">{{ $parentCategory->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<script src="{{ asset('assets/site/js/vendor/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/site/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/site/js/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/site/js/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/site/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('assets/site/js/jquery.marquee.min.js') }}"></script>
<script src="{{ asset('assets/site/js/imageRevealHover.js') }}"></script>
<script src="{{ asset('assets/site/js/swiper-bundle.js') }}"></script>
<script src="{{ asset('assets/site/js/TweenMax.min.js') }}"></script>
<script src="{{ asset('assets/site/js/slick.min.js') }}"></script>
<script src="{{ asset('assets/site/js/ajax-form.js') }}"></script>
<script src="{{ asset('assets/site/js/wow.min.js') }}"></script>
<script src="{{ asset('assets/site/libs/audio-player/js/green-audio-player.min.js') }}"></script>
<script src="{{ asset('assets/site/js/main.js') }}"></script>
</body>
</html>
