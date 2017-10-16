@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Create Order
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Order Information
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form" action="/phones" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label>Customer name</label>
                                    <input name="customer_name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Customer email</label>
                                    <input name="customer_email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>IMEI1</label>
                                    <input name="IMEI1" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>IMEI2</label>
                                    <input name="IMEI2" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>EAN</label>
                                    <input name="EAN" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Order ID</label>
                                    <input name="returnedOrderId" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Shop</label>
                                    <select name="shop_id" class="form-control">
                                        @foreach($myShops as $myShop)
                                            <option value="{{ $myShop->id }}">{{ $myShop->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Condition</label>
                                    <select name="condition" class="form-control">
                                        <option value="0">New</option>
                                        <option value="1">Opened</option>
                                        <option value="2">Broken Fixable</option>
                                        <option value="3">Broken Unfixable</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control" rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>File input</label>
                                    <input type="file" multiple="multiple" name="photos[]">
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
