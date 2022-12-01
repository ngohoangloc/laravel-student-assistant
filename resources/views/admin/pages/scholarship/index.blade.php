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
                <div class="row">
                    <div class="col-md-6">
                        <h2>HỌC BỔNG</h2>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('scholarship.create') }}" class="btn btn-sm btn-success float-right m-2">Thêm
                            học bổng</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php $i = 1; ?>
                <table class="table mt-3">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tên học bổng</th>
                        <th scope="col">Khoa</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Giá trị</th>
                        <th scope="col">Ngày hết hạn</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($scholarships as $scholarship)
                        <tr>
                            <td>
                                    <?php
                                    echo $i;
                                    $i += 1;
                                    ?>
                            </td>
                            <td>{{ $scholarship->name }}</td>
                            <td>
                                    <?php
                                    foreach ($colleges as $college) {
                                        if ($college->id == $scholarship->college_id)
                                            echo $college->name;
                                    }
                                    ?>
                            </td>
                            <td>{{ $scholarship->quantity }}</td>
                            <td>{{ $scholarship->value }}</td>
                            <td> <?= $scholarship->application_deadline ?> </td>
                            <td>
                                <a href="#" class="badge badge-success" data-toggle="modal"
                                   data-target="#detailModal{{$scholarship->id}}">Detail</a>
                                <a href=" {{ route('scholarship.edit', [ 'id' => $scholarship->id]) }} "
                                   class="badge badge-primary">Edit</a>
                                <a href="#" class="badge badge-danger" data-toggle="modal"
                                   data-target="#deleteModal{{$scholarship->id}}">Delete</a>
                            </td>
                        </tr>
                        <!-- Detail Modal -->
                        <div class="modal fade" id="detailModal{{$scholarship->id}}" tabindex="-1" role="dialog"
                             aria-labelledby="detail" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="detail">{{ $scholarship->name }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        ...
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Delete Modal -->
                        <div class="modal fade" id="deleteModal{{$scholarship->id}}" tabindex="-1" role="dialog"
                             aria-labelledby="delete" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="delete">{{ $scholarship->name }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Bạn muốn xoá ?
                                    </div>
                                    <div class="modal-footer">
                                        <a class="btn btn-danger"
                                           href="{{ route('scholarship.delete', [ 'id' => $scholarship->id]) }}"
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
                {{ $scholarships->links() }}
            </div>
        </div>
    </div>
    <!-- /.content-wrapper -->
@endsection


