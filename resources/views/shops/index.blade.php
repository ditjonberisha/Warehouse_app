@extends('layouts.app_1')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Shops
            </h1>
        </div>

    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    All shops of warehouse
                </div>
                <div class="navbar-form navbar-right">
                    <a href="/shops/create" class="btn btn-primary" style="margin-right: 15px; ">Add</a>
                </div>
                <!-- /.panel-heading -->

                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Country</th>
                            <th>City</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($shops as $shop)
                            <tr class="odd gradeX">
                                <td>{{ $shop->id  }}</td>
                                <td>{{ $shop->name }}</td>
                                <td>{{ $shop->country}}</td>
                                <td>{{ $shop->city }}</td>
                                <td>
                                    <a href="/shops/{{ $shop->id }}" class="fa fa-eye"></a>
                                    <a href="/shops/{{ $shop->id }}/edit" class="fa fa-edit"></a>
                                </td>
                            </tr>
                        @endforeach
                <!-- /.panel-body -->
                        </tbody>
                    </table>
                </div>
            <!-- /.panel -->
            </div>
        <!-- /.col-lg-12 -->
        </div>
    </div>
@stop
