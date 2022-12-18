@extends('client.client')

@section('title')
    <title>Nhà trọ | SA</title>
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
                        <h1 class="fw-bolder mb-1">{{ $motel->motel_name }}</h1>
                        <!-- Post meta content-->
                        <div class="text-muted fst-italic mb-2">Posted on <?php
                        $datetime = explode(' ', $motel->created_at);
                        $date = $datetime[0];
                        echo $date;
                        ?> by {{ $profile->name }} </div>
                    </header>
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            @foreach ($motel->images as $image)
                                <div class="carousel-item active">
                                    <img src="{{ $motel->thumbnail_image_path }}" class="d-block w-100"
                                        alt="{{ $motel->thumbnail_image_name }}">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ $image->image_path }}" class="d-block w-100"
                                        alt="{{ $image->image_name }}">
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls"
                            data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-target="#carouselExampleControls"
                            data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </button>
                    </div>
                    <!-- Post content-->
                    <section class="mb-5">
                        <p class="fs-5 mb-4"><strong>Chủ:</strong> {{ $motel->owner_name }}</p>
                        <p class="fs-5 mb-4"><strong>Số điện thoại:</strong> {{ $motel->owner_phone }}</p>
                        <p class="fs-5 mb-4"><strong>Giá thuê: </strong><?php
                        echo currency_format($motel->price);
                        ?> / tháng</p>
                        <p class="fs-5 mb-4"><strong>Địa chỉ: </strong>{{ $motel->address }}</p>

                        <h3 class="fw-bolder mb-4 mt-5">Mô tả</h3>
                        <p class="fs-5 mb-4"><?= $motel->description ?></p>
                    </section>
                </article>
                <!-- Comments section-->
                <section class="container mb-5">
                    <div class="card bg-light">
                        <div class="card-header"><h3>Bình luận</h3></div>
                        <div class="card-body">
                            <!-- Comment form-->
                            <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
                                <form class="mb-4" method="post" action="{{ route('comments.store') }}">
                                    @csrf
                                    <div class="form-group">
                                        <textarea class="form-control" id="content" name="content" rows="4" style="background: #fff;"></textarea>
                                        <input type="hidden" name="motel_id" value="{{ $motel->id }}" />
                                    </div>
                                    <button type="submit" class="btn btn-primary">Comment</button>
                                </form>


                                <hr>
                                <!-- Comment -->
                                @include('client.pages.motel.comment', [
                                    'comments' => $motel->comments,
                                    'motel_id' => $motel->id,
                                ])
                            </div>
                        </div>
                </section>
            </div>

        </div>

    </div>
@endsection
