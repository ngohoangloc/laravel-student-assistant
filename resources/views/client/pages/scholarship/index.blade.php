@extends('client.client')

@section('title')
    <title>Học bổng | Student Assistant</title>
@endsection

@section('content')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-9">
                @foreach ($scholarships as $scholarship)
                    <div class="card mt-3 mb-3">
                        <div class="row">
                            <div class="col-md-3">
                                <img src="{{ asset('img/scholarship.png') }}" class="img-fluid rounded-start"
                                    alt="Scholarship Image">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <a href="{{ route('scholarship.detail', ['id' => $scholarship->id]) }}"
                                        class="card-link">
                                        <h5 class="card-title">{{ $scholarship->name }}</h5>
                                    </a>

                                    <h6 class="card-subtitle mb-2 text-muted">Khoa:
                                        <?php
                                        foreach ($colleges as $college) {
                                            if ($college->id == $scholarship->college_id) {
                                                echo $college->name;
                                            }
                                        }
                                        ?>
                                    </h6>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><b>Hạn nộp hồ sơ: </b>
                                            {{ $scholarship->application_deadline }}
                                        </li>
                                        <li class="list-group-item">
                                            <?php
                                            if (str_word_count($scholarship->description, 0) > 500) {
                                                echo substr($scholarship->description, 0, strpos($scholarship->description, ' ', 500)) . ' ...';
                                            } else {
                                                echo $scholarship->description;
                                            }
                                            ?>
                                        </li>
                                    </ul>
                                    <p class="card-text"><small class="text-muted"><i
                                                class="fa-solid fa-calendar-days pr-1"></i>
                                            <?php
                                            $datetime = explode(' ', $scholarship->created_at);
                                            $date = $datetime[0];
                                            $time = $datetime[1];
                                            echo $date;
                                            ?>
                                        </small></p>
                                    <a href="{{ route('scholarship.detail', ['id' => $scholarship->id]) }}"
                                        class="card-link btn btn-info">Chi
                                        tiết</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="col-md-3">
                <form action="{{ route('search.scholarship') }}" method="GET">
                    @csrf
                    <div class="input-group">
                        <input type="search" class="form-control rounded" id="scholarship_name" name="scholarship_name" placeholder="Tìm kiếm học bổng"
                            aria-label="Search" aria-describedby="search-addon" />
                        <button type="submit" class="btn btn-outline-primary">Tìm kiếm</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            {{ $scholarships->links() }}
        </div>
    </div>
@endsection
