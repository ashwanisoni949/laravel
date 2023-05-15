@php
$indexurl = Request::segment(1);
$role = App\Helper\Helper::role_slug();
@endphp
<x-app-layout>
    <div class="container-fluid">
        <div class="layout-specing">
            {{-- id="save-website-data" --}}
            <form class="needs-validation" id="save-website-data" novalidate="">
                <div class="row mb-3">
                    <div class="col-md-12 col-lg-12 ">
                        <div class="card rounded shadow ">
                            <div class=" border-0 quotation_form">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="m-2 position-relative d-flex">
                                        <div class="mb-0 position-relative my-3 d-flex">
                                            <p class="mb-0 pr-3 f-14 d-flex text-dark-grey align-items-center">
                                                {{ __('seo.website') }}
                                            </p>
                                            <select class="form-select form-control mx-3" id="website_id" name="website_id">
                                                <option disabled="" selected="">
                                                    {{ __('seo.select') }}
                                                </option>
                                                @foreach ($web_setting as $web)
                                                <option data-content="{{ ucfirst($web->website_name) }}" value="{{ $web->id }}">
                                                    {{
                                                            ucfirst($web->website_name) }}
                                                </option>
                                                @endforeach
                                            </select>
                                            <p class="mb-0 pr-3 f-14 d-flex text-dark-grey align-items-center">
                                                {{ __('seo.month') }}
                                            </p>
                                            <select class="form-select form-control mx-3" id="month" name="month">
                                                <option disabled="" selected="">
                                                    select
                                                </option>
                                                <option ($month="1" )="" @endif="" @if="" selected="" value="1">
                                                    {{
                                                            __('seo.january') }}
                                                </option>
                                                <option ($month="2" )="" @endif="" @if="" selected="" value="2">
                                                    {{
                                                            __('seo.february') }}
                                                </option>
                                                <option ($month="3" )="" @endif="" @if="" selected="" value="3">
                                                    {{
                                                            __('seo.march') }}
                                                </option>
                                                <option ($month="4" )="" @endif="" @if="" selected="" value="4">
                                                    {{
                                                            __('seo.april') }}
                                                </option>
                                                <option ($month="5" )="" @endif="" @if="" selected="" value="5">
                                                    {{
                                                            __('seo.may') }}
                                                </option>
                                                <option ($month="6" )="" @endif="" @if="" selected="" value="6">
                                                    {{
                                                            __('seo.june') }}
                                                </option>
                                                <option ($month="7" )="" @endif="" @if="" selected="" value="7">
                                                    {{
                                                            __('seo.july') }}
                                                </option>
                                                <option ($month="8" )="" @endif="" @if="" selected="" value="8">
                                                    {{
                                                            __('seo.august') }}
                                                </option>
                                                <option ($month="9" )="" @endif="" @if="" selected="" value="9">
                                                    {{
                                                            __('seo.september') }}
                                                </option>
                                                <option ($month="10" )="" @endif="" @if="" selected="" value="10">
                                                    {{
                                                            __('seo.october') }}
                                                </option>
                                                <option ($month="11" )="" @endif="" @if="" selected="" value="11">
                                                    {{
                                                            __('seo.november') }}
                                                </option>
                                                <option ($month="12" )="" @endif="" @if="" selected="" value="12">
                                                    {{
                                                            __('seo.december') }}
                                                </option>
                                            </select>
                                            <p class="mb-0 pr-3 f-14 d-flex text-dark-grey align-items-center">
                                                {{ __('seo.year') }}
                                            </p>
                                            <select class="form-select form-control mx-3" id="year" name="year">
                                                <option selected="">
                                                    {{ __('seo.select') }}
                                                </option>
                                                @for($i = 2021; $i<= $year; $i++)
                                                <option ''="" 'selected'="" :="" ?="" {{$year="$i" }}="">
                                                    {{$i}}
                                                </option>
                                                @endfor
                                            </select>
                                        </div>
                                        {{--
                                        <button class="btn btn-primary" type="submit">
                                            Get Details
                                        </button>
                                        --}}
                                                {{--
                                        <input class="btn m-0 ms-5 my-1 btn-primary" id="submit" name="send" type="submit" value="Get Details">
                                            --}}
                                            <button class="btn m-0 ms-5 my-1 btn-primary get_details" id="get_details" type="submit">
                                                Get Details
                                            </button>
                                            {{--
                                            <input class="btn btn-primary contact_submit get_details" name="send" type="submit" value="Get Details">
                                                --}}
                                            </input>
                                        </input>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-lg-12 my-0">
                        <div class="card rounded shadow pb-1">
                            <div class="p-4 mt-1">
                                <div class="table-responsive shadow rounded" id="table_bind">
                                    <h4 class="text-center">
                                        {{ __('seo.record_not_found') }}
                                    </h4>
                                </div>
                                <div class="mb-3 tab_table d-none text-center" id="date-hide">
                                    {{--
                                    <button class="btn btn-primary website-form mt-3" type="sumit">
                                        Update
                                    </button>
                                    --}}
                                    <input class="btn btn-primary website-form mt-3" type="submit" value="Update">
                                    </input>
                                </div>
                            </div>
                            <!--end col-->
                            {{-- @if($role == "super_admin") --}}
                            
                            {{-- @endif --}}
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--end container-->
    @push('scripts')
    <script>
        $(document).ready(function() {
                $('.get_details').on('click', function(e) {
                    e.preventDefault();
                    var data = {
                        website_id: $("#website_id").val(),
                        month: $("#month").val(),
                        year: $("#year").val(),

                    };
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: "POST",
                        url: "{{ route('get-monthly-result') }}",
                        data: data,
                        dataType: "json",
                        success: function(response) {
                          
                            var html = `<table class="table table-center bg-white mb-0">
                                        <thead>
                                            <tr>
                                                <th class="  border-bottom p-3 col-sm-4">{{ __('seo.title') }}</th>
                                                <th class=" text-centerborder-bottom p-3 col-sm-4">{{
                                                    __('seo.sub_title') }}</th>
                                                <th class=" text-centerborder-bottom p-3 col-sm-2">{{
                                                    __('common.result') }}</th>
                                            </tr>
                                        </thead><tbody>`; 


                    $.each(response.seo_title, function(key, parentData) {

                        html += `<tr>
                                    <td>${parentData.title_name}</td>
                                    <td></td>
                                    <td></td>
                                </tr>`;
                        if (parentData.child != '') {
                            $.each(parentData.child, function(childKey, child) {
                                if (parentData.id == child.parent_id) {
                                    var result_value = '';
                                    if (child.id != null)
                                    result_value = response.seo_result[child.id];
                                   
                                        html += `<tr>
                                                <td></td>
                                                <td>${child.title_name} </td>
                                                <td>
                                                    <input type="text" id="result_value${child.id}" class="w-75 result_value" name="result_change${child.id}" value="${result_value == undefined ? '' : result_value}">
                                                    <input type="hidden" name="title_id[]" value="${child.id}">
                                                </td>
                                        </tr>`;
                                }

                            });
                        }

                    });
                    html += `</tbody>
                         </table>
                         
                         `;
                         $('#date-hide').removeClass("d-none");
                  
                
                    $("#table_bind").html(html);
                   

                  


                        }
                    });
                });
            });
    </script>
    <script>
    $('.website-form').on('click', function(e) {
    e.preventDefault();
     const url = "{{ route('save-website-update') }}";

    $.ajax({
        url: url,
        container: '#save-website-data',
        type: "POST",
        data: $('#save-website-data').serialize(),
        success: function(response) {
            location.reload();
        }
    })
});
</script>
<script>
        // $(document).ready(function() {
        //     $('#website_id, #month, #year').on('change keyup', function() {

        //         var website_id = $('#website_id').val();
        //         var month = $('#month').val();
        //         var year = $('#year').val();
        //         // for date subtract
        //         var current_date = new Date();
        //         var c_year = current_date.getFullYear();
        //         var c_month = current_date.getMonth() + 1;
        //         var c_days = current_date.getDate();
        //         var current_month_date = c_month;

        //         console.log(current_month_date);

        //         var selected_month_date = month;
        //         console.log(selected_month_date);
        //         var selected_date = new Date(selected_month_date);
        //         selected_date.setDate(selected_date.getDate() - 30);


        //         var p_year = selected_date.getFullYear();
        //         var p_month = selected_date.getMonth() + 1;
        //         var p_days = selected_date.getDate();
        //         var pre_month_date = p_month;
        //         console.log(pre_month_date);
        //         if ((current_month_date == selected_month_date || current_month_date - 1 == selected_month_date)) {

        //             $('#date-hide').removeClass("d-none");


        //         } else {
        //             $('#date-hide').addClass("d-none");

        //         }

        //         if (website_id != '' && month != '' && year != '') {

        //             $("#seo_websites").html('');
        //             tableWebContent(website_id, month, year);
        //         }
        //     });
        // });
        // $('.website-form').click(function() {

        //     const url = "{{ route('save-website-update') }}";

        //     $.ajax({
        //         url: url,
        //         container: '#save-website-data',
        //         type: "POST",
        //         data: $('#save-website-data').serialize(),
        //         success: function(response) {
        //             location.reload();
        //         }
        //     })
        // });


       








        function tableWebContent(website_id, month, year) {
           
            const url = "{{ route('get-monthly-result') }}";

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: url,
                type: "POST",
                data: {
                    website_id: website_id,
                    month: month,
                    year: year,

                },
                dataType: "json",
                beforeSend: function() {
                    var html = `<div class="preloader-container d-flex justify-content-center align-items-center">
                                <div class="spinner-border" role="status" aria-hidden="true"></div>
                            </div>`;

                    $("#seo_websites").append(html);
                },


                success: function(result) {

                    console.log(result.seo_result);


                    var html = `<div class="table-responsive p-20">
                                <input type="hidden" name="website_id" value="${website_id}">
                                <input type="hidden" name="month" value="${month}">
                                <input type="hidden" name="year" value="${year}">
                                <table class="table table-center bg-white mb-0">
                                <thead>
                                <th class="border-bottom p-3">Title</th>
                                <th class="border-bottom p-3" style="min-width: 220px;">SubTitle</th>
                                
                                <th class="text-center border-bottom p-3">Result</th>
                                <thead>`;
                    $.each(result.seo_title, function(key, parentData) {

                        html += `<tr>
                                    <td>${parentData.title_name}</td>
                                    <td></td>
                                    <td></td>
                                </tr>`;
                        if (parentData.child != '') {
                            $.each(parentData.child, function(childKey, child) {
                                if (parentData.id == child.parent_id) {

                                    var result_value = '';
                                    if (result.seo_result[child.id] != null)

                                        result_value = result.seo_result[child.id];

                                    html += `<tr>
                                                <td></td>
                                                <td>${child.title_name} </td>
                                                <td><input type="text" class="form-control height-35 f-14" name="result_value[]" value="${result_value}">
                                                <input type="hidden" name="title_id[]" value="${child.id}">
                                                </td>
                                        </tr>`;
                                }

                            });
                        }

                    });
                    html += `</table>
                            </div>`;
                            $('#date-hide').removeClass("d-none");
                            $('#date-hide').removeClass("d-none");
                    $("#seo_websites").html(html);
                }
            });
        }
    </script>
    @endpush
</x-app-layout>