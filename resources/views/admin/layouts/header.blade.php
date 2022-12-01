<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">SA Admin</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('admin') }}">Dashboard <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                    Học tập
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="/admin/scholarships">Học bổng</a>
                    <a class="dropdown-item" href="/admin/education-centers">Trung tâm đào tạo</a>
                </div>
            </li>
            <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                    Đời sống
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="/admin/jobs">Việc làm</a>
                    <a class="dropdown-item" href="#">Nhà trọ</a>
                </div>
            </li>
            <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                    Giải trí
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Địa điểm ăn uống</a>
                    <a class="dropdown-item" href="#">Địa điểm tham quan & du lịch</a>
                </div>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/admin/users">Người dùng</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>
