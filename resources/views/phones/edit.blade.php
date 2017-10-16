<?php
use App\Models\Enum\PhoneConditionEnum;
?>

@extends('layouts.app_1')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Edit Phone
            </h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Basic Form Elements
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form" action="/phones/{{ $phone->id }}" method="post">
                                <input type="hidden" name="_method" value="PUT">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <div class="form-group">
                                    <label>Customer name</label>
                                    <input name="customer_name" value="{{ $phone->customer_name }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Customer email</label>
                                    <input name="customer_email" value="{{ $phone->customer_email }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>IMEI1</label>
                                    <input name="IMEI1" value="{{ $phone->IMEI1 }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>IMEI2</label>
                                    <input name="IMEI2" value="{{ $phone->IMEI2 }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>EAN</label>
                                    <input name="EAN" value="{{ $phone->EAN }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Order ID</label>
                                    <input name="returnedOrderId" value="{{ $phone->returnedOrderId }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Shop</label>
                                    <select name="shop_id" class="form-control">
                                        @foreach($myShops as $myShop)
                                            <option {{ $myShop->id == $phone->shop_id ? 'selected' : '' }} value="{{ $myShop->id }}">{{ $myShop->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Condition</label>
                                    <select name="condition" class="form-control">
                                        <option {{ PhoneConditionEnum::getNumber((string)$phone->condition) == 0 ? 'selected' : '' }} value="0">New</option>
                                        <option {{ PhoneConditionEnum::getNumber((string)$phone->condition) == 1 ? 'selected' : '' }} value="1">Opened</option>
                                        <option {{ PhoneConditionEnum::getNumber((string)$phone->condition) == 2 ? 'selected' : '' }} value="2">Broken Fixable</option>
                                        <option {{  PhoneConditionEnum::getNumber((string)$phone->condition) == 3 ? 'selected' : '' }} value="3">Broken Unfixable</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control" rows="3">{{ $phone->description }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>File input</label>
                                    <input type="file">
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
