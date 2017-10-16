<?php
use App\Models\Enum\PhoneConditionEnum;
?>

@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Edit User
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    User Information
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form" action="/shops/{{ $shop->id }}" method="post">
                                <input type="hidden" name="_method" value="PUT">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <div class="form-group">
                                    <label>Name</label>
                                    <input name="name" value="{{ $shop->name }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Country</label>
                                    <input name="country" value="{{ $shop->country }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>City</label>
                                    <input name="city" value="{{ $shop->city }}" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-default">Update</button>
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
