@extends('client.client')

@section('title')
    <title>Việc làm thêm | Student Assistant</title>
@endsection

@section('content')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-9">
                @foreach ($jobs as $job)
                    <div class="card mt-3 mb-3">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card-body">
                                    <a href="{{ route('job.detail', ['id' => $job->id]) }}"
                                        class="card-link">
                                        <h5 class="card-title">{{ $job->name }}</h5>
                                    </a>

                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><b>Công ty/ Cửa hàng: </b>
                                            {{ $job->company_name }}
                                        </li>
                                        <li class="list-group-item"><b>Loại hình: </b>
                                            {{ $job->job_type }}
                                        </li>
                                        <li class="list-group-item"><b>Cấp: </b>
                                            {{ $job->job_level }}
                                        </li>
                                        <li class="list-group-item"><b>Lương: </b>
                                            {{ $job->salary }}
                                        </li>
                                        <li class="list-group-item"><b>Địa chỉ: </b>
                                            {{ $job->address }}
                                        </li>
                                        <li class="list-group-item"><b>Số điện thoại: </b>
                                            {{ $job->phone }}
                                        </li>
                                        <li class="list-group-item">
                                            <?php
                                            if (str_word_count($job->description, 0) > 500) {
                                                echo substr($job->description, 0, strpos($job->description, ' ', 500)) . ' ...';
                                            } else {
                                                echo $job->description;
                                            }
                                            ?>
                                        </li>
                                    </ul>
                                    <p class="card-text"><small class="text-muted"><i
                                                class="fa-solid fa-calendar-days pr-1"></i>
                                            <?php
                                            $datetime = explode(' ', $job->created_at);
                                            $date = $datetime[0];
                                            $time = $datetime[1];
                                            echo $date;
                                            ?>
                                        </small></p>
                                    <a href="{{ route('job.detail', ['id' => $job->id]) }}"
                                        class="card-link btn btn-info">Chi
                                        tiết</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="col-md-3">
                <form action="{{ route('search.job') }}" method="GET">
                    @csrf
                    <div class="input-group">
                        <input type="search" class="form-control rounded" id="job_name" name="job_name" placeholder="Tìm kiếm việc làm thêm"
                            aria-label="Search" aria-describedby="search-addon" />
                        <button type="submit" class="btn btn-outline-primary">Tìm kiếm</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            {{ $jobs->links() }}
        </div>
    </div>
@endsection
