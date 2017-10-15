<?php
use App\Models\Enum\OrderStatusEnum;
?>
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
                            <form role="form" action="/orders/{{ $order->id }}" method="post">
                                <input type="hidden" name="_method" value="PUT">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <div class="form-group">
                                    <label>Status</label>
                                    @if($order->status == 'sold')
                                        <select id="order_status" name="status" class="form-control">
                                            <option {{ $order->status == 'sold' ? 'selected' : '' }} value="3">Sold</option>
                                        </select>
                                    @else
                                        <select id="order_status" name="status" class="form-control">
                                            <option {{ $order->status == 'on stock' ? 'selected' : '' }} value="0">On stock</option>
                                            <option {{ $order->status == 'beign repaired' ? 'selected' : '' }} value="1">Being repaired</option>
                                            <option {{ $order->status == 'to be sold'  ? 'selected' : '' }} value="2">To be sold</option>
                                            <option {{ $order->status == 'sold' ? 'selected' : '' }} value="3">Sold</option>
                                        </select>
                                    @endif
                                </div>

                                <div id="sold_order" style = "display: {{ $order->status == 'sold' ? 'block': 'none' }}" class="form-group">
                                    <label>Sold Order ID</label>
                                    <input name="soldOrderId" id ="sold_order_id" value="{{ $order->soldOrderId }}" class="form-control">
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
    <script>
        $(document).ready(function(){
            $('#order_status').change(function(){
                if(this.value == '3')
                {
                  $('#sold_order').css('display','block');
                }
                else
                {
                    $('#sold_order').css('display','none');
                }
            })
        })
    </script>
@endsection
