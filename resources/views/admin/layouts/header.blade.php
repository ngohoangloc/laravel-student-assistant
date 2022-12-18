<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">SA Admin</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('admin') }}">Dashboard <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                    aria-expanded="false">
                    Học tập
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="/admin/scholarships">Học bổng</a>
                    <a class="dropdown-item" href="/admin/edu-centers">Trung tâm đào tạo</a>
                </div>
            </li>
            <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                    aria-expanded="false">
                    Đời sống
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="/admin/jobs">Việc làm</a>
                    <a class="dropdown-item" href="/admin/motels">Nhà trọ</a>
                </div>
            </li>
            <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                    aria-expanded="false">
                    Giải trí
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="/admin/dining-venues">Địa điểm ăn uống</a>
                    <a class="dropdown-item" href="/admin/tourist-places">Địa điểm tham quan & du lịch</a>
                </div>
            </li>
        </ul>

        <div class="navbar-nav">
            <div class="nav-item text-nowrap">

                <?= session()->get('user') ? "<a class=\"nav-link px-3\" href=\"/logout\">Đăng xuất</a>" : ""  ?>

            </div>
        </div>
    </div>
</nav>
