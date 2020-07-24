
<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="index.html" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ asset('public/backend/default/logo_trasparent.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('public/backend/default/logo_trasparent.png') }}" alt="" height="60">
                    </span>
                </a>

                <a href="index.html" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset('public/backend/default/logo_trasparent.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('public/backend/default/logo_trasparent.png') }}" alt="" height="60">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 d-lg-none header-item waves-effect waves-light"
            data-toggle="collapse" data-target="#topnav-menu-content">
            <i class="fa fa-fw fa-bars"></i>
        </button>
    </div>

                    <!-- Search input -->
                    {{-- <div class="search-wrap" id="search-wrap">
                        <div class="search-bar">
                            <input class="search-input form-control" placeholder="Search" />
                            <a href="#" class="close-search toggle-search" data-target="#search-wrap">
                                <i class="mdi mdi-close-circle"></i>
                            </a>
                        </div>
                    </div> --}}

                    <div class="d-flex">

                        {{-- <div class="dropdown d-none d-lg-inline-block">
                            <button type="button" class="btn header-item toggle-search noti-icon waves-effect"
                                data-target="#search-wrap">
                                <i class="mdi mdi-magnify"></i>
                            </button>
                        </div> --}}

                        <div class="dropdown d-none d-md-block">
                            
                        @if(\Session::has('locale'))
                            @if(Session::get('locale') == 'ar')
                                <button type="button" class="btn header-item waves-effect" data-toggle="dropdown" aria-haspopup="true"  aria-expanded="false"> <img class="mr-2" src="{{ asset('public/backend/assets/images/flags/spain.jpg') }}" alt="Header Language" height="16"> Arebic <span  class="mdi mdi-chevron-down"> </span></button>
                            @else
                                <button type="button" class="btn header-item waves-effect" data-toggle="dropdown" aria-haspopup="true"  aria-expanded="false"> <img class="mr-2" src="{{ asset('public/backend/assets/images/flags/us.jpg') }}" alt="Header Language" height="16"> English <span  class="mdi mdi-chevron-down"> </span></button>
                            @endif
                        @else
                            <button type="button" class="btn header-item waves-effect" data-toggle="dropdown" aria-haspopup="true"  aria-expanded="false"> <img class="mr-2" src="{{ asset('public/backend/assets/images/flags/us.jpg') }}" alt="Header Language" height="16"> English <span  class="mdi mdi-chevron-down"> </span></button>
                                
                        @endif
                        <div class="dropdown-menu dropdown-menu-right">
                            
                            <!-- item-->
                            <a href="{{ url('locale/en') }}" class="dropdown-item notify-item">
                                <img src="{{ asset('public/backend/assets/images/flags/us.jpg') }}" alt="user-image" class="mr-1" height="12"> <span
                                class="align-middle float-right"> English </span>
                            </a>

                            <!-- item-->
                            <a href="{{ url('locale/ar') }}" class="dropdown-item notify-item">
                                <img src="{{ asset('public/backend/assets/images/flags/spain.jpg') }}" alt="user-image" class="mr-1" height="12"> <span
                                class="align-middle float-right"> Arebic </span>
                            </a>

                        </div>
                    </div>

                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item noti-icon waves-effect"
                        id="page-header-notifications-dropdown" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="mdi mdi-bell-outline"></i>
                        <span class="badge badge-danger badge-pill">2</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                    aria-labelledby="page-header-notifications-dropdown">
                    <div class="p-3">
                        <h6 class="m-0">Notifications (258) </h6>
                    </div>

                    <div data-simplebar style="max-height: 230px;">
                        <a href="" class="text-reset notification-item">
                            <div class="media">
                                <div class="avatar-xs mr-3">
                                    <span class="avatar-title bg-primary rounded-circle font-size-16">
                                        <i class="mdi mdi-cart-outline"></i>
                                    </span>
                                </div>
                                <div class="media-body">
                                    <h6 class="mt-0 mb-1 font-size-15">Your order is placed</h6>
                                    <div class="text-muted">
                                        <p class="mb-1 font-size-12">Dummy text of the printing and typesetting
                                        industry.</p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="" class="text-reset notification-item">
                            <div class="media">
                                <div class="avatar-xs mr-3">
                                    <span class="avatar-title bg-warning rounded-circle font-size-16">
                                        <i class="mdi mdi-message"></i>
                                    </span>
                                </div>
                                <div class="media-body">
                                    <h6 class="mt-0 mb-1 font-size-15">New Message received</h6>
                                    <div class="text-muted">
                                        <p class="mb-1 font-size-12">You have 87 unread messages</p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="" class="text-reset notification-item">
                            <div class="media">
                                <div class="avatar-xs mr-3">
                                    <span class="avatar-title bg-info rounded-circle font-size-16">
                                        <i class="mdi mdi-martini"></i>
                                    </span>
                                </div>
                                <div class="media-body">
                                    <h6 class="mt-0 mb-1 font-size-15">Your order is placed</h6>
                                    <div class="text-muted">
                                        <p class="mb-1 font-size-12">It is a long established fact that a reader will
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="" class="text-reset notification-item">
                            <div class="media">
                                <div class="avatar-xs mr-3">
                                    <span class="avatar-title bg-primary rounded-circle font-size-16">
                                        <i class="mdi mdi-cart-outline"></i>
                                    </span>
                                </div>
                                <div class="media-body">
                                    <h6 class="mt-0 mb-1 font-size-15">Your order is placed</h6>
                                    <div class="text-muted">
                                        <p class="mb-1 font-size-12">Dummy text of the printing and typesetting
                                        industry.</p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="" class="text-reset notification-item">
                            <div class="media">
                                <div class="avatar-xs mr-3">
                                    <span class="avatar-title bg-danger rounded-circle font-size-16">
                                        <i class="mdi mdi-cart-outline"></i>
                                    </span>
                                </div>
                                <div class="media-body">
                                    <h6 class="mt-0 mb-1 font-size-15">Your order is placed</h6>
                                    <div class="text-muted">
                                        <p class="mb-1 font-size-12">Dummy text of the printing and typesetting
                                        industry.</p>
                                    </div>
                                </div>
                            </div>
                        </a>

                    </div>
                    <div class="p-2 border-top">
                        <a class="btn btn-sm btn-link font-size-14 btn-block text-center" href="javascript:void(0)">
                            <i class="mdi mdi-arrow-right-circle mr-1"></i> View all
                        </a>
                    </div>
                </div>
            </div>

            <div class="dropdown d-none d-lg-inline-block ml-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                    <i class="mdi mdi-fullscreen"></i>
                </button>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="rounded-circle header-profile-user" src="{{ asset('public/backend/assets/images/users/user-1.jpg') }}"
                alt="Header Avatar">
                <span class="d-none d-xl-inline-block ml-1">Amelia</span>
                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-right">
                <!-- item-->
                <?php 
                    $encryptid = Crypt::encryptString(Auth::user()->id);
                    $editurl = route('admin.user.editprofile', $encryptid); 
                ?>
                <a class="dropdown-item" href="{{ $editurl }}"><i class="dripicons-user d-inline-block text-muted mr-2"></i> Profile</a>
                {{-- <a class="dropdown-item" href="#"><i class="dripicons-wallet d-inline-block text-muted mr-2"></i> My Wallet</a> --}}
                <a class="dropdown-item d-block" href="{{ route('admin.setting') }}"><i class="dripicons-gear d-inline-block text-muted mr-2"></i>
                Settings</a>
                {{-- <a class="dropdown-item" href="#"><i class="dripicons-lock d-inline-block text-muted mr-2"></i> Lock screen</a> --}}
                <div class="dropdown-divider"></div>

                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="dripicons-exit d-inline-block text-muted mr-2"></i> {{ __('messages.signout') }}</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>
            </div>
        </div>
    </div>
</div>
</header>