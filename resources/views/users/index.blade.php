@extends('layouts.app_1')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Users
            </h1>
        </div>

    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    All Users
                </div>
                <div class="navbar-form navbar-right">
                    <a href="/users/create" class="btn btn-primary" style="margin-right: 15px; ">Add</a>
                </div>
                <!-- /.panel-heading -->

                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Manages</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr class="odd gradeX">
                                <td>{{ $user->id  }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role }}</td>
                                <td>{{ $user->shops->count() }} shops </td>
                                <td>
                                    <a href="/users/{{ $user->id }}" class="fa fa-eye"></a>
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
