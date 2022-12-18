@extends('client.client')

@section('title')
    <title>Nhà trọ | Student Assistant</title>
@endsection

@section('content')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-9">
                @foreach ($motels as $motel)
                    <div class="card mt-3 mb-3">
                        <div class="row">
                            <div class="col-md-3">
                                <img src="{{ $motel->thumbnail_image_path }}" class="img-fluid rounded-start"
                                    alt="Motel Image" width="">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <a href="{{ route('motel.detail', ['id' => $motel->id]) }}" class="card-link">
                                        <h5 class="card-title">{{ $motel->motel_name }}</h5>
                                    </a>
                                    <ul class="list-group">
                                        <li class="list-group-item"><b>Chủ trọ: </b>
                                            {{ $motel->owner_name }}
                                        </li>
                                        <li class="list-group-item"><b>Số điện thoại: </b>
                                            {{ $motel->owner_phone }}
                                        </li>
                                        <li class="list-group-item"><b>Giá thuê / tháng: </b>
                                            {{ $motel->owner_phone }}
                                        </li>
                                        <li class="list-group-item"><b>Tình trạng: </b>
                                            @if ($motel->status == 1)
                                                Còn phòng
                                            @else
                                                Hết phòng
                                            @endif
                                        </li>
                                        <li class="list-group-item"><b>Địa chỉ: </b>
                                            {{ $motel->address }}
                                        </li>

                                    </ul>
                                    <p class="card-text"><small class="text-muted"><i
                                                class="fa-solid fa-calendar-days pr-1"></i>
                                            <?php
                                            $datetime = explode(' ', $motel->created_at);
                                            $date = $datetime[0];
                                            $time = $datetime[1];
                                            echo $date;
                                            ?>
                                        </small></p>
                                    <a href="{{ route('motel.detail', ['id' => $motel->id]) }}"
                                        class="card-link btn btn-info">Chi
                                        tiết</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="col-md-3">
                <form action="{{ route('search.motel') }}" method="GET">
                    @csrf
                    <div class="input-group">
                        <input type="search" class="form-control rounded" id="motel_name" name="motel_name"
                            placeholder="Tìm kiếm nhà trọ" aria-label="Search" aria-describedby="search-addon" />
                        <button type="submit" class="btn btn-outline-primary">Tìm kiếm</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            {{ $motels->links() }}
        </div>
    </div>
@endsection
