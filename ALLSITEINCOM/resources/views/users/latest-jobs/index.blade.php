@extends('layouts.users.layout')
@section('user-content')
    <!-- Breadcrumb Start -->
    <div class="container-fluid mt-3">
        <div class="container">
            <nav class="breadcrumb bg-transparent m-0 p-0">
                <a class="breadcrumb-item" href="{{ route('home') }}">Home</a>
                <a class="breadcrumb-item" href="{{ route('user.all-category') }}">Category</a>
                <span class="breadcrumb-item active">Latest-Jobs</span>
            </nav>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- News With Sidebar Start -->
    <div class="container-fluid py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row d-none" id="show_details">
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <table width="100%" align="center">
                                <tbody>
                                    <tr>
                                        <td class="bg-light w-50" style=" border:3px; border-color:red; border-style:solid"
                                            valign="top">
                                            <h1 class="text-center text-dark bg-warning mt-2">Latest Jobs</h1>
                                            <div id="post">
                                                <ul>
                                                    @if (!empty($latestjobs))
                                                        @foreach ($latestjobs as $key => $blog)
                                                            <li class="mb-2 date-hide">
                                                                <a href="{{ route('blog.details', ['category' => $blog->category_slug, 'slug' => $blog->slug]) }}"
                                                                    target="_blank">{{ $blog->title }}</a>
                                                                <span class="text-success" style="font-size: 12px">Start
                                                                    Date :<span
                                                                        style="color: blue;font-weight:700;">{{ \Carbon\Carbon::parse($blog->start_date)->format('j F, Y') }}</span>
                                                                    - Last Date :
                                                                    <span
                                                                        style="color:indigo;font-weight:700;">{{ \Carbon\Carbon::parse($blog->end_date)->format('j F, Y') }}</span></span>
                                                            </li>
                                                            <li class="mb-2 d-none" id="show_details">

                                                            </li>
                                                        @endforeach
                                                    @endif
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <nav aria-label="Page navigation">
                                <ul class="pagination justify-content-center">
                                    {!! $bloglist->links() !!}
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 pt-3 pt-lg-0 ">
                    <div class="pb-3 mb-3">
                        <div class="bg-dark py-2 px-4 mb-3">
                            <h3 class="m-0 text-light text-center">Search ..</h3>
                        </div>
                        <div class="d-flex flex-wrap m-n1 px-2">
                            <input type="search" class="form-control" placeholder="Searching .." id="searchbar"
                                name="search" style="height: 50px">
                        </div>
                    </div>

                    <div class="pb-3 mb-3">
                        <div class="bg-dark py-2 px-4 mb-3">
                            <h3 class="m-0 text-light text-center">Latest Comments</h3>
                        </div>
                        <div class=" bg-light p-3" id="commenttable">
                            <h3 class="text-dark">{{ $commentcount }} Comments</h3>
                            @if (!empty($comments))
                                @foreach ($comments as $key => $comment)
                                    <div class="media mb-3">
                                        <img src="{{ asset('assets/img/user.png') }}" alt="Image"
                                            class="img-fluid mr-3 mt-1" style="width: 45px;">
                                        <div class="media-body">
                                            <h6 class=""><span
                                                    class="text-primary">{{ $comment->name }}</span><small><i>
                                                        @php
                                                            $date = strtotime($comment->created_at);
                                                            $date1 = date('M d, Y h:i:s', $date);
                                                            $updatedate = strtotime($comment->updated_at);
                                                            $updatedate1 = date('M d, Y h:i:s', $updatedate);
                                                        @endphp
                                                        {{ $date1 }}
                                                    </i></small></h6>
                                            <p>{{ $comment->description }}</p>
                                            @auth
                                                <button class="btn btn-sm btn-outline-secondary user_reply"
                                                    fdprocessedid="7lrqez" type="button" data-toggle="modal"
                                                    data-target="#exampleModal" value="{{ $comment->id }}">Reply</button>

                                            @endauth
                                            <div class="media mt-4">
                                                <img src="{{ asset('assets/img/admin.jpg') }}" alt="Image"
                                                    class="img-fluid mr-3 mt-1" style="width: 35px;">
                                                <div class="media-body">
                                                    <h6><a href="{{ route('user.about-us') }}">Ashwani Soni</a>
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
                                                            data-target="#exampleModal1"
                                                            value="{{ $comment->id }}">Reply</button>

                                                    @endauth
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>


                    <!-- Newsletter Start -->
                    <div class="pb-3">
                        <div class="bg-dark py-2 px-4 mb-3">
                            <h3 class="m-0 text-light text-center">COMMENT</h3>
                        </div>
                        <div class="bg-light p-4 mb-3">
                            <form action="{{ route('user.comment.store') }}" method="POST"
                                class="row g-3 needs-validation" novalidate>
                                @csrf
                                <input type="hidden" name="category" value="latest-jobs" required>
                                <div class="col-md-12 mb-3">
                                    <label for="validationCustom01" class="form-label text-danger fw-2">Name</label>
                                    <input type="text" name="name" class="form-control" id="validationCustom01"
                                        placeholder="Enter Your Name">
                                    <div class="valid-feedback">
                                        Enter Your Name
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="validationCustom01" class="form-label text-danger fw-2">Your Email <span
                                            class="text-primary">*</span></label>
                                    <input type="email" placeholder="Enter Your Email" name="email"
                                        class="form-control" id="validationCustom01" required>
                                    <div class="valid-feedback">
                                        Enter Your Email
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="validationCustom01" class="form-label text-danger fw-2">Website
                                        Domain/URL</label>
                                    <input type="url" class="form-control" placeholder="Enter Website Url"
                                        name="website" id="validationCustom01">
                                    <div class="valid-feedback">
                                        Enter Your Website Name
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="validationCustom01" class="form-label text-danger fw-2">Description <span
                                            class="text-primary">*</span></label>
                                    <textarea name="description" id="validationCustom01" class="form-control" cols="35" rows="5" required
                                        placeholder="Enter The Description"></textarea>
                                    <div class="valid-feedback">
                                        Enter The Description
                                    </div>
                                </div>
                                <div class="col-12 mt-3">
                                    <button class="btn btn-warning" type="submit">Added</button>
                                </div>

                            </form>
                            {{-- <button type="submit" value="" class="btn btn-warning">Added</button> --}}
                        </div>
                    </div>
                    <!-- Newsletter End -->

                    <!-- Tags Start -->
                    <div class="pb-3">
                        <div class="bg-dark py-2 px-4 mb-3">
                            <h3 class="m-0 text-center text-light">Category</h3>
                        </div>
                        <div class="d-flex flex-wrap m-n1">
                            @if (!empty($categorys))
                                @foreach ($categorys as $keys => $category)
                                    <a href="{{ asset('user' . '/' . strtolower($category->category_name)) }}"
                                        class="btn btn-sm btn-outline-secondary m-1 {{ $category->slug == 'latest-jobs' ? 'bg-danger text-light' : '' }}">
                                        {{ $category->category_name }}</a>
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

    <!-- bootstrap reply modal -->
    <!-- Button trigger modal -->

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
                const url = "{{ route('user.latest-jobs-search') }}";
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
                        console.log(response);
                        var html = '';
                        if (response.ljlist != '') {
                            $.each(response.ljlist, function(key, blog) {
                                var slugpath = path + blog.category_slug + '/' + blog
                                    .slug;
                                var date = new Date(blog.created_at);
                                var month = (date.getMonth() + 1);
                                var day = (date.getDate());
                                var year = date.getFullYear();
                                var formattedDate = day + "-" + month + "-" + year;
                                html += `
                                <a href=""
                                    target="_blank">${ $blog.title}</a>
                                    <span class="text-success" style="font-size: 12px">Start Date :<span style="color: blue;font-weight:700;">(${blog.start_date})</span> - Last Date :
                                    <span style="color:indigo;font-weight:700;">${blog.end_date}</span></span>
                            `;

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
