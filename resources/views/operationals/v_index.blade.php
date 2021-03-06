@extends('layout.v_template')
@section('title', 'List Operational & Cost-POxxxx')
@push('custom-css')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('assets/')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
@endpush
@section('content')
<div class="container">
    <div class="col-md">
        <!-- general form elements -->
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
        <div class="card">
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Contract Number</th>
                            <th>Client</th>
                            <th>Project Number</th>
                            <th>Project Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($operationals as $index => $operational)

                        <tr>
                            <th class="text-center">{{$loop->iteration}}</th>
                            @if($operational->contract_id)
                            <td class="text-center">{{$operational->contract->cont_num}}</td>
                            <td>{{$operational->contract->client->name}}</td>
                            @else
                            <td class="text-center"></td>
                            <td></td>
                            @endif
                            <td class="text-center">{{$operational->no_po}}</td>
                            <td>{{$operational->name}}</td>
                            <td class="text-center">
                                <a href="/operationals/{{$operational->id}}" class="btn btn-warning">
                                    <i class="nav-icon fas fa-eye"></i>
                                </a>
                                <a href="/operationals/{{$operational->id}}/edit" class="btn btn-primary">
                                    <i class="nav-icon fas fa-pen"></i>
                                </a>
                            </td>
                            @endforeach
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Contract Number</th>
                            <th>Client</th>
                            <th>Project Number</th>
                            <th>Project Name</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@push('custom-js')
<!-- DataTables -->
<script src="{{asset('assets/')}}/plugins/datatables/jquery.dataTables.js"></script>
<script src="{{asset('assets/')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
@endpush
@push('custom-script')
<script>
$(function() {
    $("#example1").DataTable();
});
</script>
@endpush