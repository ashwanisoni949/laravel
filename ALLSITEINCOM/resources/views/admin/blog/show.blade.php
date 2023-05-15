@extends('layouts.users.layout')
@section('user-content')
    <!-- News With Sidebar Start -->
    <div class="container balance py-3 mt-3" style="padding-left: 0px;padding-right:0px">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <!-- News Detail Start -->
                    <div class="position-relative mb-3">
                        <img class="img-fluid w-100" src="{{ asset($blogdetails->image) }}"
                            style="object-fit: fill;height:200px">
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
                        <div class="overlay position-relative bg-light">
                            <div class="mb-3">
                                <a href="">{{ $blogdetails->blogCategory->category_name }}</a>
                                <span class="px-1">/</span>
                                @php
                                    $date = strtotime($blogdetails->created_at);
                                    $date1 = date('M d, Y', $date);
                                @endphp
                                <span>{{ $date1 }}</span>
                            </div>
                            {!! $blogdetail !!}
                        </div>
                    </div>
                    <!-- News Detail End -->
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
                    <!-- Comment List Start -->
                    <div class="bg-light mb-3" style="padding: 30px;">
                        @php
                            $count = count($commentcount);
                        @endphp
                        <h3 class="mb-4">{{ $count }} Comments</h3>
                        @if (!empty($commentcount))
                            @foreach ($commentcount as $key => $comment)
                                <div class="media">
                                    <img src="{{ asset('assets/img/newuser.png') }}" alt="Image"
                                        class="img-fluid mr-3 mt-1" style="width: 45px;">
                                    <div class="media-body">
                                        <h6><a href="">{{ $comment->name }}</a>
                                            @php
                                                $date = strtotime($comment->created_at);
                                                $date1 = date('M d, Y h:i:s', $date);
                                                $updatedate = strtotime($comment->updated_at);
                                                $updatedate1 = date('M d, Y h:i:s', $updatedate);
                                            @endphp
                                            <small><i> {{ $date1 }}</i></small>
                                        </h6>
                                        <p>{{ $comment->description }}</p>
                                        @auth
                                            <button class="btn btn-sm btn-outline-secondary user_reply" fdprocessedid="7lrqez"
                                                type="button" data-toggle="modal" data-target="#exampleModal"
                                                value="{{ $comment->id }}">Reply</button>

                                        @endauth
                                        <div class="media mt-4">
                                            <img src="{{ asset('assets/img/admin.jpg') }}" alt="Image"
                                                class="img-fluid mr-3 mt-1" style="width: 45px;">
                                            <div class="media-body">
                                                <h6><a href="">Ashwani Soni</a>
                                                    <small><i>{{ $updatedate1 }}</i></small>
                                                </h6>
                                                <p class="text-danger">
                                                    @if (!empty($comment->admin_reply))
                                                        @if ($comment->admin_reply == 'waiting for admin reply')
                                                            <i class="fas fa-spinner fa-pulse text-success"></i>
                                                            {{ $comment->admin_reply }}
                                                        @else
                                                            {{ $comment->admin_reply }}
                                                        @endif
                                                    @endif
                                                </p>
                                                @auth
                                                    <button class="btn btn-sm btn-outline-secondary admin_reply"
                                                        fdprocessedid="7lrqez" type="button" data-toggle="modal"
                                                        data-target="#exampleModal1" value="{{ $comment->id }}">Reply</button>
                                                @endauth
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <!-- Comment List End -->
                    
                    <!-- Comment Form Start -->
                    <div class="bg-light mb-3" style="padding: 30px;">
                        <h3 class="mb-4">Leave a comment</h3>
                        <form action="{{ route('user.comment.store') }}" method="POST" class="needs-validation"
                            novalidate>
                            @csrf
                            <input type="hidden" name="category" value="{{ $blogdetails->slug }}">
                            <div class="form-group">
                                <label for="name" class="text-danger">Name *</label>
                                <input type="text" class="form-control" placeholder="Enter Your Name" id="name"
                                    name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="email" class="text-danger">Email *</label>
                                <input type="email" class="form-control" placeholder="Enter Your Email Id" id="email"
                                    name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="website" class="text-danger">Website</label>
                                <input type="url" class="form-control" placeholder="Enter Your Domain (Optional)"
                                    id="website" name="website">
                            </div>

                            <div class="form-group">
                                <label for="message" class="text-danger">Message *</label>
                                <textarea id="message" cols="30" rows="5" placeholder="Enter Your QUERY" class="form-control"
                                    name="description" required></textarea>
                            </div>
                            <div class="form-group mb-0">
                                <input type="submit" value="Leave a comment"
                                    class="btn btn-primary font-weight-semi-bold py-2 px-3">
                            </div>
                        </form>
                    </div>
                    <!-- Comment Form End -->
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
                    <!-- Popular News Start -->
                    <div class="pb-3">
                        <div class="bg-light border border-dark py-2 px-4 mb-3">
                            <h3 class="m-0 text-center">Tranding</h3>
                        </div>
                        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5239991314032243"
                            crossorigin="anonymous"></script>
                        <ins class="adsbygoogle" style="display:block" data-ad-format="fluid"
                            data-ad-layout-key="-fq-1e-b-19+9l" data-ad-client="ca-pub-5239991314032243"
                            data-ad-slot="4150290542"></ins>
                        <script>
                            (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>
                        @if (!empty($bloglist))
                            @foreach ($bloglist->slice(0, 6)->where('category_slug', $blogdetails->category_slug) as $key => $latest_post)
                                @php
                                    $date = strtotime($latest_post->created_at);
                                    $date1 = date('M d, Y', $date);
                                @endphp
                                <div class="d-flex mb-3 service-item first-service">
                                    <img src="{{ asset($latest_post->image) }}"
                                        style="width: 100px; height: 100px; object-fit: fill;border-radius:10px;">
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
                    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5239991314032243"
                        crossorigin="anonymous"></script>
                    <ins class="adsbygoogle" style="display:block" data-ad-format="fluid"
                        data-ad-layout-key="-fq-1e-b-19+9l" data-ad-client="ca-pub-5239991314032243"
                        data-ad-slot="4150290542"></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                    <!-- Tags Start -->
                    <div class="pb-3">
                        <div class="bg-light py-2 px-4 border border-dark mb-3">
                            <h3 class="m-0 text-center">Category</h3>
                        </div>
                        <div class="d-flex flex-wrap m-n1">
                            @if (!empty($categorys))
                                @foreach ($categorys as $key => $category)
                                    <a href="{{ asset('user' . '/' . strtolower($category->category_name)) }}"
                                        class="btn btn-sm btn-outline-secondary m-1 {{ $category->slug == $blogdetails->category_slug ? 'bg-danger text-light' : '' }}">{{ $category->category_name }}</a>
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

     <!-- Modal -->
    <!-- user reply modal -->
    <div class="modal fade usermodal" id="exampleModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form class="row g-3 needs-validation" novalidate>
                @csrf
                @method('PUT')
                <input type="hidden" id="update_id" name="update_id">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">User Reply</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12">
                            <label for="validationCustom01" class="form-label">User Reply</label>
                            <input type="text" class="form-control" id="user_reply" name="user_reply" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="update_btn">Update</button>

                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- end user reply -->

    <!-- admin reply modal -->
    <div class="modal fade usermodal" id="exampleModal1" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form class="row g-3 needs-validation" novalidate>
                @csrf
                @method('PUT')
                <input type="hidden" id="admin_update_id" name="admin_update_id">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Admin Reply</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12">
                            <label for="validationCustom01" class="form-label">Admin Reply</label>
                            <input type="text" class="form-control" id="admin_reply" name="admin_reply" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="admin_update_btn">Update</button>

                    </div>
                </div>
            </form>
        </div>
    </div>


    
    @section('scripts')
    <script>
        $(document).ready(function() {
            $(".user_reply").on("click", function() {
                var user_id = $(this).val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                });
                $.ajax({
                    url: "{{ route('user.user-reply') }}",
                    type: "GET",
                    data: {
                        user_id: user_id,
                    },
                    success: function(response) {
                        console.log();
                        if (response.status == 400) {
                            $('#errorlist').html("");
                            $('#errorlist').addClass("alert alert-danger");
                            $('#errorlist').append('<li>' + response.message + '</li>');

                        } else {
                            $('#user_reply').val(response.userreply.description);
                            $('#update_id').val(response.userreply.id);
                        }
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $(".admin_reply").on("click", function() {
                var admin_id = $(this).val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                });
                $.ajax({
                    url: "{{ route('user.admin-reply') }}",
                    type: "GET",
                    data: {
                        admin_id: admin_id,
                    },
                    success: function(response) {
                        console.log();
                        if (response.status == 400) {
                            $('#errorlist').html("");
                            $('#errorlist').addClass("alert alert-danger");
                            $('#errorlist').append('<li>' + response.message + '</li>');

                        } else {
                            $('#admin_reply').val(response.adminreply.admin_reply);
                            $('#admin_update_id').val(response.adminreply.id);
                        }
                    }
                });
            });
        });
        $(document).on("click", "#admin_update_btn", function(e) {
            e.preventDefault();
            var data = {
                admin_update_id: $("#admin_update_id").val(),
                admin_name: $("#admin_reply").val(),
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "{{ url('user/admin-update') }}",
                data: data,
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    location.reload();
                }
            });

        });
    </script>
    <script>
        $(document).ready(function() {
            $("#searchbar").on("keyup", function() {
                var search = $(this).val().toLowerCase();
                const url = "{{ route('user.search') }}";
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                });
                $.ajax({
                    url: url,
                    type: "GET",
                    data: {
                        search: search,
                    },
                    dataType: "json",
                    success: function(response) {
                        var path = '{{ URL::asset('/') }}';
                        var html = '';
                        if (response.bloglist != '') {
                            $.each(response.bloglist, function(key, blog) {
                                var path1 = path + blog.image;
                                var slugpath = path + blog.category_slug + '/' + blog
                                    .slug;
                                var date = new Date(blog.created_at);
                                var month = (date.getMonth() + 1);
                                var day = (date.getDate());
                                var year = date.getFullYear();
                                var formattedDate = day + "-" + month + "-" + year;
                                html += `
                                <div class="col-lg-6">
                                    <div class="d-flex mb-3 service-item first-service">
                                        <img src="${path1}"
                                            style="width: 100px; height: 100px; object-fit:fill;border-radius:10px;">
                                        <div class="w-100 d-flex flex-column justify-content-center px-3"
                                            style="height: 100px;">
                                            <div class="mb-1" style="font-size: 13px;">
                                                <a href="">HTML</a>
                                                <span class="px-1">/</span>
                                                <span>${formattedDate}</span>
                                            </div>
                                            <a class="h6 m-0"
                                                href="${slugpath}">${blog.title}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>`;

                            });
                        } else {
                            html += `<div class="col-lg-12">
                            <h1 class="text-center text-danger">No records found</h1>
                            </div>
                            `;
                        }
                        $('.date-hide').addClass("d-none");
                        $('#show_details').removeClass("d-none");
                        $("#show_details").html(html);
                    }

                });
            });
        });

        $(document).on("click", "#update_btn", function(e) {
            e.preventDefault();
            var data = {
                update_id: $("#update_id").val(),
                user_name: $("#user_reply").val(),
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "{{ url('user/user-update') }}",
                data: data,
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    location.reload();
                }
            });

        });
    </script>
  @endsection

@endsection
