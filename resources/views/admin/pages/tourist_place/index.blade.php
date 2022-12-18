@extends('admin.admin')

@section('title')
    <title>Tourist  | SA</title>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Main content -->
            <div class="container-fluid mt-3 mb-3">
                <div class="row">
                    <div class="col-md-6">
                        <h2>ĐỊA ĐIỂM DU LỊCH</h2>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('tourist_place.create') }}" class="btn btn-sm btn-success float-right m-2">Thêm
                            địa điểm du lịch</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php $i = 1; ?>
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên địa điểm</th>
                            <th scope="col">Địa chỉ</th>
                            <th scope="col">Thumbnail</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tourist_places as $tourist_place)
                            <tr>
                                <td>
                                    <?php
                                    echo $i;
                                    $i += 1;
                                    ?>
                                </td>
                                <td>{{ $tourist_place->place_name }}</td>
                                <td>{{ $tourist_place->address }}</td>
                                <td>
                                    <img src="{{ $tourist_place->thumbnail_image_path }}" width="50px" />
                                </td>
                                <td>
                                    <a href="#" class="badge badge-success" data-toggle="modal"
                                        data-target="#detailModal{{ $tourist_place->id }}">Detail</a>
                                    <a href=" {{ route('tourist_place.edit', ['id' => $tourist_place->id]) }} "
                                        class="badge badge-primary">Edit</a>
                                    <a href="#" class="badge badge-danger" data-toggle="modal"
                                        data-target="#deleteModal{{ $tourist_place->id }}">Delete</a>
                                </td>
                            </tr>
                            <!-- Detail Modal -->
                            <div class="modal fade" id="detailModal{{ $tourist_place->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="detail" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="detail">{{ $tourist_place->place_name }}</h5>

                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <?= $tourist_place->description ?>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Delete Modal -->
                            <div class="modal fade" id="deleteModal{{ $tourist_place->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="delete" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="delete">{{ $tourist_place->place_name }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Bạn muốn xoá ?
                                        </div>
                                        <div class="modal-footer">
                                            <a class="btn btn-danger"
                                                href="{{ route('tourist_place.delete', ['id' => $tourist_place->id]) }}"
                                                role="button">Delete</a>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
                <!-- /.content -->
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                {{ $tourist_places->links() }}
            </div>
        </div>
    </div>
    <!-- /.content-wrapper -->
@endsection
