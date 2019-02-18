@extends('admin.app')

@section('content')
    
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"> Category </h1>
    </div>

    <!-- Body -->
    <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary"> Edit Category </h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        {!! Form::open(['action' => ['Admin\CategoryController@update', $category->id], 'method' => 'PUT']) !!}
                        <div class="row justify-content-md-center">
                            <div class="col col-md-6">
                                <p class="category"> Category Name </p>
                                <div class="form-group">
                                    {!! Form::text('catname', $category->name, ['class' => 'form-control']); !!}
                                </div>
                                <p class="category"> Slug </p>
                                <div class="form-group">
                                    {!! Form::text('slugname', $category->slug, ['class' => 'form-control']); !!}
                                </div>
                                <div class="form-group text-right"> 
                                {!! Form::submit('Submit', ['class' => 'btn btn-info']); !!}
                                </div>
                            </div>
                        </div>     
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
@endsection
