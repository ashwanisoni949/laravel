@php
    $tags = App\Models\Tag::where('status', 1)
        ->take(8)
        ->get();
    $categorys = App\Models\Category::where('status', 1)->get();
@endphp

<!-- Footer Start -->
<svg class="waves " xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28"
    preserveAspectRatio="none" shape-rendering="auto">
    <g class="parallax">
        <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(114,137,218,0.7)" />
        <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(114,137,218,0.5)" />
        <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(114,137,218,0.3)" />
        <use xlink:href="#gentle-wave" x="48" y="7" fill="#7289da" />


        <div class="container-fluid  pt-5 px-sm-3 px-md-5 " style="background-color: rgba(114,137,218,1);">
            <div class="row text-dark footer_design">
                <div class="col-lg-3 col-md-6 mb-5">
                    <a href="{{ route('home') }}" class="navbar-brand">

                        <h1 class="mb-2 mt-n2 display-5 text-uppercase"><span class="text-primary"><img
                                    src="{{ asset('assets/img/11.png') }}" alt="logo" style="height: 80px"></h1>
                    </a>
                    <p>This Website is making laravel platform based. This Website Provide Best Content in Mixed hindi English.Because Understand 90% Users.
                    </p>
                    <div class="d-flex justify-content-start mt-4">
                        <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px;"
                            href="#"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px;"
                            href="#"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px;"
                            href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px;"
                            href="#"><i class="fab fa-instagram"></i></a>
                        <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px;"
                            href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-5">
                    <h4 class="font-weight-bold mb-4 text-dark">Categories</h4>
                    <div class="d-flex flex-wrap m-n1">
                        @foreach ($categorys as $keys => $category)
                            <a href="{{ asset('user/'.strtolower($category->slug)) }}"
                                class="btn btn-sm btn-outline-light m-1">{{ $category->category_name }}</a>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-5">
                    <h4 class="font-weight-bold mb-4">Tags</h4>
                    <div class="d-flex flex-wrap m-n1">
                        @foreach ($tags as $key => $tag)
                            <a href="" class="btn btn-sm btn-outline-light m-1">{{ $tag->tag_name }}</a>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-5">
                    <h4 class="font-weight-bold mb-4">Quick Links</h4>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-light mb-2" href="{{ route('user.about-us') }}" target="_blank"><i
                                class="fa fa-angle-right text-dark mr-2"></i>About US</a>
                        <a class="text-light mb-2" href="{{ route('user.privacy-policy') }}" target="_blank"><i
                                class="fa fa-angle-right text-dark mr-2"></i>Privacy & policy</a>
                        <a class="text-light mb-2" href="{{ route('user.terms-and-conditions') }}" target="_blank"><i class="fa fa-angle-right text-dark mr-2"></i>Terms
                            & conditions</a>
                     <a class="text-light mb-2" href="{{ route('user.disclaimer') }}" target="_blank"><i class="fa fa-angle-right text-dark mr-2"></i>Disclaimer</a>
                        <a class="text-light" href="{{route('user.contact.index')}}"><i class="fa fa-angle-right text-dark mr-2"></i>Contact</a>
                    </div>
                </div>
            </div>
        </div>
    </g>
</svg>
<div class="container-fluid py-4 px-sm-3 px-md-5 text-center text-bold fw-5">
    Learn Code @ 2023-24 All Reserve
</div>
<style type="text/css">
    .float{
      position:fixed;
      width:60px;
      height:60px;
      bottom:40px;
      left:40px;
      background-color:#25d366;
      color:#FFF;
      border-radius:50px;
      text-align:center;
      font-size:30px;
      box-shadow: 2px 2px 3px #999;
      z-index:100;
    }
    .footer_logo img{
    width: 200px!important;
        height: auto!important;}
    
    .my-float{
      margin-top:16px;
    }
    </style>
<!-- Footer End -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<a href="https://chat.whatsapp.com/HcJWHqpIzx21A6yq2vFQHj"  class="float" target="_blank">
<i class="fa fa-whatsapp my-float"></i>
</a>

<!-- Back to Top -->
<a href="#" class="btn btn-dark back-to-top"><i class="fa fa-angle-up"></i></a>


<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('assets/lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>

<!-- Contact Javascript File -->
<script src="{{ asset('assets/mail/jqBootstrapValidation.min.js') }}"></script>
<script src="{{ asset('assets/mail/contact.js') }}"></script>

<!-- Template Javascript -->
<script src="{{ asset('assets/js/main.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<!-- News With Sidebar End -->
{{-- <script src="https://code.jquery.com/jquery-3.6.3.min.js" ></script> --}}

<script>
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: '',
            autoDisplay: 'true',
            layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL
        }, 'google_translate_element');
    }
</script>
<script src='//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit'></script>
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>
{{-- Toaster CDN --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
      function Toaster(message) {
          Command: toastr["success"](message)
          toastr.options = {
              "closeButton": true,
              "debug": false,
              "newestOnTop": true,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "preventDuplicates": false,
              "hideDuration": "1000",
              "timeOut": "1000",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
          }
      }
    
    //success massage strip disable
    $(function(){
    $(".alert").delay(3000).fadeOut("slow");
    });
    </script>
     <script>
        $(document).ready(function() {
            toastr.options.timeOut = 10000;
            @if (Session::has('error'))
                toastr.error('{{ Session::get('error') }}');
            @elseif(Session::has('success'))
                toastr.success('{{ Session::get('success') }}');
            @endif
        });

    </script>

@yield('scripts')
</body>

</html>
