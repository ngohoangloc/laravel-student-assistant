@extends('client.client')

@section('title')
    <title>Scholarship | SA</title>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($scholarships as $scholarship)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $scholarship->name }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Khoa:
                            <?php
                            foreach ($colleges as $college) {
                                if ($college->id == $scholarship->college_id)
                                    echo $college->name;
                            }
                            ?>

                        </h6>
                        <p class="card-text">
                            <ul class="list-group list-group-light list-group-small">
                                <li class="list-group-item"><b>Số lượng: </b> {{ $scholarship->quantity }}</li>
                                <li class="list-group-item"><b>Giá trị: </b> {{ $scholarship->value }}</li>
                                <li class="list-group-item"><b>Hạn nộp hồ sơ: </b> {{ $scholarship->application_deadline }}</li>
                            </ul>
                        </p>
                        <a href="{{ route('scholarship.detail', [ 'id' => $scholarship->id]) }}" class="card-link">Chi tiết</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
