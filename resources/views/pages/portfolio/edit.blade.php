@extends('layouts.admin')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Portfolio Category</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('portfolio.index') }}">Portfolio</a></li>
                        <li class="breadcrumb-item active">Add</li>
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
                        <h3 class="card-title">Add</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <form action="{{ route('portfolio.update',$portfolioData->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Portfolio Name</label>
                                <input type="text" name="name" class="form-control {{ $errors->has('name') ? "is-invalid":"" }}" value="{{ $portfolioData->name }}" required>
                                @if($errors->has('name') || 1)
                                    <span class="error invalid-feedback">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Category</label>
                                <select  name="cat_id" class="form-control {{ $errors->has('cat_id') ? "is-invalid":"" }}"  required>
                                <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                                    @if ($category->id == $portfolioData->category->id)
                                    <option value="{{$category->id}}" selected>{{$category->name}}</option> 
                                    @else
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endif
                               
                                @endforeach
                                </select>
                                @if($errors->has('cat_id') || 1)
                                    <span class="error invalid-feedback">{{ $errors->first('cat_id') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Link</label>
                                <input type="link" name="link" class="form-control {{ $errors->has('link') ? "is-invalid":"" }}" value="{{ $portfolioData->link }}" required>
                                @if($errors->has('link') || 1)
                                    <span class="error invalid-feedback">{{ $errors->first('link') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                     
                                 
                                 
                                 <label>Image</label>
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                              <a id="uploadFile" data-input="thumbnail" data-preview="holder" class="btn btn-secondary">
                                                <i class="fa fa-picture-o"></i> Choose Photo
                                              </a>
                                            </span>
                                            <input id="thumbnail" class="form-control d-none" type="text" name="img">
                                        </div>
                                   


                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <textarea  name="description" id="summernote" class="form-control {{ $errors->has('description') ? "is-invalid":"" }}"  required>{{ $portfolioData->description }}</textarea>
                                @if($errors->has('description') || 1)
                                    <span class="error invalid-feedback">{{ $errors->first('description') }}</span>
                                @endif
                            </div>
                          
                           
                            <div class="form-group">
                                <button type="submit" class="btn btn-success float-right">Submit</button>
                                <a href="{{ route('portfolio.index') }}" class="btn btn-default float-left">Cancel</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('custom-styles')
    <link rel="stylesheet" href="{{ asset('resume/css/plugins/summernote-bs4.min.css') }}">
@endpush

@push('custom-scripts')
<script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
<script src="{{ asset('resume/js/summernote-bs4.min.js') }}"></script>
<script>
    jQuery(document).ready(function() {
        jQuery('#summernote').summernote({
            height: 150,
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']]
              ]

        });
        jQuery('#uploadFile').filemanager('file');
    });
  </script>
@endpush