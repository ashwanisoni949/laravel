@extends('layouts.admin.Layouts')
@section('admin-content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Blog</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Blog Detials</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <section class="content">
            <div class="container-fluid">
                <div class="layout-specing">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="card rounded shadow pb-1">
                                <div class=" border-0 quotation_form">
                                    <div
                                        class="card-header py-3 bg-transparent d-flex align-items-center justify-content-between">
                                        <h5 class="mb-0">Edit Blog</h5>
                                    </div>
                                </div>
                                <div class="card-body mt-3">
                                    <form action="{{ route('admin.blog.update', $editblog->id) }}" method="POST"
                                        enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                                        @csrf
                                        @method('patch')
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <div class="form-group">
                                                        <label for="title">Title</label>
                                                        <input type="text" name="title" class="form-control"
                                                            id="title" value="{{ $editblog->title }}"
                                                            placeholder="Enter Title Name" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <div class="form-group">
                                                        <label for="slug">Slug</label>
                                                        <input type="text" name="slug" class="form-control"
                                                            id="slug" value="{{ $editblog->slug }}"
                                                            placeholder="Enter Slug Name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <div class="form-group">
                                                        <label for="category">Category</label>
                                                        <select name="category_slug" id="category_id"
                                                            class="form-control select2">
                                                            <option value="">
                                                                Select Category Name
                                                            </option>
                                                            @foreach ($category as $item)
                                                                <option
                                                                    {{ $editblog->category_slug == $item->slug ? 'selected' : '' }}
                                                                    value="{{ $item->slug }}">{{ $item->category_name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="mb-3">
                                                    <div class="form-group">
                                                        <label for="image">Exist Image</label>
                                                        <div><img src="{{ $editblog->image ? url($editblog->image) : '' }}"
                                                                alt="old blog image" class="w_200" style="height: 50px">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="mb-3">
                                                    <div class="form-group">
                                                        <label for="image">Image</label>
                                                        <div><input type="file" name="image" id="image"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <div class="form-group">
                                                        <label for="image">Start Date</label>
                                                        <input type="date" class="form-control" name="start_date" id="datetimepicker" value="{{ $editblog->start_date }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <div class="form-group">
                                                        <label for="image">End Date</label>
                                                        <input type="date" class="form-control" name="end_date" id="datetimepicker" value="{{ $editblog->end_date }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="short_description">Short Description</label>
                                                <textarea class="form-control" cols="30" rows="5" id="short_description" name="short_description">{{ $editblog->short_description }}</textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <textarea class="ckeditor" id="summernote1" name="description">{{ $editblog->description }}</textarea>
                                            </div>
                                            <div class="mt-3">
                                                <button type="submit" class="btn btn-success w-10">Update</button>
                                            </div>
                                        </div>

                                    </form>
                                    <script>
                                        tinymce.init({
                                            selector: '#summernote1',
                                            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
                                            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
                                            tinycomments_mode: 'embedded',
                                            tinycomments_author: 'Ashwani Soni',
                                            mergetags_list: [{
                                                    value: 'First.Name',
                                                    title: 'First Name'
                                                },
                                                {
                                                    value: 'Email',
                                                    title: 'Email'
                                                },
                                            ],
                                        });
                                    </script>
                                </div>

                            </div>
                        </div>
                        <!--end row-->
                    </div>
                </div>
                <!--end container-->

                <!-- /.row -->


        </section>
    </div>

    @push('custom-scripts')
    <script>
        (function($) {
            "use strict";
            $(document).ready(function() {
                $("#title").on("focusout", function(e) {
                    $("#slug").val(convertToSlug($(this).val()));
                })

            });

        })(jQuery);

        function convertToSlug(Text) {
            return Text
                .toLowerCase()
                .replace(/[^\w ]+/g, '')
                .replace(/ +/g, '-');
        }
    </script>
@endpush
@endsection
