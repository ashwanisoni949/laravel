
@php
$indexurl =  Request::segment(1);
$role = App\Helper\Helper::role_slug();
@endphp

{{-- @dd($indexurl); --}}
<!-- sidebar-wraaper -->
<nav id="sidebar" class="sidebar-wrapper ">
<div class="sidebar-content" data-simplebar style="height: calc(100% - 60px);">
    <div class="sidebar-brand">
        <a href="{{route('dashboard')}}">
            <img src="{{asset('assets/images/workerman.png')}}" height="35" class="logo-light-mode" alt="">
            <img src="{{asset('assets/images/workerman.png')}}" height="35" class="logo-dark-mode" alt="">
            <span class="sidebar-colored">
                <img src="{{asset('assets/images/workerman.png')}}" height="24" alt="">
            </span>
        </a>
    </div>

    <ul class="sidebar-menu" >
        <li><a href="{{route('dashboard')}}"><i class="ti ti-home"></i>Dashboard</a></li>
        @if($role == "super_admin")
        <li class="sidebar-dropdown {{ in_array($indexurl, array('role', 'user', 'employee', 'permission', 'department','designation')) ? 'active' : ''}} " >
            <a href="javascript:void(0)">
                <div class="icon"><img src="{{asset('assets/images/svg/002-management.png')}}" class="img-fluid d-block p-2"></div>    
               User Management</a>
            <div class="sidebar-submenu {{ in_array($indexurl, array('role', 'user', 'employee', 'permission', 'department','designation')) ? 'd-block' : ''}}" >
                <ul>
                    <li class='{{$indexurl == 'user' ? 'active' : ''}}'><a href="{{route('user.index')}}">User</a></li>
                    <li class='{{$indexurl == 'employee' ? 'active' : ''}}'><a href="{{route('employee.index')}}">Employee</a></li>
                    <li class='{{$indexurl == 'role' ? 'active' : ''}}'><a href="{{route('role.index')}}">Role</a></li>
                    <li class='{{$indexurl == 'permission' ? 'active' : ''}}'><a href="{{route('permission.index')}}">Permission</a></li>
                    <li class='{{$indexurl == 'department' ? 'active' : ''}}'><a href="{{route('department.index')}}">Department</a></li>
                    <li class='{{$indexurl == 'designation' ? 'active' : ''}}'><a href="{{route('designation.index')}}">Designation</a></li>
                    
                </ul>
            </div>
        </li>
        @endif
      
        <li class="sidebar-dropdown {{ in_array($indexurl, array('seo-website', 'seo-task', 'daily-work', 'seo-work', 'seo-result','seo-task','import-data')) ? 'active' : ''}} with-sub">
            <a href="javascript:void(0)" >
                <div class="icon">
                   <img src="{{asset('assets/images/svg/004-seo.png')}}" class="img-fluid d-block p-2">
                </div>
                SEO</a>
            <div class="sidebar-submenu {{ in_array($indexurl, array('seo-website', 'submission', 'daily-work', 'seo-work', 'seo-result','seo-task','import-data')) ? 'd-block' : ''}}">
                <ul>
                    @if($role == "super_admin")
                    <li class='{{$indexurl == 'seo-website' ? 'active' : ''}}{{$indexurl == 'seo-task' ? 'active' : ''}}'><a href="{{route('workReport')}}" class="nav-link">General Settings</a></li>
                    @endif
                    @if($role == "super_admin")
                    <li class='{{$indexurl == 'submission' ? 'active' : ''}}'><a href="{{route('submission.index')}}">Submission Url</a></li>
                   
                    <li class='{{$indexurl == 'daily-work' ? 'active' : ''}}'><a href="{{route('daily-work.index')}}">Daily Work</a></li>
                     @endif
                    <li class='{{$indexurl == 'seo-work' ? 'active' : ''}}{{$indexurl == 'import-data' ? 'active' : ''}}'><a href="{{route('seo-work.index')}}">Work Report</a></li>
                    <li class='{{$indexurl == 'seo-result' ? 'active' : ''}}'><a href="{{route('seo-result.index')}}">Monthly Result</a></li>
                    
                </ul>
            </div>
        </li>
       
        @if($role == "super_admin")
        <li class="sidebar-dropdown">
            <a href="javascript:void(0)">
                <div class="icon"><img src="{{asset('assets/images/svg/001-crm.png')}}" class="img-fluid d-block p-2"></div>
                CRM</a>
            <div class="sidebar-submenu {{ in_array($indexurl, array('leads', 'customer', 'lead-setting','quotation')) ? 'd-block' : ''}}">
                <ul>
                    <li class='{{$indexurl == 'leads' ? 'active' : ''}}'><a href="{{route('leads.index')}}">Lead</a></li>
                    <li class='{{$indexurl == 'lead-setting' ? 'active' : ''}}'><a href="{{route('lead-setting.index')}}">Lead Setting</a></li>
                    <li class='{{$indexurl == 'customer' ? 'active' : ''}}'><a href="{{route('customer.index')}}">Customer</a></li>
                    <li class='{{$indexurl == 'quotation' ? 'active' : ''}}'><a href="{{route('quotation.index')}}">Quotation</a></li>
                </ul>
            </div>
        </li>
        @endif
        @if($role == "super_admin")
         <li class="sidebar-dropdown">
            <a href="javascript:void(0)">
                <div class="icon"><img src="{{asset('assets/images/svg/setting.png')}}" class="img-fluid d-block p-2"></div>    
            Settings</a>
            <div class="sidebar-submenu">
                <ul>
                    <li><a href="#">General Setting</a></li>
                    
                    <li><a href="{{route('app-setting-group.index')}}">App Setting List</a></li>
                    <li><a href="{{route('app-settings.index')}}">App Setting </a></li>
                    <li><a href="{{route('custom-form.index')}}">Custom Form</a></li>
                    <li><a href="{{route('module-management.index')}}">Module</a></li>
                    <li><a href="{{route('email-group.index')}}">Email Templates</a></li>
                </ul>
            </div>
        </li>
        @endif
        @if($role == "super_admin")
        <li class="sidebar-dropdown">
            <a href="javascript:void(0)">
                <div class="icon"><img src="{{asset('assets/images/svg/newsletter.png')}}" class="img-fluid d-block p-2"></div>    
            Newsletter</a>
            <div class="sidebar-submenu {{ in_array($indexurl, array('contact-list','template-list','importfile','campaign','template-lists')) ? 'd-block' : ''}}">
                <ul>
                    <li><a href="{{route('sender-list.index')}}">Setting</a></li>
                    <li class='{{$indexurl == 'template-list' ? 'active' : ''}}{{$indexurl == 'template-lists' ? 'active' : ''}}'><a href="{{route('template-group-list.index')}}">Template</a></li>
                    <li class='{{$indexurl == 'contact-list' ? 'active' : ''}}{{$indexurl == 'importfile' ? 'active' : ''}}'><a href="{{route('contact-group-list.index')}}">Contacts</a></li>
                    <li class='{{$indexurl == 'campaign' ? 'active' : ''}}'><a href="{{route('campaign.index')}}">Campaign</a></li>
                </ul>
            </div>
        </li>
        @endif
    </ul>
    <!-- sidebar-menu  -->
</div>
{{-- contact-list --}}
<!-- Sidebar Footer -->
{{-- <ul class="sidebar-footer list-unstyled mb-0">
    <li class="list-inline-item mb-0">
        <a href="https://1.envato.market/landrick" target="_blank" class="btn btn-icon btn-soft-light"><i class="ti ti-shopping-cart"></i></a> <small class="text-muted fw-medium ms-1">Buy Now</small>
    </li>
</ul> --}}
<!-- Sidebar Footer -->
</nav>
<!-- sidebar-wraaper  -->
