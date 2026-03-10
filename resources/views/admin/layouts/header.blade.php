<!-- BEGIN: Header-->
<nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow">
    <div class="navbar-container d-flex content">
        <div class="bookmark-wrapper d-flex align-items-center">
            <ul class="nav navbar-nav d-xl-none">
                <li class="nav-item">
                    <a class="nav-link menu-toggle" href="javascript:void(0);">
                        <i class="ficon" data-feather="menu"></i>
                    </a>
                </li>
            </ul>
            <ul class="nav navbar-nav bookmark-icons">
                <li class="nav-item d-none d-lg-block">
                    <a class="nav-link" href="{{ url('/admin/email') }}" data-toggle="tooltip" data-placement="top" title="Email">
                        <i class="ficon" data-feather="mail"></i>
                    </a>
                </li>
                <li class="nav-item d-none d-lg-block">
                    <a class="nav-link" href="{{ url('/admin/chat') }}" data-toggle="tooltip" data-placement="top" title="Chat">
                        <i class="ficon" data-feather="message-square"></i>
                    </a>
                </li>
                <li class="nav-item d-none d-lg-block">
                    <a class="nav-link" href="{{ url('/admin/calendar') }}" data-toggle="tooltip" data-placement="top" title="Calendar">
                        <i class="ficon" data-feather="calendar"></i>
                    </a>
                </li>
                <li class="nav-item d-none d-lg-block">
                    <a class="nav-link" href="{{ url('/admin/todo') }}" data-toggle="tooltip" data-placement="top" title="Todo">
                        <i class="ficon" data-feather="check-square"></i>
                    </a>
                </li>
            </ul>
            <ul class="nav navbar-nav">
                <li class="nav-item d-none d-lg-block">
                    <a class="nav-link bookmark-star">
                        <i class="ficon text-warning" data-feather="star"></i>
                    </a>
                    <div class="bookmark-input search-input">
                        <div class="bookmark-input-icon">
                            <i data-feather="search"></i>
                        </div>
                        <input class="form-control input" type="text" placeholder="Search..." tabindex="0" data-search="search">
                        <ul class="search-list search-list-bookmark"></ul>
                    </div>
                </li>
            </ul>
        </div>
        
        <ul class="nav navbar-nav align-items-center ml-auto">
            <!-- Language Dropdown -->
            <li class="nav-item dropdown dropdown-language">
                <a class="nav-link dropdown-toggle" id="dropdown-flag" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="flag-icon flag-icon-us"></i>
                    <span class="selected-language">English</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-flag">
                    <a class="dropdown-item" href="javascript:void(0);" data-language="en">
                        <i class="flag-icon flag-icon-us"></i> English
                    </a>
                    <a class="dropdown-item" href="javascript:void(0);" data-language="fr">
                        <i class="flag-icon flag-icon-fr"></i> French
                    </a>
                    <a class="dropdown-item" href="javascript:void(0);" data-language="de">
                        <i class="flag-icon flag-icon-de"></i> German
                    </a>
                    <a class="dropdown-item" href="javascript:void(0);" data-language="pt">
                        <i class="flag-icon flag-icon-pt"></i> Portuguese
                    </a>
                </div>
            </li>
            
            <!-- Dark/Light Mode Toggle -->
            <li class="nav-item d-none d-lg-block">
                <a class="nav-link nav-link-style">
                    <i class="ficon" data-feather="moon"></i>
                </a>
            </li>
            
            <!-- Search -->
            <li class="nav-item nav-search">
                <a class="nav-link nav-link-search">
                    <i class="ficon" data-feather="search"></i>
                </a>
                <div class="search-input">
                    <div class="search-input-icon">
                        <i data-feather="search"></i>
                    </div>
                    <input class="form-control input" type="text" placeholder="Search..." tabindex="-1" data-search="search">
                    <div class="search-input-close">
                        <i data-feather="x"></i>
                    </div>
                    <ul class="search-list search-list-main"></ul>
                </div>
            </li>
            
            <!-- Cart Dropdown -->
            <li class="nav-item dropdown dropdown-cart mr-25">
                <a class="nav-link" href="javascript:void(0);" data-toggle="dropdown">
                    <i class="ficon" data-feather="shopping-cart"></i>
                    <span class="badge badge-pill badge-primary badge-up cart-item-count">0</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                    <li class="dropdown-menu-header">
                        <div class="dropdown-header d-flex">
                            <h4 class="notification-title mb-0 mr-auto">My Cart</h4>
                            <div class="badge badge-pill badge-light-primary cart-item-count">0 Items</div>
                        </div>
                    </li>
                    <li class="scrollable-container media-list" id="cart-items-list">
                        <div class="text-center p-3">Your cart is empty</div>
                    </li>
                    <li class="dropdown-menu-footer">
                        <div class="d-flex justify-content-between mb-1">
                            <h6 class="font-weight-bolder mb-0">Total:</h6>
                            <h6 class="text-primary font-weight-bolder mb-0 cart-total">$0.00</h6>
                        </div>
                        <a class="btn btn-primary btn-block" href="{{ url('/admin/checkout') }}">Checkout</a>
                    </li>
                </ul>
            </li>
            
            <!-- Notifications Dropdown -->
            <li class="nav-item dropdown dropdown-notification mr-25">
                <a class="nav-link" href="javascript:void(0);" data-toggle="dropdown">
                    <i class="ficon" data-feather="bell"></i>
                    <span class="badge badge-pill badge-danger badge-up notification-count">{{ $notificationCount ?? 0 }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                    <li class="dropdown-menu-header">
                        <div class="dropdown-header d-flex">
                            <h4 class="notification-title mb-0 mr-auto">Notifications</h4>
                            <div class="badge badge-pill badge-light-primary">{{ $newNotifications ?? 0 }} New</div>
                        </div>
                    </li>
                    <li class="scrollable-container media-list" id="notification-list">
                        @forelse($notifications ?? [] as $notification)
                        <a class="d-flex" href="{{ $notification->url ?? 'javascript:void(0);' }}">
                            <div class="media d-flex align-items-start">
                                <div class="media-left">
                                    <div class="avatar">
                                        <img src="{{ $notification->avatar ?? '../../../app-assets/images/portrait/small/avatar-s-15.jpg' }}" alt="avatar" width="32" height="32">
                                    </div>
                                </div>
                                <div class="media-body">
                                    <p class="media-heading">
                                        <span class="font-weight-bolder">{{ $notification->title ?? 'Notification' }}</span>
                                    </p>
                                    <small class="notification-text">{{ $notification->message ?? '' }}</small>
                                </div>
                            </div>
                        </a>
                        @empty
                        <div class="text-center p-3">No new notifications</div>
                        @endforelse
                    </li>
                    <li class="dropdown-menu-footer">
                        <a class="btn btn-primary btn-block" href="{{ url('/admin/notifications') }}">Read all notifications</a>
                    </li>
                </ul>
            </li>
            
            <!-- User Dropdown -->
            <li class="nav-item dropdown dropdown-user">
                <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="user-nav d-sm-flex d-none">
                        <span class="user-name font-weight-bolder">{{ session('admin_name') ?? 'John Doe' }}</span>
                        <span class="user-status">Admin</span>
                    </div>
                    <span class="avatar">
                        <img class="round" src="{{ session('admin_avatar') ?? '../../../app-assets/images/portrait/small/avatar-s-11.jpg' }}" alt="avatar" height="40" width="40">
                        <span class="avatar-status-online"></span>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user">
                    <a class="dropdown-item" href="{{ url('/admin/profile') }}">
                        <i class="mr-50" data-feather="user"></i> Profile
                    </a>
                    <a class="dropdown-item" href="{{ url('/admin/email') }}">
                        <i class="mr-50" data-feather="mail"></i> Inbox
                    </a>
                    <a class="dropdown-item" href="{{ url('/admin/todo') }}">
                        <i class="mr-50" data-feather="check-square"></i> Task
                    </a>
                    <a class="dropdown-item" href="{{ url('/admin/chat') }}">
                        <i class="mr-50" data-feather="message-square"></i> Chats
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ url('/admin/settings') }}">
                        <i class="mr-50" data-feather="settings"></i> Settings
                    </a>
                    <a class="dropdown-item" href="{{ url('/admin/pricing') }}">
                        <i class="mr-50" data-feather="credit-card"></i> Pricing
                    </a>
                    <a class="dropdown-item" href="{{ url('/admin/faq') }}">
                        <i class="mr-50" data-feather="help-circle"></i> FAQ
                    </a>
                    <a class="dropdown-item" href="{{ route('admin.logout') }}" 
                       onclick="event.preventDefault(); 
                                if(confirm('Are you sure you want to logout?')) {
                                    document.getElementById('logout-form').submit();
                                }">
                        <i class="mr-50" data-feather="power"></i> Logout
                    </a>
                </div>
            </li>
        </ul>
    </div>
