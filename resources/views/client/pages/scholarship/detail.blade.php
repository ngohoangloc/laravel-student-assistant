@extends('client.client')

@section('title')
    <title>Học bổng | SA</title>
@endsection

@section('content')
    <?php

    if (!function_exists('currency_format')) {
        function currency_format($number, $suffix = ' VND')
        {
            if (!empty($number)) {
                return number_format($number, 0, ',', '.') . "{$suffix}";
            }
        }
    }
    ?>



    <div class="container mt-5 border rounded p-3">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <!-- Post content-->
                <article class="container">
                    <!-- Post header-->
                    <header class="mb-4">
                        <!-- Post title-->
                        <h1 class="fw-bolder mb-1">{{ $scholarship->name }}</h1>
                        <!-- Post meta content-->
                        <div class="text-muted fst-italic mb-2">Posted on <?php
                        $datetime = explode(' ', $scholarship->created_at);
                        $date = $datetime[0];
                        echo $date;
                        ?> by {{ $profile->name }} </div>
                        <!-- Post categories-->
                        <span class="badge bg-primary text-decoration-none text-light">{{ $college->name }}</span>
                    </header>
                    <!-- Post content-->
                    <section class="mb-5">
                        <p class="fs-5 mb-4"><strong>Số lượng:</strong> {{ $scholarship->quantity }}</p>
                        <p class="fs-5 mb-4"><strong>Trị giá: </strong><?php
                        echo currency_format($scholarship->value);
                        ?> / mỗi suất</p>
                        <p class="fs-5 mb-4"><strong>Hạn nộp hồ sơ: </strong>{{ $scholarship->application_deadline }}</p>

                        <h3 class="fw-bolder mb-4 mt-5">Mô tả</h3>
                        <p class="fs-5 mb-4"><?= $scholarship->description ?></p>
                        <h3 class="fw-bolder mb-4 mt-5">Hồ sơ</h3>
                        <p class="fs-5 mb-4"><?= $scholarship->documents ?></p>
                    </section>
                </article>
                <!-- Comments section-->
                <section class="container mb-5">
                    <div class="card bg-light">
                        <div class="card-body">
                            <!-- Comment form-->
                            <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
                                <form class="mb-4" method="post" action="{{ route('comments.store') }}">
                                    @csrf
                                    <div class="form-group">
                                        <textarea class="form-control" id="content" name="content" rows="4" style="background: #fff;"></textarea>
                                        <input type="hidden" name="scholarship_id" value="{{ $scholarship->id }}" />
                                    </div>
                                    <button type="submit" class="btn btn-primary">Comment</button>
                                </form>


                                <hr>
                                <!-- Comment -->
                                @include('client.pages.scholarship.comment', [
                                    'comments' => $scholarship->comments,
                                    'scholarship_id' => $scholarship->id,
                                ])
                            </div>
                        </div>
                </section>
            </div>

        </div>

    </div>
@endsection
