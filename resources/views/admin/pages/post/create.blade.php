@extends('admin.app')

@prepend('styles')
    <style>
      input.form-control.danger {
          border-color: #ff0000;
          -moz-box-shadow: 0 0 8px 0 black;
          box-shadow: 0 0 7px 0 #ff0000;
      }
    </style>
@endprepend

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
                {!! Form::open(['action' => 'Admin\PostController@store', 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
                <div class="row justify-content-md-center">
                    <div class="col-md-6">
                        <p class="category"> Post Title </p>
                        <div class="form-group">
                            {!! Form::text('title', '', ['class' => 'form-control' ]); !!}
                            {{-- <small style="color:red" class="alert-link">
                                @if ($errors->has('title'))
                                    {{ $errors->first('title') }}
                                @endif
                            </small> --}}
                        </div>

                        <p class="category"> Post Sub Title </p>
                        <div class="form-group">
                            {!! Form::text('sub-title', '', ['class' => 'form-control']); !!}
                            {{-- <small style="color:red" class="alert-link">
                                @if ($errors->has('sub-title'))
                                    {{ $errors->first('sub-title') }}
                                @endif
                            </small> --}}
                        </div>
                        <p class="category"> Slug </p>
                        <div class="form-group">
                            {!! Form::text('slug', '', ['class' => 'form-control']); !!}
                            {{-- <small style="color:red" class="alert-link">
                                @if ($errors->has('slug'))
                                    {{ $errors->first('slug') }}
                                @endif
                            </small> --}}
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <p class="category"> Upload file </p>
                                <div class="form-group">
                                    {!!  Form::file('cover_image', $attributes = []) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <p class="category"> Publish </p>
                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                <label class="form-check-label" for="inlineCheckbox1"> Yes </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>     
                <p class="category"> Body </p>
                <div class="form-group"> 
                    {!! Form::textarea('post', '', ['class' => 'textarea']); !!}
                    {{-- <small style="color:red " class="alert-link">
                        @if ($errors->has('post'))
                        {{ $errors->first('post') }}
                        @endif
                    </small> --}}
                </div>
                <div class="form-group text-right"> 
                    {!! Form::submit('Submit', ['class' => 'btn btn-info']); !!}
                </div>
            {!! Form::close() !!}
            </div>
        </div>
    </div>
    @endsection
    
    @prepend('scripts')
      {{-- CK EDITOR --}}
      <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
      <script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
      <script>
        $('textarea').ckeditor();
      </script>
    @endprepend