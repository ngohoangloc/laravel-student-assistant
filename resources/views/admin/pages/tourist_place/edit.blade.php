@extends('admin.admin')

@section('title')
    <title>Tourist Sài Gòn | SA</title>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Main content -->
            <div class="container-fluid mt-3 mb-3">
                <h2>CHỈNH SỬA ĐỊA ĐIỂM DU LỊCH</h2>
                <form action="{{ route('tourist_place.update', ['id' => $tourist_place->id]) }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="place_name">Tên địa điểm <span class="text-danger">&lowast;</span></label>
                                <input type="text" class="form-control" id="place_name" name="place_name" value="{{ $tourist_place->place_name }}" required>
                            </div>

                            <div class="form-group">
                                <label>Hình ảnh</label>
                                <input type="file" class="form-control-file" name="thumbnail_image_path">
                            </div>
                            <div class="form-group">
                                <img src="{{ $tourist_place->thumbnail_image_path }}" width="100px" />
                            </div>


                            <div class="form-group">
                                <label>Ảnh chi tiết</label>
                                <input type="file" multiple class="form-control-file" name="image_path[]">
                                @foreach($tourist_place->images() as $image)
                                    <img src="{{ $image->image_path }}" width="100px"/>
                                @endforeach
                            </div>

                            <div class="form-group">
                                <label for="address">Địa chỉ <span class="text-danger">&lowast;</span></label>
                                <input type="text" class="form-control" id="address" name="address"  value="{{ $tourist_place->address }}" required>
                            </div>

                            <div class="form-group">
                                <label for="description">Mô tả <span class="text-danger">&lowast;</span></label>
                                <textarea class="form-control" id="description" name="description" rows="3" required>
                                    <?= $tourist_place->description ?>
                                </textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a class="btn btn-warning" href="/admin/tourist-places" role="button">Back</a>
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
