<!doctype html>
<html lang="en">

<head>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Online Class</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('modern/src/assets/images/logos/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('modern/src/assets/css/styles.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/logoanimasi.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>

    <!-- Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="/siswa-offline" class="text-nowrap logo-img">
                        <div id="logo-container" class="d-flex justify-content-center align-items-center">
                           {{-- <img id="logo" src="{{ asset('gambar/logokita.jpeg') }}" class="dark-logo"> --}}
                        </div>
                        <img src="https://pkl.hummatech.com/assets/images/logo-pkl.png" class="light-logo"
                            width="180" alt="" style="display: none;">
                    </a>
                    <div class="close-btn d-lg-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8 text-muted text-primary"></i>
                    </div>
                </div>
                <!-- Sidebar navigation -->
                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Home</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route(Auth::user()->role . '.dashboard') }}"
                                aria-expanded="false">
                                <span><i class="ti ti-layout-dashboard"></i></span>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>

                        @if (Auth::user()->role == 'admin')
                            <li class="nav-small-cap">
                                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                                <span class="hide-menu">Admin Menu</span>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ route('admin.guru.index') }}" aria-expanded="false">
                                    <span><i class="ti ti-user"></i></span>
                                    <span class="hide-menu">Guru</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ route('admin.kelas.index') }}" aria-expanded="false">
                                    <span><i class="ti ti-home"></i></span>
                                    <span class="hide-menu">Kelas</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ route('admin.siswa.index') }}" aria-expanded="false">
                                    <span><i class="ti ti-user"></i></span>
                                    <span class="hide-menu">Siswa</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ route('admin.tugas.index') }}" aria-expanded="false">
                                    <span><i class="ti ti-file-description"></i></span>
                                    <span class="hide-menu">Tugas</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ route('admin.nilai.index') }}" aria-expanded="false">
                                    <span><i class="ti ti-check"></i></span>
                                    <span class="hide-menu">Nilai</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ route('admin.materi.index') }}" aria-expanded="false">
                                    <span><i class="ti ti-book"></i></span>
                                    <span class="hide-menu">Materi</span>
                                </a>
                            </li>
                        @endif

                        @if (Auth::user()->role == 'user')
                            <li class="nav-small-cap">
                                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                                <span class="hide-menu">User Menu</span>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ route('user.tugas.index') }}" aria-expanded="false">
                                    <span><i class="ti ti-file-description"></i></span>
                                    <span class="hide-menu">Tugas Saya</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ route('user.materi.index') }}"
                                    aria-expanded="false">
                                    <span><i class="ti ti-book"></i></span>
                                    <span class="hide-menu">Materi</span>
                                </a>
                            </li>
                        @endif
                    </ul>
                </nav>

            </div>
        </aside>
        <!-- Sidebar End -->

        <!-- Main wrapper -->
        <div class="body-wrapper">
            <!-- Header Start -->
            <header class="app-header">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <ul class="navbar-nav">
                        <li class="nav-item d-block d-xl-none">
                            <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse"
                                href="javascript:void(0)">
                                <i class="ti ti-menu-2"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                                <i class="ti ti-bell-ringing"></i>
                                <div class="notification bg-primary rounded-circle"></div>
                            </a>
                        </li>
                    </ul>
                    <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                            <!-- Nama User -->
                            <li class="nav-item">
                                <span class="btn btn-primary text-white" style="font-size: 0.8rem; padding: 4px 8px;">
                                    {{ Auth::user()->name }}
                                </span>
                            </li>
                            <!-- Foto Profil -->
                            <li class="nav-item dropdown">
                                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="{{ asset('modern/src/assets/images/profile/user3.png') }}"
                                        alt="" width="35" height="35" class="rounded-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up"
                                    aria-labelledby="drop2">
                                    <div class="message-body">
                                        <a href="javascript:void(0)"
                                            class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="ti ti-user fs-6"></i>
                                            <p class="mb-0 fs-3">My Profile</p>
                                        </a>
                                        <a href="javascript:void(0)"
                                            class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="ti ti-mail fs-6"></i>
                                            <p class="mb-0 fs-3">My Account</p>
                                        </a>
                                        <a href="javascript:void(0)"
                                            class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="ti ti-list-check fs-6"></i>
                                            <p class="mb-0 fs-3">My Task</p>
                                        </a>
                                        <form id="logout-form" method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="btn btn-outline-primary mx-3 mt-2 d-block">
                                                {{ __('Log Out') }}
                                            </button>
                                        </form>
                                        </form>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Header End -->

            <!-- Content Section -->
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('modern/src/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('modern/src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('modern/src/assets/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('modern/src/assets/js/app.min.js') }}"></script>
    <script src="{{ asset('modern/src/assets/libs/simplebar/dist/simplebar.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <!-- Menambahkan Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var dropdownElement = document.getElementById("drop2");
            if (dropdownElement) {
                dropdownElement.addEventListener("click", function() {
                    var dropdownMenu = this.nextElementSibling;
                    if (dropdownMenu) {
                        dropdownMenu.classList.toggle("show");
                    }
                });
            }
        });
    </script>


    @yield('scripts')
</body>

</html>
