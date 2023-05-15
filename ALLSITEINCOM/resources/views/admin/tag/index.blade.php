@extends('layouts.admin.Layouts')
@section('admin-content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Tag</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Tag</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="layout-specing">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="card rounded shadow pb-1">
                                <div class=" border-0 quotation_form">
                                    <div
                                        class="card-header py-3 bg-transparent d-flex align-items-center justify-content-between">
                                        <h5 class="mb-0">Tag List</h5>
                                        <button class="btn btn-md btn-primary position_btn" id="add_modal"><i data-feather="plus"
                                                class="lead_icon mg-r-5"></i>Add Tag</button></a>
                                    </div>
                                </div>
                                <div class="p-4 mt-1">
                                    <div class="table-responsive rounded" id="department">
                                        <table class="table table-center bg-white mb-0">
                                            <thead>
                                                <tr>
                                                    <th class="text-center col-sm-1">sl no</th>
                                                    <th class="text-center col-sm-7">Tag</th>
                                                    <th class=" text-center col-sm-2">status</th>
                                                    <th class="text-center col-sm-2">action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Start -->
                                                @if (!empty($taglist))
                                                    @foreach ($taglist as $key => $tag)
                                                        <tr>
                                                            <td class="text-center">{{ $key + 1 }}</td>
                                                            <td class="text-center">{{ $tag->tag_name }}</td>
                                                            <td class="text-center">
                                                                <div class="form-check form-switch">
                                                                    <input data-id="{{ $tag->id }}"
                                                                        class="form-check-input toggle-class"
                                                                        type="checkbox" data-toggle="toggle"
                                                                        data-on="Active" data-off="InActive"
                                                                        {{ $tag->status ? 'checked' : '' }}>
                                                                </div>
                                                            </td>
                                                            <td class="text-center d-flex justify-content-center p-3">
                                                                <button
                                                                    class="btn btn-primary btn-xs btn-icon table_btn edit_temp_btn mx-3"
                                                                    id="editmodal" value="{{ $tag->id }}"
                                                                    data-toggle="modal" data-target="#designation_edit"><i
                                                                        class="fas fa-edit"></i></button>
                                                                <button type="button" id="delete_btn"
                                                                    value="{{ $tag->id }}"
                                                                    class="btn btn-danger btn-xs btn-icon"><i
                                                                        class="fa fa-trash" aria-hidden="true"></i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            </tbody><!-- End -->
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end row-->
                </div>
            </div>
            <!--end container-->

            <!-- /.row -->


        </section>
        <!-- /.content -->
    </div>
    <!-- Add MOdal start -->
    <div class="modal fade" id="category_add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header border-bottom p-3">
                    <h5 class="modal-title" id="exampleModalLabel">Add Tag</h5>
                    <button type="button" class="btn btn-icon btn-close" data-bs-dismiss="modal" id="close-modal"><i
                            class="uil uil-times fs-4 text-dark"></i></button>
                </div>
                <div class="modal-body ">
                    <form id="add_userForm" method="POST" class="needs-validation" novalidate>
                        @csrf
                        <div class="row">
                            <div class="md-6">
                                <div class="mb-3">
                                    <label class="form-label">Tag<span class="text-danger">*</span></label>
                                    <div class="form-icon position-relative">
                                        <input name="tag_name" id="tag_name" type="text" class="form-control"
                                            placeholder="Enter Tag Name" value="{{ old('tag_name') }}"
                                            required>
                                        <span style="color:red;">
                                            @error('designation_name')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                        <div class="invalid-feedback">
                                           Please Enter Tag Name
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end row-->
                        <div class="row">
                            <div class="col-sm-12" required>
                                <input type="submit" id="add_submit_btn" name="send" class="btn btn-primary"
                                    value="submit">
                            </div>
                        </div>
                        <!--end row-->
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- add modal end -->


    <!-- Edit MOdal start -->
    <div class="modal fade" id="category_edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header border-bottom p-3">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Tag</h5>
                    <button type="button" class="btn btn-icon btn-close" data-bs-dismiss="modal" id="close-modal"><i
                            class="uil uil-times fs-4 text-dark"></i></button>
                </div>
                <div class="modal-body ">
                    <form id="update_userForm" method="POST" class="needs-validation" novalidate>
                        @csrf
                        <input name="tag_id" id="tag_id" type="hidden" class="form-control ps-5">
                        <span style="color:red;">
                            @error('designation_name')
                                {{ $message }}
                            @enderror
                        </span>
                        <div class="row">
                            <div class="md-6">
                                <div class="mb-3">
                                    <label class="form-label">Tag Name<span class="text-danger">*</span></label>
                                    <div class="form-icon position-relative">
                                        <input name="edit_tag" id="edit_tag" type="text"
                                            class="form-control" placeholder="Please Enter Tag" required>
                                        <span style="color:red;">
                                            @error('designation_name')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                        <div class="invalid-feedback">
                                            Please Enter Tag Name
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end row-->
                        <div class="row">
                            <div class="col-sm-12" required>
                                <input type="submit" id="update_btn" class="btn btn-primary" value="Update">
                            </div>
                        </div>
                        <!--end row-->
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit modal end -->

    <!--start delete modal-->
    <div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Tag</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5> Are You Sure ?</h5>
                    <input type="hidden" id="delete_designation_id" name="input_field_id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-primary delete_submit_btn">Yes</button>
                </div>
            </div>
        </div>
    </div>
    <!--end delete modal-->


    @push('custom-scripts')
        <script>
            // modal add in ajax
            $(document).ready(function() {
                $("#add_modal").on('click', function(e) {
                    e.preventDefault();
                    $("#category_add").modal('show');
                });

                $('#close-modal').on('click', function(e) {
                    e.preventDefault();
                    $("#category_add").modal('hide');
                });

                $('#add_submit_btn').on('submit', function() {

                    var data = {
                        tag: $("#tag_name").val(),
                    };

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: "POST",
                        url: "{{ route('admin.tag.store') }}",
                        data: data,
                        dataType: "json",

                        success: function(response) {
                            Toaster(response.success);
                            $('#add_modal').trigger("reset");
                            $('#designation_add').modal('hide');
                            $('.flash-message').html(response.msg1);
                            $('.flash-message').addClass('alert alert-success');
                        },
                        error: function(response) {
                            var errors = data.responseJSON;
                            console.log(errors);
                        }
                    });
                });
            });
            //  modal add closed ajax
        </script>

        <!-- start delete ajax-->
        <script>
            $(document).ready(function() {

                $(document).on("click", "#delete_btn", function() {
                    var tag_id = $(this).val();

                    $('#delete_designation_id').val(tag_id);
                    $('#delete_modal').modal('show');
                });
                $(document).on('click', '.delete_submit_btn', function() {
                    var tag_id = $('#delete_designation_id').val();
                    $('#delete_modal').modal('show');

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: "POST",
                        url: "{{ url('admin/tag/destroy') }}",
                        data: {
                            tag_id: tag_id,
                            "_method": 'DELETE'
                        },
                        dataType: "json",
                        success: function(response) {

                            $('#delete_modal').modal('hide');
                            $("#department").load(location.href + " #department");
                            // toastr.success(response.success);
                            $('.flash-message').fadeOut(3000, function() {
                                location.reload(true);
                            });

                        }
                    });

                });
            });
        </script>
        <!--end delete ajax-->


        <script>
            // Edit ajax start
            $(document).on("click", "#editmodal", function(e) {
                e.preventDefault();
                var edittagid = $(this).val();
                $('#category_edit').modal('show');
                $.ajax({
                    url: "{{url('admin/tag')}}/" + edittagid + "/edit",
                    type: "GET",
                    success: function(response) {
                        console.log(response);
                        if (response.status == 400) {
                            $('#errorlist').html("");
                            $('#errorlist').addClass("alert alert-danger");
                            $('#errorlist').append('<li>' + response.message + '</li>');

                        } else {
                            $('#edit_tag').val(response.tag_name);
                            $('#tag_id').val(response.id);
                        }
                    }
                });
            });
            // Edit ajax end 

            // update ajax start
            $(document).on("click", "#update_btn", function(e) {
                e.preventDefault();
                $('#update_userForm').addClass('was-validated');
                if ($('#update_userForm')[0].checkValidity() === false) {
                    event.stopPropagation();
                } else {
                    var data = {
                        tag_id: $("#tag_id").val(),
                        edit_tag: $("#edit_tag").val(),
                    }
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type: "PUT",
                        url : "{{ url('admin/tag/update') }}",
                        data: data,
                        dataType: "json",
                        success: function(response) {
                            $('#category_edit').modal('hide');
                            $("#department").load(location.href + " #department");
                            $('.flash-message').fadeOut(3000, function() {
                                location.reload(true);
                            });
                        }
                    });
                }
            });
            // update ajax end

            //  toggle ajax start
            $('.toggle-class').change(function() {
                let status = $(this).prop('checked') === true ? 1 : 0;
                let tag_id = $(this).data('id');

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "{{url('admin/changeTagStatus')}}",
                    data: {
                        'status': status,
                        'tag_id': tag_id
                    },
                    success: function(data) {
                        Toaster(data.success);
                    }
                });
            });
        </script>
    @endpush
@endsection
