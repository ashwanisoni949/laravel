<!-- Top Header -->
<div class="top-header">
    <div class="header-bar d-flex justify-content-between border-bottom">
        <div class="d-flex align-items-center">
            <a href="#" class="logo-icon me-3">
                <img src="{{asset('assets/images/workerman.png')}}" height="30" class="small" alt="">
                <span class="big">
                    <img src="{{asset('assets/images/workerman.png')}}" height="24" class="logo-light-mode" alt="">
                    <img src="{{asset('assets/images/workerman.png')}}" height="24" class="logo-dark-mode" alt="">
                </span>
            </a>
            <a id="close-sidebar" class="btn btn-icon btn-soft-light" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
            </a>
           
        </div>

        <ul class="list-unstyled mb-0">
           

            {{-- <li class="list-inline-item mb-0 ms-1">
                <div class="dropdown dropdown-primary">
                    <button type="button" class="btn btn-icon btn-soft-light dropdown-toggle p-0" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti ti-bell"></i></button>
                    <span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle">
                        <span class="visually-hidden">New alerts</span>
                    </span>
    
                    <div class="dropdown-menu dd-menu shadow rounded border-0 mt-3 p-0" data-simplebar style="height: 320px; width: 290px;">
                        <div class="d-flex align-items-center justify-content-between p-3 border-bottom">
                            <h6 class="mb-0 text-dark">Notifications</h6>
                            <span class="badge bg-soft-danger rounded-pill">3</span>
                        </div>
                        <div class="p-3">
                            <a href="#!" class="dropdown-item features feature-primary key-feature p-0">
                                <div class="d-flex align-items-center">
                                    <div class="icon text-center rounded-circle me-2">
                                        <i class="ti ti-shopping-cart"></i>
                                    </div>
                                    <div class="flex-1">
                                        <h6 class="mb-0 text-dark title">Order Complete</h6>
                                        <small class="text-muted">15 min ago</small>
                                    </div>
                                </div>
                            </a>
            
                            <a href="#!" class="dropdown-item features feature-primary key-feature p-0 mt-3">
                                <div class="d-flex align-items-center">
                                    <img src="{{asset('assets/images/client/04.jpg')}}" class="avatar avatar-md-sm rounded-circle border shadow me-2" alt="">
                                    <div class="flex-1">
                                        <h6 class="mb-0 text-dark title"><span class="fw-bold">Message</span> from Luis</h6>
                                        <small class="text-muted">1 hour ago</small>
                                    </div>
                                </div>
                            </a>
            
                            <a href="#!" class="dropdown-item features feature-primary key-feature p-0 mt-3">
                                <div class="d-flex align-items-center">
                                    <div class="icon text-center rounded-circle me-2">
                                        <i class="ti ti-currency-dollar"></i>
                                    </div>
                                    <div class="flex-1">
                                        <h6 class="mb-0 text-dark title"><span class="fw-bold">One Refund Request</span></h6>
                                        <small class="text-muted">2 hour ago</small>
                                    </div>
                                </div>
                            </a>

                            <a href="#!" class="dropdown-item features feature-primary key-feature p-0 mt-3">
                                <div class="d-flex align-items-center">
                                    <div class="icon text-center rounded-circle me-2">
                                        <i class="ti ti-truck-delivery"></i>
                                    </div>
                                    <div class="flex-1">
                                        <h6 class="mb-0 text-dark title">Deliverd your Order</h6>
                                        <small class="text-muted">Yesterday</small>
                                    </div>
                                </div>
                            </a>
            
                            <a href="#!" class="dropdown-item features feature-primary key-feature p-0 mt-3">
                                <div class="d-flex align-items-center">
                                    <img src="assets/images/client/15.jpg" class="avatar avatar-md-sm rounded-circle border shadow me-2" alt="">
                                    <div class="flex-1">
                                        <h6 class="mb-0 text-dark title"><span class="fw-bold">Cally</span> started following you</h6>
                                        <small class="text-muted">2 days ago</small>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </li> --}}
           
            <li class="list-inline-item mb-0 ms-1">
                <div class="dropdown dropdown-primary">
                    <button type="button" class="btn btn-soft-light dropdown-toggle p-0" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="uil uil-user-circle fs-4 mb-0 px-1"></i></button>
                    <div class="dropdown-menu dd-menu dropdown-menu-end shadow border-0 mt-3 py-3" style="min-width: 200px;">
                        <a class="dropdown-item d-flex align-items-center text-dark pb-3">
                            <i class="uil uil-user-circle fs-4 mb-0"></i>
                            <div class="flex-1 ms-2">
                                <span class="d-block">{{auth()->user()->name}}</span>
                                {{-- <small class="text-muted">UI / UX Designer</small> --}}
                            </div>
                        </a>
                        <a class="dropdown-item text-dark" href="{{route('dashboard')}}"><span class="mb-0 d-inline-block me-1"><i class="ti ti-home"></i></span> Dashboard</a>
                        <a class="dropdown-item text-dark" href="{{route('my-profile')}}"><span class="mb-0 d-inline-block me-1"><i class="ti ti-settings"></i></span> Profile</a>
                        <div class="dropdown-divider border-top"></div>
                                              
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button type="submit" class="dropdown-item text-dark">
                                <span class="mb-0 d-inline-block me-1"><i class="ti ti-logout"></i></span>{{ __('Log Out') }}
                            </button>
                        </form>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
<!-- Top Header -->