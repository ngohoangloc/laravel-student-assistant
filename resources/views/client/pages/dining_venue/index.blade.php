@extends('client.client')

@section('title')
    <title>Địa điểm ăn uống | Student Assistant</title>
@endsection

@section('content')
    <div class="container">
        <h1>Địa điểm ăn uống</h1>
        <div class="row">
            @foreach ($dV as $dv)
                <div class="col-md-4">
                    <div class="blog-card blog-card-blog">
                        <div class="blog-card-image">
                            <a href="{{ route('dining_venue.detail', ['id' => $dv->id]) }}"> <img
                                    src="{{ $dv->thumbnail_image_path }}" width="100px" height="100px"> </a>
                            <div class="ripple-cont"></div>
                        </div>
                        <div class="blog-table">

                            <h4 class="blog-card-caption">
                                <a href="{{ route('client.dining_venue.detail', ['id' => $dv->id]) }}">{{ $dv->venue_name }}</a>
                            </h4>
                            <div class="blog-card-description">Địa chỉ: <?php
                            if (str_word_count($dv->address, 0) > 500) {
                                echo substr($dv->address, 0, strpos($dv->address, ' ', 500)) . ' ...';
                            } else {
                                echo $dv->address;
                            }
                            ?></div>
                            <div class="blog-card-description"><?php
                            if (str_word_count($dv->description, 0) > 500) {
                                echo substr($dv->description, 0, strpos($dv->description, ' ', 500)) . ' ...';
                            } else {
                                echo $dv->description;
                            }
                            ?></div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection
