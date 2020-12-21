@extends('layout.v_template')
@section('title', 'Contract')
@section('content')

<div class="container">
    <div class="col-md">
        <!-- general form elements -->
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
        <div class="card ">
            <div class="card-header text-right">
                <a href="/contracts/create" class="btn btn-primary">Create Contract</a>
            </div>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Cont. Num</th>
                        <th scope="col">Cont. Name</th>
                        <th scope="col">Client</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contracts as $index => $contract)
                    <tr>
                        <th scope="row">{{$index+$contracts->firstItem()}}</th>
                        <td>{{$contract->cont_num}}</td>
                        <td>{{$contract->name}}</td>
                        <td>{{$contract->client->name}}</td>
                        <td class="text-center">
                            <a href="" class="btn btn-warning">
                                <i class="nav-icon fas fa-eye"></i>
                            </a>
                            <a href="/contracts/{{$contract->id}}/edit" class="btn btn-primary">
                                <i class="nav-icon fas fa-pen"></i>
                            </a>
                            <a href="/contracts/{{$contract->id}}/ammend" class="btn btn-success">
                                <i class="nav-icon fas fa-clone"></i>
                            </a>

                            <form action="/contracts/{{$contract->id}}" method="post" class=" d-inline">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger">
                                    <i class="nav-icon fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card-footer mt-2 text-right">
                {{$contracts->links()}}
            </div>

        </div>
    </div>

    @endsection