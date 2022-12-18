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
                <div class="row">
                    <div class="col-md-6">
                        <h2>NHÀ TRỌ</h2>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('motel.create') }}" class="btn btn-sm btn-success float-right m-2">Thêm nhà trọ</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php $i = 1; ?>
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên nhà trọ</th>
                            <th scope="col">Chủ nhà trọ</th>
                            <th scope="col">Số điện thoại</th>
                            <th scope="col">Giá thuê / Tháng</th>
                            <th scope="col">Tình trạng phòng</th>
                            <th scope="col">Địa chỉ</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($motels as $motel)
                            <tr>
                                <td>
                                    <?php
                                    echo $i;
                                    $i += 1;
                                    ?>
                                </td>
                                <td>{{ $motel->motel_name }}</td>
                                <td>{{ $motel->owner_name }}</td>
                                <td>{{ $motel->owner_phone }}</td>
                                <td>{{ $motel->price }}</td>
                                <td><?= $motel->status ? 'Còn phòng' : 'Hết phòng' ?></td>
                                <td>{{ $motel->address }}</td>
                                <td>
                                    <a href="#" class="badge badge-success" data-toggle="modal"
                                        data-target="#detailModal{{ $motel->id }}">Detail</a>
                                    <a href=" {{ route('motel.edit', ['id' => $motel->id]) }} "
                                        class="badge badge-primary">Edit</a>
                                    <a href="#" class="badge badge-danger" data-toggle="modal"
                                        data-target="#deleteModal{{ $motel->id }}">Delete</a>
                                </td>
                            </tr>
                            <!-- Detail Modal -->
                            <div class="modal fade" id="detailModal{{ $motel->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="detail" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="detail">{{ $motel->motel_name }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <?= $motel->description ?>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Delete Modal -->
                            <div class="modal fade" id="deleteModal{{ $motel->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="delete" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="delete">{{ $motel->owner_name }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Bạn muốn xoá ?
                                        </div>
                                        <div class="modal-footer">
                                            <a class="btn btn-danger"
                                                href="{{ route('motel.delete', ['id' => $motel->id]) }}"
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
                {{ $motels->links() }}
            </div>
        </div>
    </div>
    <!-- /.content-wrapper -->
@endsection
