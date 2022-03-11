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
                  @if (count($data) > 0)
                      @foreach ($data as $portfolio)
                      <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="card">
                          <img class="card-img-top" src="{{$portfolio->img}}" alt="Bologna">
                          <div class="card-body">
                            <h4 class="card-title">{{$portfolio->category->name}}</h4>
                            <h6 class="card-subtitle mb-2 text-muted">{{$portfolio->name}}</h6>
                            <p class="card-text">{{$portfolio->description}} </p>
                            <a href="{{route('portfolio.edit',$portfolio->id)}}" class="card-link btn btn-info btn-sm">edit</a>
                            <a href="#" class="card-link btn btn-danger btn-sm">delete</a>
                          </div>
                        </div>
                      </div>
                      @endforeach
                  @else
                      
                  @endif
                </div>
       
            <!-- /.row -->
        </section>
        <!-- /.content -->
@endsection
