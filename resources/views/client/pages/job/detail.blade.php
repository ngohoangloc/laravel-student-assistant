@extends('client.client')

@section('title')
    <title>Việc làm thêm | SA</title>
@endsection

@section('content')
    <div class="container mt-5 border rounded p-3">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <!-- Post content-->
                <article class="container">
                    <!-- Post header-->
                    <header class="mb-4">
                        <!-- Post title-->
                        <h1 class="fw-bolder mb-1">{{ $job->name }}</h1>
                        <!-- Post meta content-->
                        <div class="text-muted fst-italic mb-2">Posted on <?php
                        $datetime = explode(' ', $job->created_at);
                        $date = $datetime[0];
                        echo $date;
                        ?> by {{ $profile->name }} </div>
                    </header>
                    <!-- Post content-->
                    <section class="mb-5">
                        <p class="fs-5 mb-4"><strong>Công ty/ Cửa hàng:</strong> {{ $job->company_name }}</p>
                        <p class="fs-5 mb-4"><strong>Số điện thoại:</strong> {{ $job->phone }}</p>
                        <p class="fs-5 mb-4"><strong>Địa chỉ: </strong>{{ $job->address }}</p>
                        <p class="fs-5 mb-4"><strong>Loại công việc: </strong>{{ $job->job_type }}</p>
                        <p class="fs-5 mb-4"><strong>Cấp bậc: </strong>{{ $job->job_level }}</p>

                        <h3 class="fw-bolder mb-4 mt-5">Mô tả</h3>
                        <p class="fs-5 mb-4"><?= $job->job_description ?></p>
                        <h3 class="fw-bolder mb-4 mt-5">Yêu cầu</h3>
                        <p class="fs-5 mb-4"><?= $job->job_requirement ?></p>
                    </section>
                </article>
            </div>

        </div>

    </div>
@endsection
