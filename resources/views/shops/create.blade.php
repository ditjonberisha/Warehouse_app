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
                            <form role="form" action="/shops" method="post">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input value="{{ old('name') }}" name="name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Country</label>
                                    <input value="{{ old('country') }}" name="country" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>City</label>
                                    <input value="{{ old('city') }}" name="city" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Shop managers</label>
                                    <select multiple="" name="user_ids[]" class="form-control">
                                        @foreach($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->email }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-default">Create</button>
                            </form>
                        </div>
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
