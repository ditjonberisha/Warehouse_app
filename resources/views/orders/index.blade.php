@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Orders
            </h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    All Orders
                </div>
                <form action="/orders" class="navbar-form navbar-left" style="margin-right: -2px" method="get">
                    <div class="input-group">
                        <input type="text" value="{{ $from }}" class="form-control" placeholder="From date" name="from" id="from" />
                        <span class="input-group-addon">
							<i class="glyphicon glyphicon-calendar"></i>
						</span>
                    </div>
                    <div class="input-group">
                        <input type="text" value="{{ $to }}" class="form-control" id="to" placeholder="To date" name="to" />
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-calendar"></i>
                        </span>
                    </div>
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" value="{{ $search }}" placeholder="Search..." />
                        <span class="input-group-btn">
							<button class="btn btn-default" type="submit">
								<i class="fa fa-search"></i>
							</button>
						</span>
                    </div>
                    <div class="input-group" style="margin-left: 150px;">
                        <a href="/orders">Clear search</a>
                    </div>
                    <div class="input-group">
                    </div>
                </form>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Returned Order ID</th>
                            <th>Status</th>
                            <th>Sold Order ID</th>
                            <th>Customer email</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr class="odd gradeX">
                                <td>{{ $order->id  }}</td>
                                <td>{{ $order->phone->returnedOrderId  }}</td>
                                <td>{{ $order->status }}</td>
                                <td>{{ $order->soldOrderId }}</td>
                                <td>{{ $order->phone->customer_email }}</td>
                                <td>{{ date('Y/m/d', strtotime($order->created_at)) }}</td>
                                <td>
                                    &nbsp;<a href="/orders/{{ $order->id }}" ><i class="fa fa-search" aria-hidden="true"></i></a>&nbsp;&nbsp;
                                    <a href="/orders/{{ $order->id }}/edit" ><i class="fa fa-edit" aria-hidden="true"></i></a>
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

    <script>
        $('#from').datepicker( {format: 'yyyy/mm/dd'});
        $('#to').datepicker({format: 'yyyy/mm/dd'});
    </script>
@stop
