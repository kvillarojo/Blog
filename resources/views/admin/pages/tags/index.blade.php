@extends('admin.app')

@prepend('styles')

  <!-- Custom styles for this page -->
  <link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endprepend

@section('content')
    
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"> Tags </h1>
    </div>

    <!-- Body -->
    <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary"> List </h6>
                        <a href="{{ route('tags.create') }}" class="btn btn-success" style="float:right;"> Create </a>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th> Name </th>
                                        <th> Slug </th>
                                        <th> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tags as $tag)
                                        <tr>
                                            <td> {{ $tag->name }}</td>
                                            <td> {{ $tag->slug }}</td>
                                            <td  class="form-inline" style="float:right">
                                                {!! Form::open(['action' => ['Admin\TagController@edit', encrypt($tag->id)], 'method' => 'GET']) !!}
                                                    <button class="btn btn-primary" type="submit"> Edit </button>
                                                {!! Form::close() !!}

                                                {!! Form::open(['action' => ['Admin\TagController@destroy', encrypt($tag->id)], 'method' => 'DELETE', 'style' => "margin-left:5px"]) !!}
                                                    <button class="btn btn-danger" type="submit"> Remove </button>
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
