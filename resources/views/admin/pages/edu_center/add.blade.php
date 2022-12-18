@extends('admin.admin')

@section('title')
    <title>Edu Center | SA</title>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Main content -->
            <div class="container-fluid mt-3 mb-3">
                <h2>THÊM TRUNG TÂM ĐÀO TẠO</h2>
                <form action="{{ route('edu_center.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Tên trung tâm <span class="text-danger">&lowast;</span></label>
                                <input type="text" class="form-control" id="center_name" name="center_name" required>
                            </div>

                            <div class="form-group">
                                <label>Hình ảnh</label>
                                <input type="file" class="form-control-file" name="thumbnail_image_path">
                            </div>

                            <div class="form-group">
                                <label>Ảnh chi tiết</label>
                                <input type="file" multiple class="form-control-file" name="image_path[]">
                            </div>

                            <div class="form-group">
                                <label for="address">Địa chỉ <span class="text-danger">&lowast;</span></label>
                                <input type="text" class="form-control" id="address" name="address" required>
                            </div>

                            <div class="form-group">
                                <label for="center_phone">Số điện thoại <span class="text-danger">&lowast;</span></label>
                                <input type="tel" class="form-control" id="center_phone" name="center_phone" required>
                            </div>

                            <div class="form-group">
                                <label for="center_website">Website</label>
                                <input type="text" class="form-control" id="center_website" name="center_website">
                            </div>

                            <div class="form-group">
                                <label for="description">Mô tả <span class="text-danger">&lowast;</span></label>
                                <textarea class="form-control" id="description" name="description" rows="3" required>
                                </textarea>
                            </div>


                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a class="btn btn-warning" href="/admin/edu-centers" role="button">Back</a>
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
    </script>
@endsection
