	<!-- main-sidebar -->
    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
    <div class="sticky">
        <aside class="app-sidebar sidebar-scroll">
            <div class="main-sidebar-header active">
                <a class="desktop-logo logo-light active" href="index.html"><img src="../assets/img/brand/logo.png" class="main-logo" alt="logo"></a>
                <a class="desktop-logo logo-dark active" href="index.html"><img src="../assets/img/brand/logo-white.png" class="main-logo" alt="logo"></a>
                <a class="logo-icon mobile-logo icon-light active" href="index.html"><img src="../assets/img/brand/favicon.png" alt="logo"></a>
                <a class="logo-icon mobile-logo icon-dark active" href="index.html"><img src="../assets/img/brand/favicon-white.png" alt="logo"></a>
            </div>
            <div class="main-sidemenu">
                <div class="main-sidebar-loggedin">
                    <div class="app-sidebar__user">
                        <div class="dropdown user-pro-body text-center">
                            <div class="user-pic">
                                <img src="../assets/img/faces/6.jpg" alt="user-img" class="rounded-circle mCS_img_loaded">
                            </div>
                            <div class="user-info">
                                <div class="user-info">
                                    <h6 class=" mb-0 text-dark">@auth {{ auth()->user()->username }} @endauth</h6>
                                    <span class="text-muted app-sidebar__user-name text-sm">@auth {{ auth()->user()->role }} @endauth</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"><path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"/></svg></div>
                <ul class="side-menu ">
                    <li class="slide">
                        <a class="side-menu__item" href="{{ route('dashboard')}}"><i class="side-menu__icon fe fe-airplay"></i><span class="side-menu__label">Dashboard</span></a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide"   href="javascript:void(0);"><i class="side-menu__icon fe fe-book"></i><span class="side-menu__label">Data Buku</span><i class="angle fe fe-chevron-down"></i></a>
                        <ul class="slide-menu">
                            <li class="side-menu__label1"><a href="javascript:void(0);">Data Buku</a></li>
                            <li><a class="slide-item" href="{{ route('data-buku')}}">Data Buku</a></li>
                            <li><a class="slide-item" href="{{ route('kategori')}}">Kategori Buku</a></li>
                            <li><a class="slide-item" href="{{ route('koleksi')}}">Koleksi Pribadi</a></li>
                            <li><a class="slide-item" href="{{ route('ulasan_buku')}}">Ulasan Buku</a></li>
                        </ul>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" href="{{ route('data-peminjaman') }}"><i class="side-menu__icon fe fe-users"></i><span class="side-menu__label">Data Peminjam</span></a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" href="{{ route('data-pengguna') }}"><i class="side-menu__icon fe fe-user"></i></i><span class="side-menu__label">Data Pengguna</span></a>
                    </li>
                </ul>

                <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"><path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"/></svg></div>
            </div>
        </aside>
    </div>
    <!-- main-sidebar -->
