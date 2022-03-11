@extends('layouts.admin')

@section('content')
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Portfolio</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Portfolio</li>
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
                            
                            {{-- <h3 class="card-title">Portfolio</h3> --}}
                            @can('user.add')
                            <a href="{{ route('portfolio.cat.create') }}" class="btn btn-success btn-sm ">
                            <span class="fas fa-plus-circle"></span>
                                Add Category
                            </a>

                            <a href="{{ route('portfolio.create') }}" class="btn btn-success btn-sm ">
                                <span class="fas fa-plus-circle"></span>
                                    Add Portfolio
                                </a>
                            <a href="{{ route('portfolio.all') }}" class="btn btn-success btn-sm ">
                                <span class="fas fa-plus-circle"></span>
                                    View Portfolio
                                </a>
                            @endcan
                          
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <!-- Data table -->
                            <table id="dataTable" class="table table-bordered table-striped dataTable dtr-inline table-responsive-lg" user="grid" aria-describedby="dataTable_info">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th class="w-25">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td><a href="{{route('portfolio.create',$category->id)}}">{{ $category->name }}</a></td>
                                      
                                        <td class="text-center">
                                            @can('user.delete')
                                            <form action="{{ route('portfolio.cat.delete',$category->id) }}" method="post">
                                                @csrf
                                                <div class="btn-group">
                                                    @can('user.edit')
                                                    <a href="{{ route('portfolio.cat.edit',$category->id) }}" type="button" class="btn btn-info btn-sm"> Edit</a>
                                                    @endcan
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button type="button" class="btn btn-danger btn-sm" onclick="if (confirm('Вы уверены?')) { this.form.submit() } "> Delete</button>
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
