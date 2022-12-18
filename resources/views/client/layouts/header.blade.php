<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <!-- Container wrapper -->
    <div class="container-fluid">
        <!-- Toggle button -->
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Navbar brand -->
            <a class="navbar-brand mt-2 mt-lg-0" href="/">
                <img src="{{ asset('img/logo-ctu.png') }}" height="50" alt="CTU Logo" />
            </a>
            <!-- Left links -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="#">Trang chủ</a>
                </li>
                <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                        aria-expanded="false">
                        Học tập
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="/scholarships">Học bổng</a>
                        <a class="dropdown-item" href="/edu-centers">Trung tâm đào tạo</a>
                    </div>
                </li>
                <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                        aria-expanded="false">
                        Đời sống
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="/jobs">Việc làm</a>
                        <a class="dropdown-item" href="/motels">Nhà trọ</a>
                    </div>
                </li>
                <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                        aria-expanded="false">
                        Giải trí
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="/dining-venues">Địa điểm ăn uống</a>
                        <a class="dropdown-item" href="/tourist-places">Địa điểm tham quan & du lịch</a>
                    </div>
                </li>
                <li class="nav-item dropdown active">
                    <?= (session()->get('role') == 1) ? '<a class="nav-link" href="/admin">Trang quản trị</a>' : '' ?>
                </li>
            </ul>
            <!-- Left links -->




        </div>
        <!-- Collapsible wrapper -->

        <!-- Right elements -->
        <div class="d-flex align-items-center">
            <div class="nav-item text-nowrap">

                <?= session()->get('user') ? '<a class="nav-link px-3" href="/logout">Đăng xuất</a>' : '<a class=\"nav-link px-3\" href="/login">Đăng nhập</a> | <a class=\"nav-link px-3\" href="/register">Đăng ký</a>' ?>

            </div>
        </div>
        <!-- Right elements -->
    </div>
    <!-- Container wrapper -->
</nav>
<!-- Navbar -->
