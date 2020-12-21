@extends('layout.v_template')
@section('title', 'Contract')
@section('content')

<div class="container">
    <div class="col-md">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Create Contract</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="/contracts" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form">
                        <div class="d-flex justify-content-around">
                            <div class="form-group col-4">
                                <label for="name">Contract Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                    name="name" value="{{old('name')}}" placeholder="Enter name">
                                @error('name')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group col-4">
                                <label>Client</label>
                                <select name="client_id" class="form-control @error('client_id') is-invalid @enderror">
                                    <option value="">--option--</option>
                                    @foreach($clients as $client)
                                    <option value="{{$client->id}}"
                                        {{old('client_id') == $client->id ? 'selected': null}}>{{$client->name}}
                                    </option>
                                    @endforeach
                                </select>
                                @error('client_id')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="d-flex justify-content-around">
                            <div class="form-group col-4">
                                <label for="cont_num">No. Contract</label>
                                <input type="number" class="form-control @error('cont_num') is-invalid @enderror"
                                    id="cont_num" name="cont_num" value="{{old('cont_num')}}"
                                    placeholder="Enter No. Contract">
                                @error('cont_num')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group col-4">
                                <label>Contract Sign Date</label>
                                <div class="input-group date" id="contractsigndate" data-target-input="nearest">
                                    <input type="text"
                                        class="form-control @error('sign_date') is-invalid @enderror datetimepicker-input"
                                        data-target="#contractsigndate" name="sign_date" id="sign_date"
                                        placeholder="dd/mm/yyyy" value="{{old('sign_date')}}" />
                                    <div class="input-group-append" data-target="#contractsigndate"
                                        data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                    @error('sign_date')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="form-group col-4">
                                <label for="volume">Volume</label>
                                <input type="text" class="form-control" id="volume" name="volume"
                                    placeholder="Enter volume">
                            </div>
                            <div class="form-group col-2">
                                <label for="unit">Unit</label>
                                <input type="text" class="form-control" id="unit" name="unit"
                                    placeholder="ex: Mandays...">
                            </div>

                            <div class="form-group col-4">
                                <label for="paire">Price</label>
                                <input type="number" class="form-control" id="paire" name="price" placeholder="Rp.">
                            </div>
                        </div>
                        <div class="d-flex justify-content-around">
                            <div class="form-group col-4">
                                <label>Start Date</label>
                                <div class="input-group date" id="startdate" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input"
                                        data-target="#startdate" name="start_date" placeholder="YYYY-MM-DD" />
                                    <div class="input-group-append" data-target="#startdate"
                                        data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-4">
                                <label>End Date</label>
                                <div class="input-group date" id="enddate" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" data-target="#enddate"
                                        name="end_date" placeholder="YYYY-MM-DD" />
                                    <div class="input-group-append" data-target="#enddate" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-around">
                            <div class="form-group">
                                <label for="filename">Upload doc</label>
                                <input type="file" class="form-control @error('filename') is-invalid @enderror"
                                    id="filename" name="filename" value="{{old('filename')}}">
                                @error('filename')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer mt-2 text-center">
                    <button type="submit" class="btn btn-primary ">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>



@endsection