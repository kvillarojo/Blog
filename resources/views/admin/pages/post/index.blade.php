@extends('admin.app')

@prepend('styles')
  <!-- Custom styles for this page -->
  <link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
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
                        <h6 class="m-0 font-weight-bold text-primary"> List </h6>
                        <a href="{{ route('post.create') }}" class="btn btn-success" style="float:right;"> Create </a>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th> S.No </th>
                                        <th> Title </th>
                                        <th> Sub Tile </th>
                                        <th> Slug </th>
                                        <th> Created At </th>
                                        <th> Edit </th>
                                        <th> Delete </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $post)
                                        <tr>
                                            <td> {{ $post->id }}</td>
                                            <td> {{ $post->title }}</td>
                                            <td> {{ $post->subtitle }}</td>
                                            <td> {{ $post->slug }}</td>
                                            <td> {{ $post->created_at->diffForHumans() }}</td>
                                            <td  class="text-right">
                                                {!! Form::open(['action' => ['Admin\PostController@edit', encrypt($post->id)], 'method' => 'GET']) !!}
                                                    <button class="btn btn-primary" type="submit"> <span class="fa fa-edit"></span> </button>
                                                {!! Form::close() !!}
                                            </td>
                                            <td class="text-right">
                                                {!! Form::open(['action' => ['Admin\PostController@destroy', encrypt($post->id)], 'method' => 'DELETE', 'style' => "margin-left:5px"]) !!}
                                                    <button class="btn btn-danger" type="submit"> <span class="fa fa-trash"></span> </button>
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
@endsection

@prepend('scripts')

    <!-- Page level plugins -->
    <script src="{{ asset('admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('admin/js/demo/datatables-demo.js') }}"></script>

@endprepend
