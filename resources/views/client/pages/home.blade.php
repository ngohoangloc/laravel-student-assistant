@extends('client.client')

@section('title')
    <title>Trang chủ | Student Assistant</title>
@endsection

@section('content')
    <div class="container mt-5 mb-5">
        <h2>Học bổng</h2>
        <div class="row mb-2">
            @foreach ($scholarships as $scholarship)
                <div class="col-md-3 mx-2">
                    <div
                        class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column position-static">
                            <h4 class="mb-0">{{ $scholarship->name }}</h4>
                            <div class="mb-1 text-muted"><?php
                            $datetime = explode(' ', $scholarship->created_at);
                            $date = $datetime[0];
                            echo $date;
                            ?></div>

                            <a href="{{ route('scholarship.detail', ['id' => $scholarship->id]) }}" class="stretched-link">Xem
                                thêm ...</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <h2>Trung tâm đào tạo</h2>
        <div class="row mb-2">
            @foreach ($edu_centers as $edu_center)
                <div class="col-md-3 mx-2">
                    <div
                        class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column position-static">
                            <h4 class="mb-0">{{ $edu_center->center_name }}</h4>
                            <div class="mb-1 text-muted"><?php
                            $datetime = explode(' ', $edu_center->created_at);
                            $date = $datetime[0];
                            echo $date;
                            ?></div>
                            <a href="{{ route('edu_center.detail', ['id' => $edu_center->id]) }}"
                                class="stretched-link">Xem thêm ...</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection
