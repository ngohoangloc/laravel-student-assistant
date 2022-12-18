@extends('admin.admin')

@section('title')
    <title>Dining Venue | SA</title>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Main content -->
            <div class="container-fluid mt-3 mb-3">
                <h2>CHỈNH SỬA ĐỊA ĐIỂM ĂN UỐNG</h2>
                <form action="{{ route('dining_venue.update', ['id' => $dining_venue->id]) }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="venue_name">Tên địa điểm <span class="text-danger">&lowast;</span></label>
                                <input type="text" class="form-control" id="venue_name" name="venue_name" value="{{ $dining_venue->venue_name }}" required>
                            </div>

                            <div class="form-group">
                                <label>Hình ảnh</label>
                                <input type="file" class="form-control-file" name="thumbnail_image_path">
                            </div>
                            <div class="form-group">
                                <img src="{{ $dining_venue->thumbnail_image_path }}" width="100px" />
                            </div>


                            <div class="form-group">
                                <label>Ảnh chi tiết</label>
                                <input type="file" multiple class="form-control-file" name="image_path[]">
                                @foreach($dining_venue->images as $image)
                                    <img src="{{ $image->image_path }}" width="100px"/>
                                @endforeach
                            </div>

                            <div class="form-group">
                                <label for="address">Địa chỉ <span class="text-danger">&lowast;</span></label>
                                <input type="text" class="form-control" id="address" name="address"  value="{{ $dining_venue->address }}" required>
                            </div>

                            <div class="form-group">
                                <label for="description">Mô tả <span class="text-danger">&lowast;</span></label>
                                <textarea class="form-control" id="description" name="description" rows="3" required>
                                    <?= $dining_venue->description ?>
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
