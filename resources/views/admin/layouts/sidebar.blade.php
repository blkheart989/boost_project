<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true" style="background: linear-gradient(180deg, #1e293b 0%, #0f172a 100%); border-right: 1px solid rgba(255,255,255,0.05);">
    
    <!-- Navbar Header (unchanged structure) -->
    <div class="navbar-header" style="background: rgba(255,255,255,0.03); border-bottom: 1px solid rgba(255,255,255,0.05);">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto">
                <a class="navbar-brand" href="{{url('admins')}}">
                    <span class="brand-logo">
                        <svg viewbox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="24">
                            <defs>
                                <lineargradient id="linearGradient-1" x1="100%" y1="10.5120544%" x2="50%" y2="89.4879456%">
                                    <stop stop-color="#000000" offset="0%"></stop>
                                    <stop stop-color="#FFFFFF" offset="100%"></stop>
                                </lineargradient>
                                <lineargradient id="linearGradient-2" x1="64.0437835%" y1="46.3276743%" x2="37.373316%" y2="100%">
                                    <stop stop-color="#EEEEEE" stop-opacity="0" offset="0%"></stop>
                                    <stop stop-color="#FFFFFF" offset="100%"></stop>
                                </lineargradient>
                            </defs>
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="Artboard" transform="translate(-400.000000, -178.000000)">
                                    <g id="Group" transform="translate(400.000000, 178.000000)">
                                        <path class="text-primary" id="Path" d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z" style="fill:currentColor; fill:#ff9f00;"></path>
                                        <path id="Path1" d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z" fill="url(#linearGradient-1)" opacity="0.2"></path>
                                        <polygon id="Path-2" fill="#000000" opacity="0.049999997" points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325"></polygon>
                                        <polygon id="Path-21" fill="#000000" opacity="0.099999994" points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338"></polygon>
                                        <polygon id="Path-3" fill="url(#linearGradient-2)" opacity="0.099999994" points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288"></polygon>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </span>
                    <h2 class="brand-text" style="color: white;">SolarPanel</h2>
                </a>
            </li>
            <li class="nav-item nav-toggle">
                <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
                    <i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x" style="color: #ff9f00;"></i>
                    <i class="d-none d-xl-block collapse-toggle-icon font-medium-4 text-primary" data-feather="disc" data-ticon="disc" style="color: #ff9f00;"></i>
                </a>
            </li>
        </ul>
    </div>
    
    <!-- Shadow Bottom (keep original) -->
    <div class="shadow-bottom"></div>
    
    <!-- Main Menu Content -->
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            
            <!-- Admin Panel - Keep original structure, just add icon color -->
            <li class="nav-item">
                <a class="d-flex align-items-center" href="{{url('admins')}}">
                    <i data-feather="home" style="color: #ff9f00;"></i>
                    <span class="menu-title text-truncate" data-i18n="Dashboards">ADMIN PANEL</span>
                    <span class="badge badge-light-warning badge-pill ml-auto mr-1">New</span>
                </a>
            </li>
            
            <!-- Apps & Pages Header -->
            <li class="navigation-header">
                <span data-i18n="Apps &amp; Pages">Apps &amp; Pages</span>
                <i data-feather="more-horizontal"></i>
            </li>
            
            <!-- Testimonial -->
            <li class="nav-item">
                <a class="d-flex align-items-center" href="{{url('admin/testimonials/show')}}">
                    <i data-feather="star" style="color: #ff9f00;"></i>
                    <span class="menu-title text-truncate" data-i18n="Email">Testimonial</span>
                </a>
            </li>
            
            <!-- Payment Verification List -->
            <li class="nav-item">
                <a class="d-flex align-items-center" href="{{url('admin/payment_verification/show_payment')}}">
                    <i data-feather="credit-card" style="color: #ff9f00;"></i>
                    <span class="menu-title text-truncate" data-i18n="Todo">Payment Verification List</span>
                </a>
            </li>
            
            <!-- Withdrawals Requests -->
            <li class="nav-item">
                <a class="d-flex align-items-center" href="{{url('admin/withdrawals')}}">
                    <i data-feather="calendar" style="color: #ff9f00;"></i>
                    <span class="menu-title text-truncate" data-i18n="Calendar">Withdrawals Requests</span>
                </a>
            </li>
            
            <!-- Blog List -->
            <li class="nav-item">
                <a class="d-flex align-items-center" href="{{url('admin/blogs/show_blogs')}}">
                    <i data-feather="grid" style="color: #ff9f00;"></i>
                    <span class="menu-title text-truncate" data-i18n="Kanban">Blog List</span>
                </a>
            </li>
            
            <!-- Invoice Dropdown (keep original structure) -->
            <li class="nav-item has-sub">
                <a class="d-flex align-items-center" href="#">
                    <i data-feather="file-text" style="color: #ff9f00;"></i>
                    <span class="menu-title text-truncate" data-i18n="Invoice">Invoice</span>
                </a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="app-invoice-list.html"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">List</span></a></li>
                    <li><a class="d-flex align-items-center" href="app-invoice-preview.html"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Preview">Preview</span></a></li>
                    <li><a class="d-flex align-items-center" href="app-invoice-edit.html"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Edit">Edit</span></a></li>
                    <li><a class="d-flex align-items-center" href="app-invoice-add.html"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Add">Add</span></a></li>
                </ul>
            </li>
            
            <!-- File Manager -->
            <li class="nav-item">
                <a class="d-flex align-items-center" href="app-file-manager.html">
                    <i data-feather="save" style="color: #ff9f00;"></i>
                    <span class="menu-title text-truncate" data-i18n="File Manager">File Manager</span>
                </a>
            </li>
            
            <!-- eCommerce Dropdown -->
            <li class="nav-item has-sub">
                <a class="d-flex align-items-center" href="#">
                    <i data-feather="shopping-cart" style="color: #ff9f00;"></i>
                    <span class="menu-title text-truncate" data-i18n="eCommerce">eCommerce</span>
                </a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="app-ecommerce-shop.html"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Shop">Shop</span></a></li>
                    <li><a class="d-flex align-items-center" href="app-ecommerce-details.html"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Details">Details</span></a></li>
                    <li><a class="d-flex align-items-center" href="app-ecommerce-wishlist.html"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Wish List">Wish List</span></a></li>
                    <li><a class="d-flex align-items-center" href="app-ecommerce-checkout.html"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Checkout">Checkout</span></a></li>
                </ul>
            </li>
            
            <!-- User Dropdown -->
            <li class="nav-item has-sub">
                <a class="d-flex align-items-center" href="#">
                    <i data-feather="user" style="color: #ff9f00;"></i>
                    <span class="menu-title text-truncate" data-i18n="User">User</span>
                </a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="app-user-list.html"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">List</span></a></li>
                    <li><a class="d-flex align-items-center" href="app-user-view.html"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="View">View</span></a></li>
                    <li><a class="d-flex align-items-center" href="app-user-edit.html"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Edit">Edit</span></a></li>
                </ul>
            </li>
            
            <!-- Pages Dropdown -->
            <li class="nav-item has-sub">
                <a class="d-flex align-items-center" href="#">
                    <i data-feather="file-text" style="color: #ff9f00;"></i>
                    <span class="menu-title text-truncate" data-i18n="Pages">Pages</span>
                </a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="page-auth-login-v2.html"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Login">Login</span></a></li>
                    <li><a class="d-flex align-items-center" href="page-auth-register-v2.html"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Register">Register</span></a></li>
                    <li><a class="d-flex align-items-center" href="page-profile.html"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Profile">Profile</span></a></li>
                    <li><a class="d-flex align-items-center" href="page-faq.html"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="FAQ">FAQ</span></a></li>
                </ul>
            </li>
            
            <!-- User Interface Header -->
            <li class="navigation-header">
                <span data-i18n="User Interface">User Interface</span>
                <i data-feather="more-horizontal"></i>
            </li>
            
            <!-- UI Elements -->
            <li class="nav-item"><a class="d-flex align-items-center" href="ui-typography.html"><i data-feather="type" style="color: #ff9f00;"></i><span class="menu-title text-truncate" data-i18n="Typography">Typography</span></a></li>
            <li class="nav-item"><a class="d-flex align-items-center" href="ui-colors.html"><i data-feather="droplet" style="color: #ff9f00;"></i><span class="menu-title text-truncate" data-i18n="Colors">Colors</span></a></li>
            <li class="nav-item"><a class="d-flex align-items-center" href="ui-feather.html"><i data-feather="eye" style="color: #ff9f00;"></i><span class="menu-title text-truncate" data-i18n="Feather">Feather</span></a></li>
            
            <!-- Forms & Tables Header -->
            <li class="navigation-header">
                <span data-i18n="Forms &amp; Tables">Forms &amp; Tables</span>
                <i data-feather="more-horizontal"></i>
            </li>
            
            <!-- Form Elements -->
            <li class="nav-item has-sub">
                <a class="d-flex align-items-center" href="#">
                    <i data-feather="copy" style="color: #ff9f00;"></i>
                    <span class="menu-title text-truncate" data-i18n="Form Elements">Form Elements</span>
                </a>
                <ul class="menu-content">
                    <li><a href="form-input.html"><i data-feather="circle"></i><span>Input</span></a></li>
                    <li><a href="form-input-groups.html"><i data-feather="circle"></i><span>Input Groups</span></a></li>
                    <li><a href="form-checkbox.html"><i data-feather="circle"></i><span>Checkbox</span></a></li>
                </ul>
            </li>
            
            <!-- Charts Header -->
            <li class="navigation-header">
                <span data-i18n="Charts &amp; Maps">Charts &amp; Maps</span>
                <i data-feather="more-horizontal"></i>
            </li>
            
            <!-- Charts -->
            <li class="nav-item">
                <a class="d-flex align-items-center" href="chart-apex.html">
                    <i data-feather="pie-chart" style="color: #ff9f00;"></i>
                    <span class="menu-title text-truncate" data-i18n="Charts">Charts</span>
                    <span class="badge badge-light-danger badge-pill ml-auto mr-2">2</span>
                </a>
            </li>
            
            <!-- Documentation & Support -->
            <li class="nav-item"><a class="d-flex align-items-center" href="https://pixinvent.com/demo/vuexy-html-bootstrap-admin-template/documentation" target="_blank"><i data-feather="folder" style="color: #ff9f00;"></i><span class="menu-title text-truncate" data-i18n="Documentation">Documentation</span></a></li>
            <li class="nav-item"><a class="d-flex align-items-center" href="https://pixinvent.ticksy.com/" target="_blank"><i data-feather="life-buoy" style="color: #ff9f00;"></i><span class="menu-title text-truncate" data-i18n="Raise Support">Raise Support</span></a></li>
        </ul>
    </div>
</div>
<!-- END: Main Menu-->

<style>
/* Enhanced hover effects - ONLY visual changes, no layout breaking */
.main-menu {
    transition: background 0.3s ease;
}

.main-menu .nav-item > a:hover {
    background: rgba(255,159,0,0.1) !important;
    color: #ff9f00 !important;
}

.main-menu .nav-item > a:hover i {
    color: #ff9f00 !important;
}

.main-menu .nav-item.active > a {
    background: linear-gradient(90deg, rgba(255,159,0,0.15) 0%, rgba(255,159,0,0.05) 100%) !important;
    border-left: 3px solid #ff9f00 !important;
    color: #ff9f00 !important;
}

.main-menu .nav-item.active > a i {
    color: #ff9f00 !important;
}

/* Submenu hover effects */
.menu-content li a:hover {
    background: rgba(255,159,0,0.1) !important;
    color: #ff9f00 !important;
    padding-left: 28px !important;
}

/* Keep all original Vuexy responsive behavior */
@media (max-width: 1199.98px) {
    .main-menu {
        transform: translateX(-100%);
        transition: transform 0.3s ease;
    }
    
    .main-menu.menu-open {
        transform: translateX(0);
    }
}

/* Custom scrollbar - only visual */
.main-menu-content::-webkit-scrollbar {
    width: 4px;
}

.main-menu-content::-webkit-scrollbar-track {
    background: #1e293b;
}

.main-menu-content::-webkit-scrollbar-thumb {
    background: #ff9f00;
    border-radius: 4px;
}

.main-menu-content::-webkit-scrollbar-thumb:hover {
    background: #ff6b00;
}
</style>