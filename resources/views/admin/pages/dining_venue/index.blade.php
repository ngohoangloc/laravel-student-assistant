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
                <div class="row">
                    <div class="col-md-6">
                        <h2>ĐỊA ĐIỂM ĂN UỐNG</h2>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('dining_venue.create') }}" class="btn btn-sm btn-success float-right m-2">Thêm
                            địa điểm ăn uống</a>
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
                        @foreach ($dining_venues as $dining_venue)
                            <tr>
                                <td>
                                    <?php
                                    echo $i;
                                    $i += 1;
                                    ?>
                                </td>
                                <td>{{ $dining_venue->venue_name }}</td>
                                <td>{{ $dining_venue->address }}</td>
                                <td>
                                    <img src="{{ $dining_venue->thumbnail_image_path }}" width="50px" />
                                </td>
                                <td>
                                    <a href="#" class="badge badge-success" data-toggle="modal"
                                        data-target="#detailModal{{ $dining_venue->id }}">Detail</a>
                                    <a href=" {{ route('dining_venue.edit', ['id' => $dining_venue->id]) }} "
                                        class="badge badge-primary">Edit</a>
                                    <a href="#" class="badge badge-danger" data-toggle="modal"
                                        data-target="#deleteModal{{ $dining_venue->id }}">Delete</a>
                                </td>
                            </tr>
                            <!-- Detail Modal -->
                            <div class="modal fade" id="detailModal{{ $dining_venue->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="detail" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="detail">{{ $dining_venue->venue_name }}</h5>

                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <?= $dining_venue->description ?>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Delete Modal -->
                            <div class="modal fade" id="deleteModal{{ $dining_venue->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="delete" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="delete">{{ $dining_venue->venue_name }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Bạn muốn xoá ?
                                        </div>
                                        <div class="modal-footer">
                                            <a class="btn btn-danger"
                                                href="{{ route('dining_venue.delete', ['id' => $dining_venue->id]) }}"
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
                {{ $dining_venues->links() }}
            </div>
        </div>
    </div>
    <!-- /.content-wrapper -->
@endsection
