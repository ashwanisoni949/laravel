@extends('layouts.users.layout')
@section('user-content')
    <style>
        .zoom_box {
            transition: all ease 1s;
        }
    </style>
    <div class="container-fluid py-3">
        <div class="container">
            <div class="owl-carousel owl-carousel-2 carousel-item-3 position-relative">
                @if (!empty($totalblog))
                    @foreach ($totalblog as $key => $allblog)
                        <div class="d-flex service-item first-service">
                            <img src="{{ asset($allblog->image) }}"
                                style="width: 80px;border-radius:10px; height: 80px; object-fit:fill;">
                            <div class="d-flex align-items-center px-3" style="height: 80px;">
                                <a class="text-secondary font-weight-semi-bold"
                                    href="{{ route('blog.details', ['category' => $allblog->category_slug, 'slug' => $allblog->slug]) }}">{!! \Illuminate\Support\Str::words($allblog->title, 5, '....') !!}</a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    <!-- Main News Slider Start -->
    <div class="container-fluid py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="owl-carousel owl-carousel-2 carousel-item-1 position-relative mb-3 mb-lg-0">
                        @if (!empty($totalblog))
                            @foreach ($totalblog as $key => $blog)
                                @php
                                    $date = strtotime($blog->created_at);
                                    $date1 = date('M d, Y', $date);
                                @endphp
                                <div class="position-relative overflow-hidden" style="height: 435px;">
                                    <img class="img-fluid h-100" src="{{ asset($blog->image) }}" style="object-fit:fill;">
                                    <div class="overlay">
                                        <div class="mb-1">
                                            <a style="color:darkgreen"
                                                href="{{ url('user/' . strtolower($blog->blogCategory->category_name)) }}">{{ $blog->blogCategory->category_name }}</a>
                                            <span class="px-2 text-white">/</span>
                                            <a style="color:maroon" href="">{{ $date1 }}</a>
                                        </div>
                                        <a style="color:darkblue" class="h2 m-0 font-weight-bold"
                                            href="{{ route('blog.details', ['category' => $blog->category_slug, 'slug' => $blog->slug]) }}">{!! \Illuminate\Support\Str::words($blog->title) !!}</a>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-lg-4">
                    <div
                        class="d-flex align-items-center border border-dark justify-content-between bg-light py-2 px-4 mb-3">
                        <h3 class="m-0 ">Categories</h3>
                        <a class="font-weight-medium text-decoration-none" href="{{ route('user.all-category') }}">View
                            All</a>
                    </div>
                    <div class="position-relative overflow-hidden mb-3" style="height: 80px;">
                        <img class="img-fluid w-100 h-100" src="{{ asset('blog-image/m5.jpg') }}"
                            style="object-fit: cover;">
                        <a
                            class="overlay align-items-center justify-content-center h4 m-0 text-warning text-decoration-none">
                            <h1 class="text-light">Front End</h1>
                        </a>
                    </div>
                    <div class="position-relative overflow-hidden mb-3" style="height: 80px;">
                        <img class="img-fluid w-100 h-100" src="{{ asset('blog-image/m2.jpg') }}"
                            style="object-fit: cover;">
                        <a class="overlay align-items-center justify-content-center h4 m-0 text-decoration-none">
                            <h1 class="text-light">Back End</h1>
                        </a>
                    </div>
                    <div class="position-relative overflow-hidden mb-3" style="height: 80px;">
                        <img class="img-fluid w-100 h-100" src="{{ asset('blog-image/recruitment-g8c29b0ff7_640.jpg') }}"
                            style="object-fit: cover;">
                        <a class="overlay align-items-center justify-content-center h4 m-0 text-white text-decoration-none">
                            <h1 class="text-light">Latest Jobs</h1>
                        </a>
                    </div>
                    <div class="position-relative overflow-hidden" style="height: 80px;">
                        <img class="img-fluid w-100 h-100" src="{{ asset('blog-image/m4.jpg') }}"
                            style="object-fit: cover;">
                        <a href=""
                            class="overlay align-items-center justify-content-center h4 m-0 text-white text-decoration-none">
                            <h1 class="text-light">Result</h1>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main News Slider End -->


    <!-- Featured News Slider Start -->
    <div class="container-fluid py-3">
        <div class="container">
            <div class="d-flex border border-dark align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                <h3 class="m-0">Latest Jobs</h3>
                <a class=" font-weight-medium text-decoration-none" href="{{ route('user.latest-jobs') }}">View All</a>
            </div>
            <div class="owl-carousel owl-carousel-2 carousel-item-4 position-relative">
                @if (!empty($latestjobs))
                    @foreach ($latestjobs as $key => $latest)
                        @php
                            $date = strtotime($latest->created_at);
                            $date1 = date('M d, Y', $date);
                        @endphp
                        <div class="position-relative overflow-hidden border_line" style="height: 300px;">
                            <img class="img-fluid w-100 h-100 opacity-25" src="{{ asset($latest->image) }}"
                                style="object-fit: cover;opacity: 0.5;">
                            <div class="overlay">
                                <div class="mb-1" style="font-size: 13px;">
                                    <a class="text-danger"
                                        href="{{ url('user/' . strtolower($latest->blogCategory->category_name)) }}">{{ $latest->blogCategory->category_name }}</a>
                                    <span class="px-1 text-danger">/</span>
                                    <a class="text-white" href="">{{ $date1 }}</a>
                                </div>
                                <a class="h4 m-0 color-change"
                                    href="{{ route('blog.details', ['category' => $latest->category_slug, 'slug' => $latest->slug]) }}">{!! \Illuminate\Support\Str::words($latest->title, 5, '....') !!}</a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    </div>
    <!-- Featured News Slider End -->

    <!-- Category News Slider Start -->
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 py-3">
                    <div class="bg-light py-2 px-4 mb-3 border border-dark">
                        <h3 class="m-0 d-inline">Front End</h3>
                    </div>
                    <div class="owl-carousel owl-carousel-3 carousel-item-2 position-relative">
                        @if (!empty($bloglist))
                            @foreach ($bloglist as $keys => $blogs)
                                @php
                                    $date = strtotime($blogs->created_at);
                                    $date1 = date('M d, Y', $date);
                                @endphp
                                <div class="position-relative service-item first-service">
                                    <a
                                        href="{{ route('blog.details', ['category' => $blogs->category_slug, 'slug' => $blogs->slug]) }}"><img
                                            class="img-fluid w-100 img_border" style="height: 130px"
                                            src="{{ asset($blogs->image) }}" style="object-fit:fill;"></a>
                                    <div class="overlay position-relative">
                                        <div class="mb-2" style="font-size: 13px;">
                                            <a
                                                href="{{ url('user/' . strtolower($blogs->blogCategory->category_name)) }}">{{ $blogs->blogCategory->category_name }}</a>
                                            <span class="px-1">/</span>
                                            <span>{{ $date1 }}</span>
                                        </div>
                                        <a class="h4 m-0"
                                            href="{{ route('blog.details', ['category' => $blogs->category_slug, 'slug' => $blogs->slug]) }}">{!! \Illuminate\Support\Str::words($blogs->title, 5, '....') !!}</a>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-lg-6 py-3">
                    <div class="bg-light py-2 px-4 mb-3 border border-dark">
                        <h3 class="m-0">Back End</h3>
                    </div>
                    <div class="owl-carousel owl-carousel-3 carousel-item-2 position-relative">
                        @if (!empty($backend))
                            @foreach ($backend as $key => $back)
                                @php
                                    $date = strtotime($back->created_at);
                                    $date1 = date('M d, Y', $date);
                                @endphp
                                <div class="position-relative service-item first-service">
                                    <a
                                        href="{{ route('blog.details', ['category' => $back->category_slug, 'slug' => $back->slug]) }}"><img
                                            class="img-fluid w-100 img_border" style="height: 130px"
                                            src="{{ asset($back->image) }}" style="object-fit:fill;"></a>
                                    <div class="overlay position-relative">
                                        <div class="mb-2" style="font-size: 13px;">
                                            <a
                                                href="{{ url('user/' . strtolower($back->blogCategory->category_name)) }}">{{ $back->blogCategory->category_name }}</a>
                                            <span class="px-1">/</span>
                                            <span>{{ $date1 }}</span>
                                        </div>
                                        <a class="h4 m-0"
                                            href="{{ route('blog.details', ['category' => $back->category_slug, 'slug' => $back->slug]) }}">{!! \Illuminate\Support\Str::words($back->title, 5, '....') !!}</a>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Category News Slider End -->


    <!-- Category News Slider Start -->
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 py-3">
                    <div class="bg-light py-2 px-4 mb-3 border border-dark">
                        <h3 class="m-0">Result</h3>
                    </div>
                    <div class="owl-carousel owl-carousel-3 carousel-item-2 position-relative">
                        @if (!empty($totalblog))
                            @foreach ($totalblog->where('category_slug', 'result') as $keys => $result)
                                @php
                                    $date = strtotime($result->created_at);
                                    $date1 = date('M d, Y', $date);
                                @endphp
                                <div class="position-relative service-item first-service">
                                    <a
                                        href="{{ route('blog.details', ['category' => $result->category_slug, 'slug' => $result->slug]) }}"><img
                                            class="img-fluid w-100 img_border" style="height: 130px"
                                            src="{{ asset($result->image) }}" style="object-fit:fill;"></a>
                                    <div class="overlay position-relative">
                                        <div class="mb-2" style="font-size: 13px;">
                                            <a
                                                href="{{ url('user/' . strtolower($result->blogCategory->category_name)) }}">{{ $result->blogCategory->category_name }}</a>
                                            <span class="px-1">/</span>
                                            <span>{{ $date1 }}</span>
                                        </div>
                                        <a class="h4 m-0"
                                            href="{{ route('blog.details', ['category' => $result->category_slug, 'slug' => $result->slug]) }}">{!! \Illuminate\Support\Str::words($result->title, 5, '....') !!}</a>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-lg-6 py-3">
                    <div class="bg-light py-2 px-4 mb-3 border border-dark">
                        <h3 class="m-0"> Laravel</h3>
                    </div>
                    <div class="owl-carousel owl-carousel-3 carousel-item-2 position-relative">
                        @if (!empty($totalblog))
                            @foreach ($totalblog->where('category_slug', 'laravel') as $keys => $laravel)
                                @php
                                    $date = strtotime($laravel->created_at);
                                    $date1 = date('M d, Y', $date);
                                @endphp
                                <div class="position-relative service-item first-service">
                                    <a
                                        href="{{ route('blog.details', ['category' => $laravel->category_slug, 'slug' => $laravel->slug]) }}"><img
                                            class="img-fluid w-100 img_border" style="height: 130px"
                                            src="{{ asset($laravel->image) }}" style="object-fit:fill;"></a>
                                    <div class="overlay position-relative">
                                        <div class="mb-2" style="font-size: 13px;">
                                            <a
                                                href="{{ url('user/' . strtolower($laravel->blogCategory->category_name)) }}">{{ $laravel->blogCategory->category_name }}</a>
                                            <span class="px-1">/</span>
                                            <span>{{ $date1 }}</span>
                                        </div>
                                        <a class="h4 m-0"
                                            href="{{ route('blog.details', ['category' => $laravel->category_slug, 'slug' => $laravel->slug]) }}">{!! \Illuminate\Support\Str::words($laravel->title, 5, '....') !!}</a>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Category News Slider End -->


    <!-- News With Sidebar Start -->
    <div class="container-fluid py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row mb-3">
                        <div class="col-12">
                            <div
                                class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3 border border-dark">
                                <h3 class="m-0">Popular</h3>
                                <a class=" font-weight-medium text-decoration-none" href="">View
                                    All</a>
                            </div>
                        </div>
                        @if (!empty($popularitem))
                            @foreach ($popularitem->slice(0, 2) as $key => $popular)
                                @php
                                    $date = strtotime($popular->created_at);
                                    $date1 = date('M d, Y', $date);
                                @endphp
                                <div class="col-lg-6">
                                    <div class="position-relative mb-3 zoom_box">
                                        <a
                                            href="{{ route('blog.details', ['category' => $popular->category_slug, 'slug' => $popular->slug]) }}"><img
                                                class="img-fluid w-100" src="{{ asset($popular->image) }}"
                                                style="object-fit:fill;height: 180px;"></a>
                                        <div class="overlay position-relative bg-light">
                                            <div class="mb-2" style="font-size: 14px;">
                                                <a
                                                    href="{{ url('user/' . strtolower($popular->blogCategory->category_name)) }}">{{ $popular->blogCategory->category_name }}</a>
                                                <span class="px-1">/</span>
                                                <span>{{ $date1 }}</span>
                                            </div>
                                            <a class="h4"
                                                href="{{ route('blog.details', ['category' => $popular->category_slug, 'slug' => $popular->slug]) }}">{!! \Illuminate\Support\Str::words($popular->title, 5, '....') !!}</a>
                                            <p class="m-0">{!! \Illuminate\Support\Str::words($popular->short_description, 12, '....') !!}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        @if (!empty($popularitem))
                            @foreach ($popularitem->slice(0, 6) as $key => $popular)
                                @php
                                    $date = strtotime($popular->created_at);
                                    $date1 = date('M d, Y', $date);
                                @endphp
                                <div class="col-lg-6">
                                    <div class="d-flex mb-3 service-item first-service">
                                        <a
                                            href="{{ route('blog.details', ['category' => $popular->category_slug, 'slug' => $popular->slug]) }}"><img
                                                src="{{ asset($popular->image) }}"
                                                style="width: 100px; height: 100px; object-fit: fill;border-radius:10px;"></a>
                                        <div class="w-100 d-flex flex-column justify-content-center px-3"
                                            style="height: 100px;">
                                            <div class="mb-1" style="font-size: 13px;">
                                                <a
                                                    href="{{ url('user/' . strtolower($popular->blogCategory->category_name)) }}">{{ $popular->blogCategory->category_name }}</a>
                                                <span class="px-1">/</span>
                                                <span>{{ $date1 }}</span>
                                            </div>
                                            <a class="h6 m-0"
                                                href="{{ route('blog.details', ['category' => $popular->category_slug, 'slug' => $popular->slug]) }}">{!! \Illuminate\Support\Str::words($popular->title, 5, '....') !!}</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>

                    <!-- Ads Start -->
                    <div class="mb-3 pb-3">
                        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5239991314032243"
                            crossorigin="anonymous"></script>
                        <!-- 1stads -->
                        <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-5239991314032243"
                            data-ad-slot="7848108739" data-ad-format="auto" data-full-width-responsive="true"></ins>
                        <script>
                            (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>
                    </div>
                    <!-- Ads End -->

                    <div class="row mb-3">
                        <div class="col-12">
                            <div
                                class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3 border border-dark">
                                <h3 class="m-0">Latest Post</h3>
                                <a class="font-weight-medium text-decoration-none" href="">View
                                    All</a>
                            </div>
                        </div>
                        @if (!empty($latestitem))
                            @foreach ($latestitem->slice(0, 2) as $key => $latestpost)
                                @php
                                    $date = strtotime($latestpost->created_at);
                                    $date1 = date('M d, Y', $date);
                                @endphp
                                <div class="col-lg-6">
                                    <div class="position-relative mb-3 zoom_box">
                                        <a
                                            href="{{ route('blog.details', ['category' => $latestpost->category_slug, 'slug' => $latestpost->slug]) }}"><img
                                                class="img-fluid w-100" src="{{ asset($latestpost->image) }}"
                                                style="object-fit: fill;height: 180px;"></a>
                                        <div class="overlay position-relative bg-light">
                                            <div class="mb-2" style="font-size: 14px;">
                                                <a
                                                    href="{{ url('user/' . strtolower($latestpost->blogCategory->category_name)) }}">{{ $latestpost->blogCategory->category_name }}</a>
                                                <span class="px-1">/</span>
                                                <span>{{ $date1 }}</span>
                                            </div>
                                            <a class="h4"
                                                href="{{ route('blog.details', ['category' => $latestpost->category_slug, 'slug' => $latestpost->slug]) }}">{!! \Illuminate\Support\Str::words($popular->title, 5, '....') !!}</a>
                                            <p class="m-0">{!! \Illuminate\Support\Str::words($latestpost->short_description, 10, '....') !!}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        @if (!empty($latestitem))
                            @foreach ($latestitem->slice(0, 6) as $key => $latest_post)
                                @php
                                    $date = strtotime($latest_post->created_at);
                                    $date1 = date('M d, Y', $date);
                                @endphp
                                <div class="col-lg-6">
                                    <div class="d-flex mb-3 service-item first-service">
                                        <a
                                            href="{{ route('blog.details', ['category' => $latest_post->category_slug, 'slug' => $latest_post->slug]) }}"><img
                                                src="{{ asset($latest_post->image) }}"
                                                style="width: 100px; height: 100px; object-fit: fill;border-radius:10px;"></a>
                                        <div class="w-100 d-flex flex-column justify-content-center px-3"
                                            style="height: 100px;">
                                            <div class="mb-1" style="font-size: 13px;">
                                                <a
                                                    href="{{ url('user/' . strtolower($latest_post->blogCategory->category_name)) }}">{{ $latest_post->blogCategory->category_name }}</a>
                                                <span class="px-1">/</span>
                                                <span>{{ $date1 }}</span>
                                            </div>
                                            <a class="h6 m-0"
                                                href="{{ route('blog.details', ['category' => $latest_post->category_slug, 'slug' => $latest_post->slug]) }}">{!! \Illuminate\Support\Str::words($latest_post->title, 5, '....') !!}</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                     <!-- Ads Start -->
                     <div class="mb-3 pb-3">
                        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5239991314032243"
                            crossorigin="anonymous"></script>
                        <!-- 1stads -->
                        <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-5239991314032243"
                            data-ad-slot="7848108739" data-ad-format="auto" data-full-width-responsive="true"></ins>
                        <script>
                            (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>
                    </div>
                    <!-- Ads End -->
                </div>

                <div class="col-lg-4 pt-3 pt-lg-0">
                    <!-- Social Follow Start -->
                    {{-- <div class="pb-3">
                        <div class="bg-light border border-dark py-2 px-4 mb-3">
                            <h3 class="m-0">Follow Us</h3>
                        </div>
                        <div class="d-flex mb-3">
                            <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none mr-2"
                                style="background: #39569E;">
                                <small class="fab fa-facebook-f"></small><small> 12, Followers</small>
                            </a>
                            <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none ml-2"
                                style="background: #52AAF4;">
                                <small class="fab fa-twitter mr-2"></small><small>12,345 Followers</small>
                            </a>
                        </div>
                        <div class="d-flex mb-3">
                            <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none mr-2"
                                style="background: #0185AE;">
                                <small class="fab fa-linkedin-in mr-2"></small><small>12,345 Connects</small>
                            </a>
                            <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none ml-2"
                                style="background: #C8359D;">
                                <small class="fab fa-instagram mr-2"></small><small>12,345 Followers</small>
                            </a>
                        </div>
                        <div class="d-flex mb-3">
                            <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none mr-2"
                                style="background: #DC472E;">
                                <small class="fab fa-youtube mr-2"></small><small>12,345 Subscribers</small>
                            </a>
                            <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none ml-2"
                                style="background: #1AB7EA;">
                                <small class="fab fa-vimeo-v mr-2"></small><small>12,345 Followers</small>
                            </a>
                        </div>
                    </div> --}}
                    <!-- Social Follow End -->

                    <div class="pb-3">
                        <div class="bg-light border border-dark  py-2 px-4 mb-3">
                            <h3 class="m-0 text-danger text-center">QR CODE Generate</h3>
                        </div>
                        <div class="bg-light text-center p-4 mb-3">
                            <div class="input-group w-100">

                                <input type="text" class="form-control form-control-lg qr_code border border-danger"
                                    id="qr_code" name="qr_code" placeholder="Generate QR Code" min="1"
                                    max="100">


                            </div>
                            <small>SEE YOUR QR CODE IMAGE</small>
                            <span id="qr_img" style="text-align: center;display:block;"></span>
                            <span id="download" style="text-align: center;display:block;"></span>
                        </div>
                    </div>
                    <!-- Newsletter End -->

                    <!-- Ads Start -->
                    <div class="mb-3 pb-3">
                        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5239991314032243"
                            crossorigin="anonymous"></script>
                        <!-- 1stads -->
                        <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-5239991314032243"
                            data-ad-slot="7848108739" data-ad-format="auto" data-full-width-responsive="true"></ins>
                        <script>
                            (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>
                    </div>
                    <!-- Ads End -->

                    <!-- Popular News Start -->
                    <div class="pb-3">
                        <div class="bg-light border border-dark py-2 px-4 mb-3">
                            <h3 class="m-0 text-center">Tranding</h3>
                        </div>
                        @if (!empty($popularitem))
                            @foreach ($popularitem->slice(0, 6) as $key => $latest_post)
                                @php
                                    $date = strtotime($latest_post->created_at);
                                    $date1 = date('M d, Y', $date);
                                @endphp
                                <div class="d-flex mb-3 service-item first-service">
                                    <a
                                        href="{{ route('blog.details', ['category' => $latest_post->category_slug, 'slug' => $latest_post->slug]) }}"><img
                                            src="{{ asset($latest_post->image) }}"
                                            style="width: 100px; height: 100px; object-fit: fill;border-radius:10px;"></a>
                                    <div class="w-100 d-flex flex-column justify-content-center px-3"
                                        style="height: 100px;">
                                        <div class="mb-1" style="font-size: 13px;">
                                            <a
                                                href="{{ url('user/' . strtolower($latest_post->blogCategory->category_name)) }}">{{ $latest_post->blogCategory->category_name }}</a>
                                            <span class="px-1">/</span>
                                            <span>{{ $date1 }}</span>
                                        </div>
                                        <a class="h6 m-0"
                                            href="{{ route('blog.details', ['category' => $latest_post->category_slug, 'slug' => $latest_post->slug]) }}">{!! \Illuminate\Support\Str::words($latest_post->title, 5, '....') !!}</a>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <!-- Popular News End -->
                    <!-- Ads Start -->
                    <div class="mb-3 pb-3">
                        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5239991314032243"
                            crossorigin="anonymous"></script>
                        <!-- 1stads -->
                        <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-5239991314032243"
                            data-ad-slot="7848108739" data-ad-format="auto" data-full-width-responsive="true"></ins>
                        <script>
                            (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>
                    </div>
                    <!-- Ads End -->
                    <!-- Tags Start -->
                    <div class="pb-3">
                        <div class="bg-light border border-dark py-2 px-4 mb-3">
                            <h3 class="m-0 text-center">Category</h3>
                        </div>
                        <div class="d-flex flex-wrap m-n1">
                            @if (!empty($categorys))
                                @foreach ($categorys as $keys => $category)
                                    <a href="{{ asset('user' . '/' . strtolower($category->slug)) }}"
                                        class="btn btn-sm btn-outline-secondary m-1">{{ $category->category_name }}</a>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <!-- Tags End -->
                </div>
            </div>
        </div>
    </div>
    </div>
@section('scripts')
    <script>
        (function($) {
            "use strict";
            $(document).ready(function() {
                $("#qr_code").on("blur", function(e) {
                    var inputqr = $(this).val();
                    const url = "{{ route('generate-qr') }}";

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    });

                    // $.ajax({
                    //     url: url,
                    //     type: "POST",
                    //     data: {
                    //         inputqr: inputqr,
                    //     },
                    //     dataType: "json",
                    //     success: function(response) {
                    //         // $('#qr_img').html('<img src="'+response.data+'" alt="" class="responsive-img" style="height: 132px; width: 132px;">')
                    //         $('#inputshow').html('<h1 class="text-danger text-center">' +
                    //             response.inputdata +
                    //             '</h1>');
                    //         $('#qr_img').html('<img src="{{ url('images/') }}' + response
                    //             .output_file +
                    //             '" alt="" class="responsive-img" style="height: 132px; width: 132px;">'
                    //         );
                    //         $('#download').html(
                    //             '<a class="text-light rounded-pill btn btn-success mt-3 fs-4 fw-4" href="{{ url('images/') }}' +
                    //             response.output_file + '" download>Download</a>');


                    //         // $('#displayPhoto').html('<img src="{{ url('images/profile/') }}.data[0]" alt="" class="responsive-img" style="height: 132px; width: 132px;">');





                    //     }

                    // });


                })

            });

        })(jQuery);
    </script>
@endsection

@endsection
