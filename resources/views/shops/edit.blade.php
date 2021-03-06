<?php
use App\Models\Enum\PhoneConditionEnum;
?>

@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Edit Shop
            </h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Shop Information
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
                                <div class="form-group">
                                    <label>Shop managers</label>
                                    <select multiple="" name="user_ids[]" class="form-control">
                                        @foreach($users as $user)
                                            <option {{ $shop->users->contains($user) ? 'selected' : '' }} value="{{ $user->id }}">{{ $user->email }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary pull-right">Update</button>
                                </div>
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
