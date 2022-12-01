@extends('admin.admin')

@section('title')
    <title>Scholarship | SA</title>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Main content -->
            <div class="container-fluid mt-3 mb-3">
                <h2>CHỈNH SỬA HỌC BỔNG</h2>
                <form  action="{{ route('scholarship.update', ['id' => $scholarship->id]) }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Tên học bổng</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{$scholarship->name}}" required>
                            </div>

                            <div class="form-group">
                                <label for="college_id">Khoa</label>
                                <select class="form-control" id="college_id" name="college_id">
                                    @foreach ($colleges as $college)
                                        <option value="{{$college->id}}"> {{$college->name}} </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="quantity">Số lượng</label>
                                <input type="number" class="form-control" id="quantity" name="quantity" value="{{$scholarship->quantity}}" required>
                            </div>

                            <div class="form-group">
                                <label for="value">Giá trị (mỗi suất)</label>
                                <input type="text" class="form-control" id="value" name="value" value="{{$scholarship->value}}" required>
                            </div>

                            <div class="form-group">
                                <label for="application_deadline">Hạn nộp hồ sơ</label>
                                <input type="date" class="form-control" id="application_deadline" name="application_deadline" value="{{$scholarship->application_deadline}}" required>
                            </div>

                            <div class="form-group">
                                <label for="description">Mô tả</label>
                                <textarea class="form-control" id="description" name="description" rows="3" required>
                                    {{$scholarship->description}}
                                </textarea>
                            </div>

                            <div class="form-group">
                                <label for="documents">Hồ sơ</label>
                                <textarea class="form-control" id="documents" name="documents" rows="3" required>
                                    {{$scholarship->documents}}
                                </textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a class="btn btn-warning" href="/admin/scholarships" role="button">Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.content-wrapper -->
@endsection

@section('js')
    <script>
        CKEDITOR.replace('description');
        CKEDITOR.replace('documents');
    </script>
@endsection
