@extends('layout.v_template')
@section('title', 'Project')
@section('content')
<!-- Main content -->
<div class="container">
    <div class="col-md">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Create Project</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form">
                <div class="card-body">
                    <div class="form">
                        <div class="d-flex justify-content-center">
                            <div class="col-2">
                                <div class="form-group">
                                    <label>Contract Refference</label>
                                    <select id="contra" class="form-control" onchange="myFunction()">
                                        <option>--Pilih--</option>
                                        <option value="">No Contract</>
                                        <option Value="1">Contract 1</option>
                                    </select>
                                </div>
                                <div id="demo" class="alert alert-danger" style="display:none">
                                    <strong>Info!</strong> Not Found!
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-around">
                            <div class="form-group col-4">
                                <label for="projectname">Project Name</label>
                                <input type="text" class="form-control" id="projectname"
                                    placeholder="Enter project name">
                            </div>
                            <div class="form-group col-4">
                                <label for=noproject>No. Project</label>
                                <input type="text" class="form-control" id="noproject"
                                    placeholder="Enter nomer project">
                            </div>
                        </div>
                        <div class="d-flex justify-content-around">
                            <div class="form-group col-4">
                                <label>Project Sign Date</label>
                                <div class="input-group date" id="startdate" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input"
                                        data-target="#startdate" placeholder="dd/mm/yyyy" />
                                    <div class="input-group-append" data-target="#startdate"
                                        data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-4">
                                <label for="totalprice">Total Price</label>
                                <input type="number" class="form-control" id="totalprice" placeholder="Rp.">
                            </div>
                        </div>
                        <div class="d-flex justify-content-around">
                            <div class="form-group col-4">
                                <label>Start Date</label>
                                <div class="input-group date" id="startdate" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input"
                                        data-target="#startdate" placeholder="dd/mm/yyyy" />
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
                                        placeholder="dd/mm/yyyy" />
                                    <div class="input-group-append" data-target="#enddate" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-around">
                            <div class="form-group col-4">
                                <label for="volumeuse">Volume Use</label>
                                <input type="number" class="form-control" id="volume Use"
                                    placeholder="Enter volume use..">
                            </div>
                            <div class="form-group col-4">
                                <label for="totalprice2">Total Price</label>
                                <input type="number" class="form-control" id="totalprice2" placeholder="Rp.">
                            </div>
                        </div>
                        <div class="card-header mt-4 d-flex justify-content-center ">
                            <h3 class="card-title font-weight-bold">Progress</h3>
                        </div>
                        <table class="table table-borderless d-flex justify-content-center" id="dynamicProgress">
                            <tr>
                                <th class="text-center">Nama</th>
                                <th class="text-center">% Invoice</th>
                                <th><a type="button" name="add" id="add-btn" class="btn btn-success">+</a></th>
                            </tr>
                            <tr>
                                <td><input type="text" name="moreFields[0][nama]" placeholder="Enter nama"
                                        class="form-control" />
                                </td>
                                <td><input type="text" name="moreFields[0][per_invoice]" placeholder="Enter % invoice"
                                        class="form-control" />
                                </td>
                                <td><a type="button" class="btn btn-danger remove-tr">-</a></td>
                            </tr>
                        </table>
                        <div class="card-header d-flex justify-content-center mt-4">
                            <h3 class="card-title font-weight-bold">Costing</h3>
                        </div>
                        <table class="table table-borderless d-flex justify-content-center" id="dynamicCosting">
                            <tr>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Desc</th>
                                <th class="text-center">Cost</th>
                                <th><a type="button" name="addcost" id="add-btnCost" class="btn btn-success">+</a></th>
                            </tr>
                            <tr>
                                <td><input type="text" name="moreFields[0][nama_cost]" placeholder="Enter nama"
                                        class="form-control" />
                                </td>
                                <td><input type="text" name="moreFields[0][desc_cost]" placeholder="Enter desc"
                                        class="form-control" />
                                </td>
                                <td><input type="text" name="moreFields[0][cost]" placeholder="Enter cost"
                                        class="form-control" />
                                </td>
                                <td><a type="button" class="btn btn-danger removeCost-tr">-</a></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="card-footer mt-5 text-center">
                    <a href="/operationals" type="submit" class="btn btn-primary ">Submit</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection