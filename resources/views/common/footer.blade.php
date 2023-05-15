
@php
$indexurl =  Request::segment(1);
$role = App\Helper\Helper::role_slug();
@endphp
<!-- Footer Start -->
<footer class="shadow pt-4">
    <div class="container-fluid">
        <div class="row align-items-center">
                <div class=" text-center">
                    <p class="mb-0 text-muted">© <script>document.write(new Date().getFullYear())</script> 
                       @if($role == "super_admin")
                         Workerman
                        @else 
                         Workerman
                        @endif
                    </a>
                </p>
                </div>
        </div><!--end row-->
    </div><!--end container-->
</footer><!--end footer-->
<!-- End -->
