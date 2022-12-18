@extends('client.client')

@section('title')
    <title>Địa điểm tham quan du lịch | Student Assistant</title>
@endsection

@section('content')
    <div class="container">
        <h1>Các địa điểm tham quan nổi tiếng</h1>
        <div class="row">
            @foreach ($tP as $tp)
                <div class="col-md-4">
                    <div class="blog-card blog-card-blog">
                        <div class="blog-card-image">
                            <a href="{{ route('client.tourist_place.detail', ['id' => $tp->id]) }}"> <img
                                    src="{{ $tp->thumbnail_image_path }}" width="100px" height="100px"> </a>
                            <div class="ripple-cont"></div>
                        </div>
                        <div class="blog-table">

                            <h4 class="blog-card-caption">
                                <a href="{{ route('client.tourist_place.detail', ['id' => $tp->id]) }}">{{ $tp->place_name }}</a>
                            </h4>
                            <div class="blog-card-description">Địa chỉ: <?php
                            if (str_word_count($tp->address, 0) > 500) {
                                echo substr($tp->address, 0, strpos($tp->address, ' ', 500)) . ' ...';
                            } else {
                                echo $tp->address;
                            }
                            ?></div>
                            <div class="blog-card-description"><?php
                            if (str_word_count($tp->description, 0) > 500) {
                                echo substr($tp->description, 0, strpos($tp->description, ' ', 500)) . ' ...';
                            } else {
                                echo $tp->description;
                            }
                            ?></div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection
