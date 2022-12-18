@extends('client.client')

@section('title')
    <title>Trung tâm đào tạo | SA</title>
@endsection

@section('content')
    <div class="container mt-5 border rounded p-3 mb-5">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <!-- Post content-->
                <article class="container">
                    <!-- Post header-->
                    <header class="mb-4">
                        <!-- Post title-->
                        <h1 class="fw-bolder mb-1 text-left">{{ $dv->venue_name }}</h1>
                        {{-- Image Slide --}}

                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                @foreach ($dv->images as $image)
                                    <div class="carousel-item active">
                                        <img src="{{ $dv->thumbnail_image_path }}" class="d-block w-100"
                                            alt="{{ $dv->thumbnail_image_name }}">
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

                        <!-- Post meta content-->
                        <div class="text-muted fst-italic mb-2">Posted on <?php
                        $datetime = explode(' ', $dv->created_at);
                        $date = $datetime[0];
                        echo $date;
                        ?> by {{ $profile->name }} </div>
                    </header>
                    <!-- Post content-->
                    <section class="mb-5">
                        <p class="fs-5 mb-4"><strong>Địa chỉ:</strong> {{ $dv->address }}</p>

                        <h3 class="fw-bolder mb-4 mt-5">Mô tả</h3>
                        <p class="fs-5 mb-4"><?= $dv->description ?></p>
                    </section>
                </article>
            </div>

        </div>

    </div>
@endsection
