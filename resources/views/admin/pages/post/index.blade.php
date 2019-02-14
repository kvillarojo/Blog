@extends('admin.app')

@section('content')
    
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"> Post </h1>
    </div>

    <!-- Body -->
    <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12 col-md-12">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary"> Create Post </h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    {!! Form::open(['url' => 'admin/post/create', 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
                      <div class="row">
                          <div class="col-md-6">
                              <p class="category"> Post Title </p>
                              <div class="form-group">
                                  {!! Form::text('title', '', ['class' => 'form-control']); !!}
                              </div>
                              <p class="category"> Post Sub Title </p>
                              <div class="form-group">
                                  {!! Form::text('title', '', ['class' => 'form-control']); !!}
                              </div>
                              <p class="category"> Slug </p>
                              <div class="form-group">
                                  {!! Form::text('title', '', ['class' => 'form-control']); !!}
                              </div>
                          </div>

                           <div class="col-md-6">
                              <p class="category"> Upload file </p>
                              <div class="form-group">
                                  {!!  Form::file('file', $attributes = []) !!}
                              </div>
                           </div>
                      </div>     
                      <p class="category"> Body </p>
                      <div class="form-group"> 
                        {!! Form::textarea('post', '', ['class' => 'textarea']); !!}
                      </div>
                      <div class="form-group text-right"> 
                        {!! Form::submit('Submit', ['class' => 'btn btn-info']); !!}
                      </div>
                    {!! Form::close() !!}
                </div>
              </div>
            </div>
    


@endsection