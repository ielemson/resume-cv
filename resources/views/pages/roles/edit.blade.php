@extends('layouts.admin')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Role Title</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('roleIndex') }}">Role Title</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->

    <section class="content">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">edit</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <form action="{{ route('roleUpdate',$role->id) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Role Name</label>
                                <input type="text" name="name" class="form-control {{ $errors->has('name') ? "is-invalid":"" }}" value="{{ old('name',$role->name) }}" required>
                                @if($errors->has('name') || 1)
                                    <span class="error invalid-feedback">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <select multiple="multiple" name="permissions[]" size="30" class="duallistbox" aria-multiselectable="true">
                                    @foreach($permissions as $permission)
                                        <option value="{{ $permission->name }}" {{ ($role->hasPermissionTo($permission->name)) ? "selected":'' }}>{{ $permission->name   }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Role Title</label>
                                <input type="text" name="title" class="form-control" value="{{ old('title',$role->title) }}">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success float-right">Save</button>
                                <a href="{{ route('roleIndex') }}" class="btn btn-default float-left">Cancel</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
