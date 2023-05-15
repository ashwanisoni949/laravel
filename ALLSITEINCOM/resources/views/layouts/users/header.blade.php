@php
    $indexurl = Request::segment(2);
    $category_slug = Request::segment(1);
    $totalblog = App\Models\Blog::where(['status' => 1])->get();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- google ads code -->
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5239991314032243"
        crossorigin="anonymous"></script>

    <meta name="google-site-verification" content="YyXSqhcmKqKcOiNuS7UPrxYH2erFh3A1V0rrewXa6Gk" />

    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Allsitein</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="title" content="Allsitein - सबका ज्ञान एक वेबसाइट में" />
    <meta name="description"
        content="इस website में आपको सभी Jobs और Education के बारे में तथा  Programming के बारे में details से Basic से Advance level तक दिया गया है तथा इसमे latest jobs भी दिया गया है ">
    <meta name="keywords" content="Programming,Jobs,Education,Website,Code">
    <link rel="canonical" href="{{ url()->current() }}" />
    <!-- Favicon -->
    <link href="{{ asset('assets/img/logo.png') }}" rel="icon">
    <!-- <link rel="preconnect" href="https://fonts.gstatic.com"> -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <!-- Libraries Stylesheet -->
    <link href="{{ asset('assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/wave.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/extra.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-181812790-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-181812790-1');
    </script>

    <style>
        .service-item:hover {
            background-image: url("{{ asset('assets/images/service-bg.jpg') }}");
            background-position: right top;
            background-repeat: no-repeat;
            background-size: cover;
            color: #fff;
        }

        .first-service .icon {
            background-image: url("{{ asset('assets/images/service-icon-01.png') }}");
        }

        .first-service:hover .icon {
            background-image: url("{{ asset('assets/images/service-icon-hover-01.png') }}");
        }

        a:hover {
            text-decoration: none;
        }

        .color-change {
            color: darkblue !important;
        }

        .iconshow:after {
            font-family: 'Font Awesome 5 Free';
            content: "\f068";
            font-weight: 900;
            color: red;
        }

        .iconplus:after {
            font-family: 'Font Awesome 5 Free';
            content: "\f067";
            font-weight: 900;
            color: red;
        }

        @media screen and (max-width: 992px) {
            .mobile_wave {
                display: none;
            }

            .show_search {
                display: block !important;
            }

            .destop_logo {
                display: none;
            }

            .footer_design {
                text-align: center !important;
                align-items: center !important;
            }
        }

        @media screen and (max-width: 600px) {
            .mobile_wave {
                display: none;
            }

            .show_search {
                display: block !important;
            }

            .footer_design {
                text-align: center !important;
                align-items: center !important;
            }

            .destop_logo {
                display: none;
            }
        }

        .logo_Set {
            justify-content: space-between !important;
        }

        .set_search {
            width:
        }

        .search_size {
            width: 270px !important;
            height: 50px !important;
        }
    </style>
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row align-items-center bg-light px-lg-5">
            <div class="col-12 col-md-8">
                <div class="d-flex justify-content-between">
                    <div class=" text-light text-center  rounded py-2 w-100"><img
                            src="{{ asset('assets/img/live.gif') }}" height="30px" alt=""></div>
                    <div class="owl-carousel owl-carousel-1 tranding-carousel position-relative d-inline-flex align-items-center ml-3"
                        style="width: calc(100% - 100px); padding-left: 90px;">
                        @if (!empty($totalblog))
                            @foreach ($totalblog as $key => $blogtitle)
                                <div class="text-truncate"><a class="text-secondary"
                                        href="{{ route('blog.details', ['category' => $blogtitle->category_slug, 'slug' => $blogtitle->slug]) }}">
                                        {{ $blogtitle->title }}
                                    </a></div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
            {{-- <div class="col-md-1 text-right d-none d-md-block" id='google_translate_element'>

            </div> --}}
            <div class="col-md-3 text-right text-danger d-none d-md-block">
                @php
                    $today = date('l jS  F Y');
                @endphp
                {{ $today }}
            </div>
        </div>
        <div class="row  py-2 px-lg-5 logo_Set">
            <div class="col-lg-4">
                <a href="{{ route('home') }}" class="navbar-brand d-lg-block">
                    <h1 class="m-0 display-5 text-uppercase"><img src="{{ asset('assets/img/qq.gif') }}" alt=""
                            height="100px" style="height: 85px" class="destop_logo">
                        <img src="{{ asset('assets/img/logo1.png') }}" alt="" height="100px"
                            style="height: 100px;" class="show_search d-none">
                    </h1>
                </a>
            </div>
            <div class="col-lg-3 mt-2 mobile_wave">
                {{-- <label for="website" class="">More Topics, Search Here</label>
                <form class="form-inline my-2 my-lg-0" method="GET" action="{{ route('search-blog') }}">
                    <input class="form-control mr-md-2 search_size" type="search" name="search_blog"
                        placeholder="Search" aria-label="Search">
                </form> --}}
                <script async src="https://cse.google.com/cse.js?cx=a60d2b0047ed942dc"></script>
                <div class="gcse-search"></div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <div class="header">
        <!--Content before waves-->
        <!--Just the logo.. Don't mind this-->

        {{-- <svg class="logo" baseProfile="tiny" x="0px" y="0px" viewBox="0 0 500 500" xml:space="preserve">
            <path fill="#FFFFFF" stroke="#000000" stroke-width="10" stroke-miterlimit="10" d="M57,283" </svg> --}}
        <div class="container-fluid p-0">
            <nav class="navbar navbar-expand-lg  navbar-light py-lg-0 px-lg-5">
                {{-- <a href="" class="navbar-brand  d-block">
                    <h1 class="m-0 display-5 text-uppercase"><img src="" alt=""></h1>
                </a> --}}
                <button type="button" class="navbar-toggler float-start" data-toggle="collapse"
                    data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="show_search d-none">
                    <i class="fa fa-search"></i>
                </div>
                <div class="collapse navbar-collapse justify-content-between px-0 px-lg-3 py-2" id="navbarCollapse">
                    <div class="navbar-nav  mr-auto py-0 menu">
                        <a href="{{ route('home') }}"
                            class="nav-item nav-link {{ $indexurl == null ? 'active' : '' }}">Home</a>
                        <a href="{{ route('user.all-category') }}"
                            class="nav-item nav-link {{ $indexurl == 'all-category' ? 'active' : '' }}">All
                            Category</a>
                        <div class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle {{ array_intersect([$indexurl, $category_slug], ['html', 'css', 'bootstrap', 'javascript', 'jquery', 'ajax']) ? 'active' : '' }}"
                                data-toggle="dropdown">Front End</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="{{ route('user.html') }}"
                                    class="nav-item nav-link {{ $indexurl == 'html' ? 'active' : '' }} {{ $category_slug == 'html' ? 'active' : '' }}">HTML</a>
                                <a href="{{ route('user.css') }}"
                                    class="nav-item nav-link {{ $indexurl == 'css' ? 'active' : '' }}{{ $category_slug == 'css' ? 'active' : '' }}">CSS</a>
                                <a href="{{ route('user.bootstrap') }}"
                                    class="nav-item nav-link {{ $indexurl == 'bootstrap' ? 'active' : '' }}{{ $category_slug == 'bootstrap' ? 'active' : '' }}">Bootstrap</a>
                                <a href="{{ route('user.javascript') }}"
                                    class="nav-item nav-link {{ $indexurl == 'javascript' ? 'active' : '' }}{{ $category_slug == 'javascript' ? 'active' : '' }}">JavaScript</a>
                                <a href="{{ route('user.jquery') }}"
                                    class="nav-item nav-link {{ $indexurl == 'jquery' ? 'active' : '' }}{{ $category_slug == 'jquery' ? 'active' : '' }}">Jquery</a>
                                <a href="{{ route('user.ajax') }}"
                                    class="nav-item nav-link {{ $indexurl == 'ajax' ? 'active' : '' }}{{ $category_slug == 'ajax' ? 'active' : '' }}">AJAX</a>
                            </div>
                        </div>
                        <div class="nav-item dropdown">
                            <a href="#"
                                class="nav-link dropdown-toggle {{ array_intersect([$indexurl, $category_slug], ['php', 'laravel', 'ci']) ? 'active' : '' }}"
                                data-toggle="dropdown">Back End</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="{{ route('user.php') }}"
                                    class="nav-item nav-link {{ $indexurl == 'php' ? 'active' : '' }}{{ $category_slug == 'php' ? 'active' : '' }}">PHP</a>
                                <a href="{{ route('user.laravel') }}"
                                    class="nav-item nav-link {{ $indexurl == 'laravel' ? 'active' : '' }}{{ $category_slug == 'laravel' ? 'active' : '' }}">Laravel</a>
                                <a href="{{ route('user.ci') }}"
                                    class="nav-item nav-link {{ $indexurl == 'ci' ? 'active' : '' }}{{ $category_slug == 'ci' ? 'active' : '' }}">CI</a>
                            </div>
                        </div>
                        <a href="{{ route('user.latest-jobs') }}"
                            class="nav-item nav-link {{ $indexurl == 'latest-jobs' ? 'active' : '' }}{{ $category_slug == 'ci' ? 'active' : '' }}">Latest
                            Jobs</a>
                        <a href="{{ route('user.result') }}"
                            class="nav-item nav-link {{ $indexurl == 'result' ? 'active' : '' }}">Result</a>
                        <a href="{{ route('user.10th-12th-up-board') }}"
                            class="nav-item nav-link {{ $indexurl == '10th-12th-up-board' ? 'active' : '' }}">10th-12th
                            UP Board</a>
                        <a href="{{ route('user.syllabus') }}"
                            class="nav-item nav-link {{ $indexurl == 'syllabus' ? 'active' : '' }}">Syllabus</a>
                        <a href="{{ route('user.contact.index') }}"
                            class="nav-item nav-link {{ $indexurl == 'contact' ? 'active' : '' }}">Contact</a>
                        <div class="nav-item dropdown">
                            <a href="#"
                                class="nav-link dropdown-toggle {{ array_intersect([$indexurl, $category_slug], ['computer', 'shayari', 'gold-silver', 'course']) ? 'active' : '' }} "
                                data-toggle="dropdown">More</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="{{ route('user.computer') }}"
                                    class="nav-item nav-link {{ $indexurl == 'computer' ? 'active' : '' }}{{ $category_slug == 'computer' ? 'active' : '' }}">Computer</a>
                                <a href="{{ route('user.shayari') }}"
                                    class="nav-item nav-link {{ $indexurl == 'shayari' ? 'active' : '' }}{{ $category_slug == 'shayari' ? 'active' : '' }}">Shayari</a>
                                <a href="{{ route('user.gold-silver') }}"
                                    class="nav-item nav-link {{ $indexurl == 'gold-silver' ? 'active' : '' }}{{ $category_slug == 'gold-silver' ? 'active' : '' }}">Gold-Silver</a>
                                <a href="{{ route('user.course') }}"
                                    class="nav-item nav-link {{ $indexurl == 'course' ? 'active' : '' }}{{ $category_slug == 'course' ? 'active' : '' }}">Courses</a>
                            </div>
                        </div>
                    </div>

                </div>

            </nav>
        </div>
        <!--Waves Container-->
        <div class="mobile_wave">
            <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
                <defs>
                    <path id="gentle-wave"
                        d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
                </defs>
                <g class="parallax">
                    <use xlink:href="#gentle-wave" x="48" y="7" fill="rgba(255,255,255,0.7" />
                    <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)" />
                    <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)" />
                    <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.1)" />
                </g>
            </svg>
        </div>
        <!--Waves end-->

    </div>
