@extends('layouts.admin.Layouts')
@section('admin-content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Comment</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Comment</li>
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
                                        <h5 class="mb-0">Comment List</h5>
                                    </div>
                                </div>
                                <div class="p-4 mt-1">
                                    <div class="table-responsive rounded" id="make_datatable">
                                        <table class="table table-center bg-white mb-0 make_datatable" id="comment_table">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">sl no</th>
                                                    <th class="text-center col-sm-1">Name</th>
                                                    <th class="text-center col-sm-1">Email</th>
                                                    <th class=" text-center col-sm-1">Category</th>
                                                    <th class=" text-center col-sm-2">Website</th>
                                                    <th class=" text-center col-sm-2">Description</th>
                                                    <th class=" text-center col-sm-2">Admin Reply</th>
                                                    <th class=" text-center col-sm-1">status</th>
                                                    <th class=" text-center col-sm-2">action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Start -->
                                                @if (!empty($listcomment))
                                                    @foreach ($listcomment as $key => $comment)
                                                        <tr>
                                                            <td class="">{{ $key + 1 }}</td>
                                                            <td class="text-center">{{ $comment->name }}</td>
                                                            <td class="text-center">{{ $comment->email }}</td>
                                                            <td class="text-center">{{ $comment->category }}</td>
                                                            <td class="text-center">{{ $comment->website }}</td>
                                                            <td class="text-center">{{ $comment->description }}</td>
                                                            <td class="text-center">admin reply</td>
                                                            <td class="text-center">
                                                                <div class="form-check form-switch">
                                                                    <input data-id="{{ $comment->id }}"
                                                                        class="form-check-input toggle-class"
                                                                        type="checkbox" data-toggle="toggle"
                                                                        data-on="Active" data-off="InActive"
                                                                        {{ $comment->status ? 'checked' : '' }}>
                                                                </div>
                                                            </td>
                                                            <td class="text-center">
                                                                <a href="{{ route('user.comment.edit', $comment->id) }}"
                                                                    class="btn btn-primary btn-xs btn-icon table_btn"><i
                                                                        class="fas fa-edit"></i></a>
                                                                <button type="button" id="delete_btn"
                                                                    value="{{ $comment->id }}" class="btn btn-danger"><i
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


    <!--start delete modal-->
    <div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5>Are You Sure ?</h5>
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

        <!-- start delete ajax-->
        <script>
            $(document).ready(function() {
                $(document).on("click", "#delete_btn", function() {
                    var comment_id = $(this).val();
                    $('#delete_designation_id').val(comment_id);
                    $('#delete_modal').modal('show');
                });
                $(document).on('click', '.delete_submit_btn', function() {
                    var comment_id = $('#delete_designation_id').val();
                    $('#delete_modal').modal('show');
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: "POST",
                        url: "{{url('user/comment-delete')}}",
                        data: {
                            comment_id: comment_id,
                        },
                        dataType: "json",
                        success: function(response) {
                            $('#delete_modal').modal('hide');
                            $("#comment_table").load(location.href + " #comment_table");
                            Toaster(response.success);
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
            //  toggle ajax start
            $('.toggle-class').change(function() {
                let status = $(this).prop('checked') === true ? 1 : 0;
                let blog_id = $(this).data('id');
                alert(blog_id);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: "{{ url('admin/blogStatus') }}",
                    dataType: "json",
                    data: {
                        'status': status,
                        'blog_id': blog_id
                    },
                    success: function(data) {
                        Toaster(data.success);
                    }
                });
            });
        </script>
    @endpush
@endsection
