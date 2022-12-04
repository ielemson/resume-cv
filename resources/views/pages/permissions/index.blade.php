@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Permission</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Permission</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Permissions</h3>
                        @can('permission.add')
                        <a href="{{ route('permissionAdd') }}" class="btn btn-success btn-sm float-right">
                            <span class="fas fa-plus-circle"></span>
                        Add Permission
                        </a>
                        @endcan
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <!-- Data table -->
                        <table id="dataTable" class="table table-bordered table-striped dataTable dtr-inline table-responsive-lg" role="grid" aria-describedby="dataTable_info">
                            <thead>
                            <tr>
                                <th>Permission Id</th>
                                <th>Permission Name</th>
                                <th>Permission Title</th>
                                <th>Permision Role</th>
                                <th class="w-25">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($permissions as $permission)
                                <tr>
                                    <td>{{ $permission->id }}</td>
                                    <td>{{ $permission->name }}</td>
                                    <td>{{ $permission->title }}</td>
                                    <td>
                                        @foreach($permission->roles as $role)
                                            <span class="badge badge-success">{{ $role->name }} </span>
                                        @endforeach
                                    </td>
                                    <td class="text-center">
                                        @can('permission.delete')
                                        <form action="{{ route('permissionDestroy',$permission->id) }}" method="post">
                                            @csrf
                                            <div class="btn-group">
                                                @can('permission.edit')
                                                <a href="{{ route('permissionEdit',$permission->id) }}" type="button" class="btn btn-info btn-sm">Edit</a>
                                                @endcan
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button type="button" class="btn btn-danger btn-sm" onclick="if (confirm('Delete?')) {this.form.submit()}"> Delete</button>
                                            </div>
                                        </form>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection
