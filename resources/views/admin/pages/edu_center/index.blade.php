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
                <div class="row">
                    <div class="col-md-6">
                        <h2>TRUNG TÂM ĐÀO TẠO</h2>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('edu_center.create') }}" class="btn btn-sm btn-success float-right m-2">Thêm
                            trung tâm đào tạo</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php $i = 1; ?>
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên trung tâm</th>
                            <th scope="col">Địa chỉ</th>
                            <th scope="col">Số điện thoại</th>
                            <th scope="col">Website</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($edu_centers as $edu_center)
                            <tr>
                                <td>
                                    <?php
                                    echo $i;
                                    $i += 1;
                                    ?>
                                </td>
                                <td>{{ $edu_center->center_name }}</td>
                                <td>{{ $edu_center->address }}</td>
                                <td><?= $edu_center->center_phone != null ? $edu_center->center_phone : 'N/A' ?></td>
                                <td><?= $edu_center->center_website != null ? $edu_center->center_website : 'N/A' ?></td>
                                <td>
                                    <a href="#" class="badge badge-success" data-toggle="modal"
                                        data-target="#detailModal{{ $edu_center->id }}">Detail</a>
                                    <a href=" {{ route('edu_center.edit', ['id' => $edu_center->id]) }} "
                                        class="badge badge-primary">Edit</a>
                                    <a href="#" class="badge badge-danger" data-toggle="modal"
                                        data-target="#deleteModal{{ $edu_center->id }}">Delete</a>
                                </td>
                            </tr>
                            <!-- Detail Modal -->
                            <div class="modal fade" id="detailModal{{ $edu_center->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="detail" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="detail">{{ $edu_center->center_name }}</h5>

                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <?= $edu_center->description ?>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Delete Modal -->
                            <div class="modal fade" id="deleteModal{{ $edu_center->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="delete" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="delete">{{ $edu_center->name }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Bạn muốn xoá ?
                                        </div>
                                        <div class="modal-footer">
                                            <a class="btn btn-danger"
                                                href="{{ route('edu_center.delete', ['id' => $edu_center->id]) }}"
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
                {{ $edu_centers->links() }}
            </div>
        </div>
    </div>
    <!-- /.content-wrapper -->
@endsection
