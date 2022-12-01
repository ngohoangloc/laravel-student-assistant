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
                <div class="row">
                    <div class="col-md-6">
                        <h2>VIỆC LÀM</h2>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('job.create') }}" class="btn btn-sm btn-success float-right m-2">Thêm việc làm</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php $i = 1; ?>
                <table class="table mt-3">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tên công việc</th>
                        <th scope="col">Công ty</th>
                        <th scope="col">Địa chỉ</th>
                        <th scope="col">Số điện thoại</th>
                        <th scope="col">Hình thức</th>
                        <th scope="col">Cấp bậc</th>
                        <th scope="col">Lương</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($jobs as $job)
                        <tr>
                            <td>
                                <?php
                                echo $i;
                                $i += 1;
                                ?>
                            </td>
                            <td>{{ $job->name }}</td>
                            <td>{{ $job->company_name }}</td>
                            <td>{{ $job->address }}</td>
                            <td>{{ $job->phone }}</td>
                            <td>{{ $job->job_type }}</td>
                            <td>{{ $job->job_level }}</td>
                            <td>{{ $job->salary }}</td>
                            <td>
                                <a href=" {{ route('job.edit', [ 'id' => $job->id]) }} " class="badge badge-primary" >Edit</a>
                                <a href=" {{ route('job.delete', [ 'id' => $job->id]) }} " class="badge badge-danger" >Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <!-- /.content -->
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                {{ $jobs->links() }}
            </div>
        </div>
    </div>
    <!-- /.content-wrapper -->
@endsection

