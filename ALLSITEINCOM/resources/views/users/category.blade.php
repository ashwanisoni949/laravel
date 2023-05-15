@extends('layouts.users.layout')
@section('user-content')


    <!-- Breadcrumb Start -->
    <div class="container-fluid mt-3">
        <div class="container">
            <nav class="breadcrumb bg-transparent m-0 p-0">
                <a class="breadcrumb-item" href="#">Home</a>
                <span class="breadcrumb-item active">All Category</span>
            </nav>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- News With Sidebar Start -->
    <div class="container-fluid py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-12 text-center">
                            <div class="d-flex  border border-dark align-items-center bg-warning justify-content-between py-2 px-4 mb-3">
                                <h3 class="m-0 text-center">Front End</h3>
                            </div>
                        </div>
                        @if (!empty($bloglist))
                            @foreach ($bloglist as $key => $frontend)
                                @php
                                    $date = strtotime($frontend->created_at);
                                    $date1 = date('M d, Y', $date);
                                @endphp
                                <div class="col-lg-6">
                                    <div class="d-flex mb-3 service-item first-service">
                                        <a href="{{ route('blog.details', ['category' => $frontend->category_slug, 'slug' => $frontend->slug]) }}"><img src="{{ asset($frontend->image) }}"
                                            style="width: 100px; height: 100px; object-fit: fill;border-radius:10px;"></a>
                                        <div class="w-100 d-flex flex-column justify-content-center px-3"
                                            style="height: 100px;">
                                            <div class="mb-1" style="font-size: 13px;">
                                                <a
                                                    href="{{ url('user/' . strtolower($frontend->blogCategory->category_name)) }}">{{ $frontend->blogCategory->category_name }}</a>
                                                <span class="px-1">/</span>
                                                <span>{{ $date1 }}</span>
                                            </div>
                                            <a class="h6 m-0"
                                                href="{{ route('blog.details', ['category' => $frontend->category_slug, 'slug' => $frontend->slug]) }}">{!! \Illuminate\Support\Str::words($frontend->title, 5, '....') !!}</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="row text-center">
                        <div class="col-12 text-center">
                            <nav aria-label="Page navigation">
                                <ul class="pagination justify-content-center">
                                    {!! $bloglist->links() !!}
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex  border border-dark align-items-center bg-warning justify-content-between py-2 px-4 mb-3">
                                <h3 class="m-0 text-center">Back End</h3>
                            </div>
                        </div>
                        @if (!empty($backend))
                            @foreach ($backend as $key => $frontend)
                                @php
                                    $date = strtotime($frontend->created_at);
                                    $date1 = date('M d, Y', $date);
                                @endphp
                                <div class="col-lg-6">
                                    <div class="d-flex mb-3 service-item first-service">
                                        <a href="{{ route('blog.details', ['category' => $frontend->category_slug, 'slug' => $frontend->slug]) }}"><img src="{{ asset($frontend->image) }}"
                                            style="width: 100px; height: 100px; object-fit: fill;border-radius:10px;"></a>
                                        <div class="w-100 d-flex flex-column justify-content-center px-3"
                                            style="height: 100px;">
                                            <div class="mb-1" style="font-size: 13px;">
                                                <a
                                                    href="{{ url('user/' . strtolower($frontend->blogCategory->category_name)) }}">{{ $frontend->blogCategory->category_name }}</a>
                                                <span class="px-1">/</span>
                                                <span>{{ $date1 }}</span>
                                            </div>
                                            <a class="h6 m-0"
                                                href="{{ route('blog.details', ['category' => $frontend->category_slug, 'slug' => $frontend->slug]) }}">{!! \Illuminate\Support\Str::words($frontend->title, 5, '....') !!}</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="row text-center">
                        <div class="col-12 text-center">
                            <nav aria-label="Page navigation">
                                <ul class="pagination justify-content-center">
                                    {!! $backend->links() !!}
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex  border border-dark align-items-center bg-warning justify-content-between py-2 px-4 mb-3">
                                <h3 class="m-0 text-center">Latest Jobs</h3>
                            </div>
                        </div>
                        @if (!empty($latestjobs))
                            @foreach ($latestjobs as $key => $frontend)
                                @php
                                    $date = strtotime($frontend->created_at);
                                    $date1 = date('M d, Y', $date);
                                @endphp
                                <div class="col-lg-6">
                                    <div class="d-flex mb-3 service-item first-service">
                                        <a href="{{ route('blog.details', ['category' => $frontend->category_slug, 'slug' => $frontend->slug]) }}"><img src="{{ asset($frontend->image) }}"
                                            style="width: 100px; height: 100px; object-fit: fill;border-radius:10px;"></a>
                                        <div class="w-100 d-flex flex-column justify-content-center px-3"
                                            style="height: 100px;">
                                            <div class="mb-1" style="font-size: 13px;">
                                                <a
                                                    href="{{ url('user/' . strtolower($frontend->blogCategory->category_name)) }}">{{ $frontend->blogCategory->category_name }}</a>
                                                <span class="px-1">/</span>
                                                <span>{{ $date1 }}</span>
                                            </div>
                                            <a class="h6 m-0"
                                                href="{{ route('blog.details', ['category' => $frontend->category_slug, 'slug' => $frontend->slug]) }}">{!! \Illuminate\Support\Str::words($frontend->title, 5, '....') !!}</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="row text-center">
                        <div class="col-12 text-center">
                            <nav aria-label="Page navigation">
                                <ul class="pagination justify-content-center">
                                    {!! $latestjobs->links() !!}
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex  border border-dark align-items-center bg-warning justify-content-between py-2 px-4 mb-3">
                                <h3 class="m-0 text-center">Result</h3>
                            </div>
                        </div>
                        @if (!empty($result))
                            @foreach ($result as $key => $frontend)
                                @php
                                    $date = strtotime($frontend->created_at);
                                    $date1 = date('M d, Y', $date);
                                @endphp
                                <div class="col-lg-6">
                                    <div class="d-flex mb-3 service-item first-service">
                                        <a href="{{ route('blog.details', ['category' => $frontend->category_slug, 'slug' => $frontend->slug]) }}"><img src="{{ asset($frontend->image) }}"
                                            style="width: 100px; height: 100px; object-fit: fill;border-radius:10px;"></a>
                                        <div class="w-100 d-flex flex-column justify-content-center px-3"
                                            style="height: 100px;">
                                            <div class="mb-1" style="font-size: 13px;">
                                                <a
                                                    href="{{ url('user/' . strtolower($frontend->blogCategory->category_name)) }}">{{ $frontend->blogCategory->category_name }}</a>
                                                <span class="px-1">/</span>
                                                <span>{{ $date1 }}</span>
                                            </div>
                                            <a class="h6 m-0"
                                                href="{{ route('blog.details', ['category' => $frontend->category_slug, 'slug' => $frontend->slug]) }}">{!! \Illuminate\Support\Str::words($frontend->title, 5, '....') !!}</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="row text-center">
                        <div class="col-12 text-center">
                            <nav aria-label="Page navigation">
                                <ul class="pagination justify-content-center">
                                    {!! $result->links() !!}
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex align-items-center  border border-dark bg-warning justify-content-between py-2 px-4 mb-3">
                                <h3 class="m-0 text-center">Laravel</h3>
                            </div>
                        </div>
                        @if (!empty($laravel))
                            @foreach ($laravel as $key => $frontend)
                                @php
                                    $date = strtotime($frontend->created_at);
                                    $date1 = date('M d, Y', $date);
                                @endphp
                                <div class="col-lg-6">
                                    <div class="d-flex mb-3 service-item first-service">
                                        <a href="{{ route('blog.details', ['category' => $frontend->category_slug, 'slug' => $frontend->slug]) }}"><img src="{{ asset($frontend->image) }}"
                                            style="width: 100px; height: 100px; object-fit: fill;border-radius:10px;"></a>
                                        <div class="w-100 d-flex flex-column justify-content-center px-3"
                                            style="height: 100px;">
                                            <div class="mb-1" style="font-size: 13px;">
                                                <a
                                                    href="{{ url('user/' . strtolower($frontend->blogCategory->category_name)) }}">{{ $frontend->blogCategory->category_name }}</a>
                                                <span class="px-1">/</span>
                                                <span>{{ $date1 }}</span>
                                            </div>
                                            <a class="h6 m-0"
                                                href="{{ route('blog.details', ['category' => $frontend->category_slug, 'slug' => $frontend->slug]) }}">{!! \Illuminate\Support\Str::words($frontend->title, 5, '....') !!}</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="row text-center">
                        <div class="col-12 text-center">
                            <nav aria-label="Page navigation">
                                <ul class="pagination justify-content-center">
                                    {!! $laravel->links() !!}
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 pt-3 pt-lg-0">
                    <!-- Ads Start -->
                    {{-- <div class="mb-3 pb-3">
                        <a href=""><img class="img-fluid" src="{{ asset('assets/img/news-500x280-4.jpg') }}"
                                alt=""></a>
                    </div> --}}
                    <!-- Ads End -->
                    <!-- Popular News Start -->
                    <div class="pb-3">
                        <div class="bg-light  border border-dark py-2 px-4 mb-3">
                            <h3 class="m-0 text-center">Tranding</h3>
                        </div>
                        @if (!empty($popularitem))
                            @foreach ($popularitem->slice(0, 6) as $key => $latest_post)
                                @php
                                    $date = strtotime($latest_post->created_at);
                                    $date1 = date('M d, Y', $date);
                                @endphp
                                    <div class="d-flex mb-3 service-item first-service">
                                        <a href="{{ route('blog.details', ['category' => $latest_post->category_slug, 'slug' => $latest_post->slug]) }}"><img src="{{ asset($latest_post->image) }}"
                                            style="width: 100px; height: 100px; object-fit: fill;border-radius:10px;"></a>
                                        <div class="w-100 d-flex flex-column justify-content-center px-3"
                                            style="height: 100px;">
                                            <div class="mb-1" style="font-size: 13px;">
                                                <a href="{{url('user/'.(strtolower($latest_post->blogCategory->category_name)))}}">{{ $latest_post->blogCategory->category_name }}</a>
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

                    <!-- Tags Start -->
                    <div class="pb-3">
                        <div class="bg-light border border-dark py-2 px-4 mb-3">
                            <h3 class="m-0 text-center">Categories</h3>
                        </div>
                        <div class="d-flex flex-wrap m-n1">
                            @if (!empty($categorys))
                                @foreach ($categorys as $key => $category)
                                    <a href="{{ url('user/' . $category->slug) }}"
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
    <!-- News With Sidebar End -->

@endsection
