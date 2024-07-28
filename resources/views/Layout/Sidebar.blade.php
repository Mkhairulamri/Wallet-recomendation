@include('Layout/Header')

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon rotate-n-15">
                    <img src="{{asset('asset/mobile-wallet_12261819.png')}}" alt="icon" class="w-50 h-50 border border-white">
                </div>
                <div class="sidebar-brand-text mx-3">Dompet Digital <sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item
                @if(Route::current()->getName() == "Dashboard")
                    active
                @endif
            ">
                <a class="nav-link" href="{{route('Dashboard')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Kriteria
            </div>

            <li class="nav-item
            @if(Route::current()->getName() == "KriteriaIndex")
                active
            @endif
            ">
                <a class="nav-link" href="{{route('KriteriaIndex')}}">
                    <i class="fas fa-fw fa-file"></i>
                    <span>Kriteria</span></a>
            </li>

            <li class="nav-item
            @if(Route::current()->getName() == "SubKriteriaIndex")
                active
            @endif
            ">
                <a class="nav-link" href="{{route('SubKriteriaIndex')}}">
                    <i class="fas fa-fw fa-file"></i>
                    <span>Sub Kriteria</span></a>
            </li>

            <li class="nav-item
            @if(Route::current()->getName() == "AlternatifIndex")
                active
            @endif
            ">
                <a class="nav-link" href="{{route('AlternatifIndex')}}">
                    <i class="fas fa-fw fa-wallet"></i>
                    <span>Alternatif</span></a>
            </li>
            <li class="nav-item
            @if(Route::current()->getName() == "RespondenIndex" || Route::current()->getName() == "RespondenInput")
                active
            @endif
            ">
                <a class="nav-link" href="{{route('RespondenIndex')}}">
                    <i class="fas fa-users"></i>
                    <span>Responden</span></a>
            </li>
            <li class="nav-item
            @if(Route::current()->getName() == "RespondenGuess")
                active
            @endif
            ">
                <a class="nav-link" href="{{route('RespondenGuess')}}">
                    <i class="fas fa-users"></i>
                    <span>Guest Responden</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Penghitungan
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseone"
                    aria-expanded="true" aria-controls="collapseone">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Penghitungan SAW</span>
                </a>
                <div id="collapseone" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Penghitungan SAW</h6>
                        <a class="collapse-item" href="{{route('FrekuensiSAW')}}">Frekuensi</a>
                        <a class="collapse-item" href="{{route('KecocokanSAW')}}">Kecocokan</a>
                        <a class="collapse-item" href="{{route('NormalisasiSAW')}}">Normalisasi</a>
                    </div>
                </div>
            </li>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Penghitungan TOPSIS</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Penghitungan Topsis</h6>
                        <a class="collapse-item" href="{{route('TOPSISTerbobot')}}">Terbobot</a>
                        <a class="collapse-item" href="{{route('TOPSISIdeal')}}">Solusi Ideal</a>
                        <a class="collapse-item" href="{{route('TOPSISPreferensi')}}">Preferensi</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                                <img class="img-profile rounded-circle"
                                    src="{{asset('sb-admin/img/undraw_profile.svg')}}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profil
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{route("Logout")}}">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
