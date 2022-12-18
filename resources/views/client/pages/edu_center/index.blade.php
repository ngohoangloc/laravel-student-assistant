@extends('client.client')

@section('title')
    <title>Trung tâm đào tạo | Student Assistant</title>
@endsection

@section('content')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-9">
                @foreach ($edu_centers as $edu_center)
                    <div class="card mt-3 mb-3">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card-body">
                                    <a href="{{ route('edu_center.detail', ['id' => $edu_center->id]) }}" class="card-link">
                                        <h5 class="card-title">{{ $edu_center->center_name }}</h5>
                                    </a>
                                    <ul class="list-group">
                                        <li class="list-group-item"><b>Số điện thoại: </b>
                                            {{ $edu_center->center_phone }}
                                        </li>

                                        <li class="list-group-item"><b>Địa chỉ: </b>
                                            {{ $edu_center->address }}
                                        </li>

                                        <li class="list-group-item"><b>Website: </b>
                                            {{ $edu_center->center_website }}
                                        </li>


                                    </ul>
                                    <p class="card-text"><small class="text-muted"><i
                                                class="fa-solid fa-calendar-days pr-1"></i>
                                            <?php
                                            $datetime = explode(' ', $edu_center->created_at);
                                            $date = $datetime[0];
                                            $time = $datetime[1];
                                            echo $date;
                                            ?>
                                        </small></p>
                                    <a href="{{ route('edu_center.detail', ['id' => $edu_center->id]) }}"
                                        class="card-link btn btn-info">Chi
                                        tiết</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="col-md-3">
                <form action="{{ route('search.edu_center') }}" method="GET">
                    @csrf
                    <div class="input-group">
                        <input type="search" class="form-control rounded" id="center_name" name="center_name"
                            placeholder="Tìm kiếm trung tâm" aria-label="Search" aria-describedby="search-addon" />
                        <button type="submit" class="btn btn-outline-primary">Tìm kiếm</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            {{ $edu_centers->links() }}
        </div>
    </div>
@endsection
