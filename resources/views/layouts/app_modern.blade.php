<!doctype html>
<html lang="en">

<head>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Learning</title>
    <link rel="shortcut icon" type="image/png" href="modern/src/assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="modern/src/assets/css/styles.min.css" />
    <style>
        body {
            background: linear-gradient(to right, #ffffff, #5dcff2);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .page-wrapper {
            background: rgba(255, 255, 255, 0.8);
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        header,
        .container-fluid {
            animation: fadeIn 1.5s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .ti-bell-ringing {
            animation: shake 1.2s infinite;
        }
        @keyframes popIn {
        0% {
            transform: scale(0.8);
            opacity: 0;
        }
        50% {
            transform: scale(1.05);
            opacity: 0.5;
        }
        100% {
            transform: scale(1);
            opacity: 1;
        }
    }

    aside.left-sidebar {
        animation: popIn 0.8s ease-out;
    }
    .sidebar-item a.sidebar-link:hover {
        background: #5dcff2;
        color: #fff;
        border-radius: 8px;
        transition: all 0.3s ease-in-out;
        transform: scale(1.05);
    }

    /* Animasi saat item sidebar dipilih */
    .sidebar-item a.sidebar-link.active {
        background: #1a73e8;
        color: #fff;
        font-weight: bold;
        box-shadow: 0 4px 8px rgba(26, 115, 232, 0.2);
        transition: all 0.3s ease-in-out;
        transform: translateX(5px);
    }

        @keyframes shake {

            0%,
            100% {
                transform: rotate(0deg);
            }

            25% {
                transform: rotate(-15deg);
            }

            50% {
                transform: rotate(15deg);
            }

            75% {
                transform: rotate(-15deg);
            }
        }

        nav.navbar {
            animation: slideIn 1s ease-out;
        }

        @keyframes slideIn {
            from {
                transform: translateY(-100%);
            }

            to {
                transform: translateY(0);
            }
        }

        nav.navbar a.nav-link:hover {
            color: #ffffff;
            transition: color 0.3s ease-in-out;
        }

        .brand-logo img {
            animation: bounce 2s infinite;
        }

        @keyframes bounce {

            0%,
            20%,
            50%,
            80%,
            100% {
                transform: translateY(0);
            }

            40% {
                transform: translateY(-10px);
            }

            60% {
                transform: translateY(-5px);
            }
        }

        .brand-logo img:hover {
            transform: scale(1.1);
            transition: transform 0.3s ease;

        }
    </style>
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="/siswa-offline" class="text-nowrap logo-img">
                        <div id="logo-container" class="d-flex justify-content-center align-items-center">
                            <img id="logo" src="https://pkl.hummatech.com/logopkldark.png" class="dark-logo"
                                width="180" alt="" style="">
                        </div>
                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                        <script>
                            $(document).ready(function() {
                                var logo = $('#logo');
                                var newSrc = "https://pkl.hummatech.com/logopkldark.png";
                                var newWidth = "180";

                                setTimeout(function() {
                                    logo.fadeOut(1000, function() {
                                        logo.attr('src', newSrc);
                                        logo.attr('width', newWidth);
                                        logo.fadeIn(1000);
                                    });
                                }, 2500);
                            });
                        </script> <img src="https://pkl.hummatech.com/assets/images/logo-pkl.png"
                            class="light-logo" width="180" alt="" style="display: none;">
                    </a>
                    <div class="close-btn d-lg-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8 text-muted text-primary"></i>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Home</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="./dashboard" aria-expanded="false">
                                <span>
                                    <i class="ti ti-layout-dashboard"></i>
                                </span>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">UI COMPONENTS</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="./guru" aria-expanded="false">
                                <span>
                                    <i class="ti ti-user"></i>
                                </span>
                                <span class="hide-menu">Guru</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="./kelas" aria-expanded="false">
                                <span><i class="ti ti-home"></i></span>
                                <span class="hide-menu">Kelas</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="/siswa" aria-expanded="false">
                                <span>
                                    <i class="ti ti-users"></i>
                                </span>
                                <span class="hide-menu">Siswa</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="./tugas" aria-expanded="false">
                                <span>
                                    <i class="ti ti-file-description"></i>
                                </span>
                                <span class="hide-menu">Tugas</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="./nilai" aria-expanded="false">
                                <span>
                                    <span><i class="ti ti-check"></i></span>
                                </span>
                                <span class="hide-menu">Nilai</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="./materi" aria-expanded="false">
                                <span>
                                    <span><i class="ti ti-book"></i></span>
                                </span>
                                <span class="hide-menu">Materi</span>
                            </a>
                        </li>
                        </li>
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">EXTRA</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="./icon-tabler.html" aria-expanded="false">
                                <span>
                                    <i class="ti ti-mood-happy"></i>
                                </span>
                                <span class="hide-menu">Icons</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="./sample-page.html" aria-expanded="false">
                                <span>
                                    <i class="ti ti-aperture"></i>
                                </span>
                                <span class="hide-menu">Sample Page</span>
                            </a>
                        </li>
                    </ul>
                    <div class="unlimited-access hide-menu bg-light-primary position-relative mb-7 mt-5 rounded">
                        <div class="d-flex">
                            <div class="unlimited-access-title me-3">
                                <a href="https://adminmart.com/product/modernize-bootstrap-5-admin-template/"
                                    target="_blank" class="btn btn-primary fs-2 fw-semibold lh-sm">Online Class</a>
                            </div>
                            <div class="unlimited-access-img">
                                <img src="modern/src/assets/images/backgrounds/rocket.png" alt=""
                                    class="img-fluid">
                            </div>
                        </div>
                    </div>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
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
                                <span class="btn btn-primary text-white">
                                    {{ Auth::user()->name }}
                                </span>
                            </li>
                            <!-- Foto Profil -->
                            <li class="nav-item dropdown">
                                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="modern/src/assets/images/profile/user-1.jpg" alt=""
                                        width="35" height="35" class="rounded-circle">
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
                                            <a href="javascript:void(0);" class="btn btn-outline-primary mx-3 mt-2 d-block"onclick="confirmLogout()">
                                                {{ __('Log Out') }}
                                            </a>
                                        </form>

                                        <script>
                                            function confirmLogout() {
                                                // Menampilkan konfirmasi logout
                                                if (confirm('Apakah Anda Ingin Logout?')) {
                                                    // Jika user mengkonfirmasi, form akan disubmit
                                                    document.getElementById('logout-form').submit();
                                                }
                                            }
                                        </script>

                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!--  Header End -->
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </div>
    <script src="modern/src/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="modern/src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="modern/src/assets/js/sidebarmenu.js"></script>
    <script src="modern/src/assets/js/app.min.js"></script>
    <script src="modern/src/assets/libs/simplebar/dist/simplebar.js"></script>
</body>

</html>
