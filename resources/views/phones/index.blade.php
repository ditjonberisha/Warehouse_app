@extends('layouts.app_1')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Phones
                </div>
                <form action="/phones" class="navbar-form navbar-left" style="margin-right: -2px" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" value="{{ $search }}" placeholder="Search..." />
                        <span class="input-group-btn">
							<button class="btn btn-default" type="submit">
								<i class="fa fa-search"></i>
							</button>
						</span>
                    </div>
                    <div class="input-group">
                        <a href="/phones">Clear search</a>
                    </div>
                    <div class="input-group">
                    </div>
                </form>
                <div class="navbar-form navbar-right">
                    <a href="/phones/create" class="btn btn-primary" style="margin-right: 15px; ">Add</a>
                </div>
                <!-- /.panel-heading -->

                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Order ID</th>
                            <th>Condition</th>
                            <th>IMEI1</th>
                            <th>Customer</th>
                            <th>EAN</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($phones as $phone)
                            <tr class="odd gradeX">
                                <td>{{ $phone->id  }}</td>
                                <td>{{ $phone->returnedOrderId  }}</td>
                                <td>{{ $phone->condition }}</td>
                                <td>{{ $phone->IMEI1 }}</td>
                                <td>{{ $phone->customer_email }}</td>
                                <td>{{ $phone->EAN }}</td>
                                <td>
                                    <a href="/phones/{{ $phone->id }}" class="fa fa-eye"></a>
                                    <a href="/phones/{{ $phone->id }}/edit" class="fa fa-edit"></a>
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
