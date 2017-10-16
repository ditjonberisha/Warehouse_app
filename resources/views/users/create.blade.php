@extends('layouts.app_1')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Basic Form Elements
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form" action="/register" method="post">
                                {{ csrf_field() }}

                                <div class="form-group">
                                    <label>Name</label>
                                    <input value="{{ old('name') }}" name="name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input value="{{ old('email') }}" name="email" type="email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input name="password" type="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Password Confirm</label>
                                    <input name="password_confirmation" type="password" class="form-control">
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="role" value="admin" checked>
                                        Admin
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="role" value="manager">Manager
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-default">Create</button>
                            </form>
                        </div>
                        <!-- /.col-lg-6 (nested) -->
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
@endsection
