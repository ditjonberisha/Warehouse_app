@extends('layouts.master')

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
                    All shops
                </div>
                @if(Auth::user()->hasRole('admin'))
                    <div class="navbar-form navbar-right">
                        <a href="/shops/create" class="btn btn-success" style="margin-right: 15px;">Add</a>
                    </div>
                @endif
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
                                    &nbsp;<a href="/shops/{{ $shop->id }}" ><i class="fa fa-search" aria-hidden="true"></i></a>&nbsp;&nbsp;
                                    <a href="/shops/{{ $shop->id }}/edit" ><i class="fa fa-edit" aria-hidden="true"></i></a>
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
