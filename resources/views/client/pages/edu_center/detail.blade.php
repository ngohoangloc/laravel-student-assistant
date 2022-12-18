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
                        <h1 class="fw-bolder mb-1 text-left">{{ $edu_center->center_name }}</h1>
                        {{-- Image Slide --}}

                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                @foreach ($edu_center->images as $image)
                                    <div class="carousel-item active">
                                        <img src="{{ $edu_center->thumbnail_image_path }}" class="d-block w-100"
                                            alt="{{ $edu_center->thumbnail_image_name }}">
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
                        $datetime = explode(' ', $edu_center->created_at);
                        $date = $datetime[0];
                        echo $date;
                        ?> by {{ $profile->name }} </div>
                    </header>
                    <!-- Post content-->
                    <section class="mb-5">
                        <p class="fs-5 mb-4"><strong>Địa chỉ:</strong> {{ $edu_center->address }}</p>
                        <p class="fs-5 mb-4"><strong>Số điện thoại: </strong> {{ $edu_center->center_phone }}</p>
                        <p class="fs-5 mb-4"><strong>Website: </strong> {{ $edu_center->center_website }}</p>

                        <h3 class="fw-bolder mb-4 mt-5">Mô tả</h3>
                        <p class="fs-5 mb-4"><?= $edu_center->description ?></p>
                    </section>
                </article>
                {{-- <!-- Comments section-->
                <section class="container mb-5">
                    <div class="card bg-light">
                        <div class="card-body">
                            <!-- Comment form-->
                            <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
                                <form class="mb-4" method="post" action="{{ route('comments.store') }}">
                                    @csrf
                                    <div class="form-group">
                                        <textarea class="form-control" id="content" name="content" rows="4" style="background: #fff;"></textarea>
                                        <input type="hidden" name="edu_center_id" value="{{ $edu_center->id }}" />
                                    </div>
                                    <button type="submit" class="btn btn-primary">Comment</button>
                                </form>


                                <hr>
                                <!-- Comment -->
                                @include('client.pages.scholarship.comment', [
                                    'comments' => $edu_center->comments,
                                    'edu_center_id' => $edu_center->id,
                                ])
                            </div>
                        </div>
                </section> --}}
            </div>

        </div>

    </div>
@endsection
