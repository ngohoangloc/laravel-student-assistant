@extends('admin.admin')

@section('title')
    <title>Job | SA</title>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Main content -->
            <div class="container-fluid mt-3 mb-3">
                <h2>THÊM VIỆC LÀM</h2>
                <form  action="{{ route('job.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Tên công việc</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>

                            <div class="form-group">
                                <label for="company_name">Công ty</label>
                                <input type="text" class="form-control" id="company_name" name="company_name" required>
                            </div>

                            <div class="form-group">
                                <label for="address">Địa chỉ</label>
                                <input type="text" class="form-control" id="address" name="address" required>
                            </div>

                            <div class="form-group">
                                <label for="phone">Số điện thoại liên hệ</label>
                                <input type="tel" class="form-control" id="phone" name="phone" required>
                            </div>

                            <div class="form-group">
                                <label for="job_type">Loại công việc</label>
                                <select class="form-control" id="job_type" name="job_type" required>
                                    <option value="Bán thời gian"> Bán thời gian </option>
                                    <option value="Toàn thời gian"> Toàn thời gian </option>
                                    <option value="Cộng tác viên"> Cộng tác viên </option>
                                    <option value="Thời vụ"> Thời vụ </option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="job_level">Cấp bậc</label>
                                <input type="text" class="form-control" id="job_level" name="job_level" required>
                            </div>

                            <div class="form-group">
                                <label for="salary">Lương</label>
                                <input type="text" class="form-control" id="salary" name="salary" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="job_description">Mô tả công việc</label>
                                <textarea class="form-control" id="job_description" name="job_description" rows="3" required>
                                </textarea>
                            </div>

                            <div class="form-group">
                                <label for="job_requirement">Yêu cầu công việc</label>
                                <textarea class="form-control" id="job_requirement" name="job_requirement" rows="3" required>
                                </textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
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
        CKEDITOR.replace('job_description');
        CKEDITOR.replace('job_requirement');
    </script>
@endsection
