<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="../../assets/" data-template="vertical-menu-template">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>DYFZNNN | {{ $title }}</title>
    <meta name="description" content="" />
    <link rel="icon" type="image/x-icon" href="../../assets/img/D.png" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="../../assets/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="../../assets/vendor/fonts/tabler-icons.css" />
    <link rel="stylesheet" href="../../assets/vendor/fonts/flag-icons.css" />
    <link rel="stylesheet" href="../../assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../../assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../../assets/css/demo.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/sweetalert2/sweetalert2.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/select2/select2.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/bootstrap-select/bootstrap-select.css" />
    <script src="../../assets/vendor/js/helpers.js"></script>
    <script src="../../assets/vendor/js/template-customizer.js"></script>
    <script src="../../assets/js/config.js"></script>
</head>
<style>
/* CSS untuk light mode */
.nav-link.active,
.nav-link:active {
    background-color: #333;
}
</style>

<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="{{ route('dashboard') }}" class="app-brand-link">
                        <img class="app-brand-logo ms-2" id="logo1" src="../../assets/img/D2.png"
                            data-app-dark-img="../../assets/img/D.png" style="width: 23px;" />
                        <span class="app-brand-text menu-text">
                            <img id="logo2" src="../../assets/img/yfzn2.png"
                                data-app-dark-img="../../assets/img/yfzn.png" class="app-brand-logo"
                                style="width: 80px;" />
                        </span>
                    </a>
                    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
                        <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
                        <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
                    </a>
                </div>
                <div class="menu-inner-shadow"></div>
                <ul class="menu-inner py-1">
                    <li class="menu-item @if($activeMenu === 'dashboard') active @endif">
                        <a href="{{ route('dashboard') }}" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-smart-home"></i>
                            <div data-i18n="Dashboards">Dashboards</div>
                        </a>
                    </li>
                    <li class="menu-item @if($activeMenu === 'exceltodb') active @endif">
                        <a href="{{ route('exceltodb') }}" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-database-import"></i>
                            <div data-i18n="Excel to Database">Excel to Database</div>
                        </a>
                    </li>
                    <li class="menu-item @if($activeMenu === 'transaction') active @endif">
                        <a href="{{ route('transaction') }}" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-3d-rotate"></i>
                            <div data-i18n="Transaction">Transaction</div>
                        </a>
                    </li>
                    <li class="menu-item @if($activeMenu === 'indexing') active @endif">
                        <a href="{{ route('indexing') }}" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-list-details"></i>
                            <div data-i18n="Indexing Data">Indexing Data</div>
                        </a>
                    </li>
                    @if (auth()->user()->role->name == 'admin')
                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">Admin Menu</span>
                    </li>

                    <li class="menu-item @if($activeMenu === 'user' OR $activeMenu === 'role') active open @endif">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons ti ti-settings"></i>
                            <div data-i18n="Setting">Setting</div>
                        </a>

                        <ul class="menu-sub">
                            <li class="menu-item @if($activeMenu === 'user') active @endif">
                                <a href="{{ route('user') }}" class="menu-link">
                                    <div data-i18n="Users">Users</div>
                                </a>
                            </li>
                            <li class="menu-item @if($activeMenu === 'role') active @endif">
                                <a href="{{ route('role') }}" class="menu-link">
                                    <div data-i18n="Roles">Roles</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endif
                </ul>
            </aside>
            <div class="layout-page">
                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                    id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="ti ti-menu-2 ti-sm"></i>
                        </a>
                    </div>
                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            <li class="nav-item me-2 me-xl-0">
                                <a class="nav-link style-switcher-toggle">
                                    <i class="ti ti-md"></i>
                                </a>
                            </li>
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                    data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        <img src="../../assets/img/deran.jpg" alt class="h-auto rounded-circle" />
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="pages-account-settings-account.html">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        <img src="../../assets/img/deran.jpg" alt
                                                            class="h-auto rounded-circle" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <span class="fw-semibold d-block">{{ Auth::user()->name }}</span>
                                                    <small
                                                        class="text-muted">{{ ucfirst(Auth::user()->role->name) }}</small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item btn-label-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" target="_blank">
                                            <i class="ti ti-logout me-2 ti-sm"></i>
                                            <span class="align-middle">Log Out</span>
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="navbar-search-wrapper search-input-wrapper d-none">
                        <input type="text" class="form-control search-input container-xxl border-0"
                            placeholder="Search..." aria-label="Search..." />
                        <i class="ti ti-x ti-sm search-toggler cursor-pointer"></i>
                    </div>
                </nav>
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <main class="main">
                            @yield('content')
                        </main>
                    </div>
                    <footer class="content-footer footer bg-footer-theme">
                        <div class="container-xxl">
                            <div
                                class="footer-container d-flex align-items-center justify-content-between py-2 flex-md-row flex-column">
                                <div>
                                    ©
                                    <script>
                                    document.write(new Date().getFullYear());
                                    </script>
                                    , made with ❤️ by <a href="https://instagram/derandyfzn_" target="_blank"
                                        class="fw-semibold">Dyfznnn</a>
                                </div>

                            </div>
                        </div>
                    </footer>
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
            </div>
        </div>
        <div class="layout-overlay layout-menu-toggle"></div>
        <div class="drag-target"></div>
    </div>
    <script src="../../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../../assets/vendor/libs/popper/popper.js"></script>
    <script src="../../assets/vendor/js/bootstrap.js"></script>
    <script src="../../assets/vendor/js/menu.js"></script>
    <script src="../../assets/vendor/libs/sweetalert2/sweetalert2.js"></script>
    <script src="../../assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
    <script src="../../assets/vendor/libs/select2/select2.js"></script>
    <script src="../../assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js"></script>
    <script src="../../assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js"></script>
    <script src="../../assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js"></script>
    <script src="../../assets/vendor/libs/bootstrap-select/bootstrap-select.js"></script>
    <script src="../../assets/js/main.js"></script>
    <script src="../../assets/js/tables-datatables-advanced.js"></script>
    <script src="../../assets/js/forms-selects.js"></script>
    <script src="../../assets/js/ui-carousel.js"></script>



</body>

</html>