</nav>

<!-- Hidden Logout Form -->
<form id="logout-form" action="{{ route('admin.logout') }}" method="GET" style="display: none;"></form>

<!-- Search Lists -->
<ul class="main-search-list-defaultlist d-none">
    <li class="d-flex align-items-center">
        <a href="javascript:void(0);">
            <h6 class="section-label mt-75 mb-0">Files</h6>
        </a>
    </li>
    <li class="auto-suggestion">
        <a class="d-flex align-items-center justify-content-between w-100" href="{{ url('/admin/file-manager') }}">
            <div class="d-flex">
                <div class="mr-75">
                    <img src="../../../app-assets/images/icons/xls.png" alt="xls" height="32">
                </div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Two new item submitted</p>
                    <small class="text-muted">Marketing Manager</small>
                </div>
            </div>
            <small class="search-data-size mr-50 text-muted">17kb</small>
        </a>
    </li>
    <li class="auto-suggestion">
        <a class="d-flex align-items-center justify-content-between w-100" href="{{ url('/admin/file-manager') }}">
            <div class="d-flex">
                <div class="mr-75">
                    <img src="../../../app-assets/images/icons/jpg.png" alt="jpg" height="32">
                </div>
                <div class="search-data">
                    <p class="search-data-title mb-0">52 JPG file Generated</p>
                    <small class="text-muted">FontEnd Developer</small>
                </div>
            </div>
            <small class="search-data-size mr-50 text-muted">11kb</small>
        </a>
    </li>
    <li class="auto-suggestion">
        <a class="d-flex align-items-center justify-content-between w-100" href="{{ url('/admin/file-manager') }}">
            <div class="d-flex">
                <div class="mr-75">
                    <img src="../../../app-assets/images/icons/pdf.png" alt="pdf" height="32">
                </div>
                <div class="search-data">
                    <p class="search-data-title mb-0">25 PDF File Uploaded</p>
                    <small class="text-muted">Digital Marketing Manager</small>
                </div>
            </div>
            <small class="search-data-size mr-50 text-muted">150kb</small>
        </a>
    </li>
    <li class="auto-suggestion">
        <a class="d-flex align-items-center justify-content-between w-100" href="{{ url('/admin/file-manager') }}">
            <div class="d-flex">
                <div class="mr-75">
                    <img src="../../../app-assets/images/icons/doc.png" alt="doc" height="32">
                </div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Anna_Strong.doc</p>
                    <small class="text-muted">Web Designer</small>
                </div>
            </div>
            <small class="search-data-size mr-50 text-muted">256kb</small>
        </a>
    </li>
    <li class="d-flex align-items-center">
        <a href="javascript:void(0);">
            <h6 class="section-label mt-75 mb-0">Members</h6>
        </a>
    </li>
    <li class="auto-suggestion">
        <a class="d-flex align-items-center justify-content-between py-50 w-100" href="{{ url('/admin/user/view/1') }}">
            <div class="d-flex align-items-center">
                <div class="avatar mr-75">
                    <img src="../../../app-assets/images/portrait/small/avatar-s-8.jpg" alt="avatar" height="32">
                </div>
                <div class="search-data">
                    <p class="search-data-title mb-0">John Doe</p>
                    <small class="text-muted">UI designer</small>
                </div>
            </div>
        </a>
    </li>
    <li class="auto-suggestion">
        <a class="d-flex align-items-center justify-content-between py-50 w-100" href="{{ url('/admin/user/view/2') }}">
            <div class="d-flex align-items-center">
                <div class="avatar mr-75">
                    <img src="../../../app-assets/images/portrait/small/avatar-s-1.jpg" alt="avatar" height="32">
                </div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Michal Clark</p>
                    <small class="text-muted">FontEnd Developer</small>
                </div>
            </div>
        </a>
    </li>
    <li class="auto-suggestion">
        <a class="d-flex align-items-center justify-content-between py-50 w-100" href="{{ url('/admin/user/view/3') }}">
            <div class="d-flex align-items-center">
                <div class="avatar mr-75">
                    <img src="../../../app-assets/images/portrait/small/avatar-s-14.jpg" alt="avatar" height="32">
                </div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Milena Gibson</p>
                    <small class="text-muted">Digital Marketing Manager</small>
                </div>
            </div>
        </a>
    </li>
    <li class="auto-suggestion">
        <a class="d-flex align-items-center justify-content-between py-50 w-100" href="{{ url('/admin/user/view/4') }}">
            <div class="d-flex align-items-center">
                <div class="avatar mr-75">
                    <img src="../../../app-assets/images/portrait/small/avatar-s-6.jpg" alt="avatar" height="32">
                </div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Anna Strong</p>
                    <small class="text-muted">Web Designer</small>
                </div>
            </div>
        </a>
    </li>
</ul>

<ul class="main-search-list-defaultlist-other-list d-none">
    <li class="auto-suggestion justify-content-between">
        <a class="d-flex align-items-center justify-content-between w-100 py-50">
            <div class="d-flex justify-content-start">
                <span class="mr-75" data-feather="alert-circle"></span>
                <span>No results found.</span>
            </div>
        </a>
    </li>
</ul>
<!-- END: Header-->