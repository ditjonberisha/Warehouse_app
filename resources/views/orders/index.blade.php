@extends('layouts.app_1')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    DataTables Advanced Tables
                </div>
                <form action="/orders" class="navbar-form navbar-left" style="margin-right: -2px" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" data-date-picker="1" placeholder="From date" name="from" id="from" />
                        {{--<span class="input-group-addon">--}}
							{{--<i class="glyphicon glyphicon-calendar"></i>--}}
						{{--</span>--}}
                    </div>
                    <div class="input-group">
                        <input type="text" class="form-control" id="to" data-date-picker="1" placeholder="To date" name="to" />
                        {{--<span class="input-group-addon">--}}
                            {{--<i class="glyphicon glyphicon-calendar"></i>--}}
                        {{--</span>--}}
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
                                <td>
                                    <a href="/orders/{{ $order->id }}" class="fa fa-eye"></a>
                                    <a href="/orders/{{ $order->id }}/edit" class="fa fa-edit"></a>
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