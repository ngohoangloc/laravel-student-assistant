@extends('admin.admin')

@section('title')
    <title>Motel | SA</title>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Main content -->
            <div class="container-fluid mt-3 mb-3">
                <h2>CHỈNH SỬA NHÀ TRỌ</h2>
                <form action="{{ route('motel.update', ['id' => $motel->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="motel_name">Tên nhà trọ</label>
                                <input type="text" class="form-control" id="motel_name" name="motel_name"
                                    value="{{ $motel->motel_name }}" required>
                            </div>

                            <div class="form-group">
                                <label for="owner_name">Tên chủ nhà trọ</label>
                                <input type="text" class="form-control" id="owner_name" name="owner_name"
                                    value="{{ $motel->owner_name }}" required>
                            </div>

                            <div class="form-group">
                                <label for="owner_phone">Số điện thoại</label>
                                <input type="tel" class="form-control" id="owner_phone" name="owner_phone"
                                    value="{{ $motel->owner_phone }}" required>
                            </div>

                            <div class="form-group">
                                <label for="price">Giá thuê / Tháng</label>
                                <input type="number" class="form-control" id="price" name="price"
                                    value="{{ $motel->price }}" required>
                            </div>

                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status"
                                        value="1" <?= $motel->status == '1' ? 'checked' : '' ?>>
                                    <label class="form-check-label" for="status">
                                        Còn phòng
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status"
                                        value="0" <?= $motel->status == '0' ? 'checked' : '' ?>>
                                    <label class="form-check-label" for="status">
                                        Hết phòng
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Hình ảnh</label>
                                <input type="file" class="form-control-file" name="thumbnail_image_path">
                            </div>
                            <div class="form-group">
                                <img src="{{ $motel->thumbnail_image_path }}" width="100px" />
                            </div>


                            <div class="form-group">
                                <label>Ảnh chi tiết</label>
                                <input type="file" multiple class="form-control-file" name="image_path[]">
                                @foreach($motel->images as $image)
                                    <img src="{{ $image->image_path }}" width="100px"/>
                                @endforeach
                            </div>

                            <div class="form-group">
                                <label for="address">Địa chỉ</label>
                                <input type="text" class="form-control" id="address" name="address"
                                    value="{{ $motel->address }}" required>
                            </div>

                            <div class="form-group">
                                <label for="description">Mô tả</label></label>
                                <textarea class="form-control" id="description" name="description" rows="3" required>
                                    <?= $motel->description ?>
                                </textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a class="btn btn-warning" href="/admin/motels" role="button">Back</a>
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
