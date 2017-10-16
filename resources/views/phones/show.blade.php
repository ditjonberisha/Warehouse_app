@extends('layouts.app_1')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Phone Details
            </h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Details
                </div>
                <div class="panel-body">
                    <div class="alert alert-info">
                        Customer name: {{ $phone->customer_name }}.
                    </div>
                    <div class="alert alert-info">
                        Customer email: {{ $phone->customer_email }}.
                    </div><div class="alert alert-info">
                        IMEI1: {{ $phone->IMEI1 }}.
                    </div><div class="alert alert-info">
                        IMEI2: {{ $phone->IMEI2 }}.
                    </div>
                    <div class="alert alert-info">
                        EAN: {{ $phone->EAN }}.
                    </div>
                    <div class="alert alert-info">
                        Condition: {{ $phone->condition }}.
                    </div>
                    <div class="alert alert-info">
                        Description: {{ $phone->description }}.
                    </div>
                    <div class="alert alert-info">
                        Shop: {{ $phone->shop->name }}.
                    </div>
                    <div class="alert alert-info">
                        Order ID: {{ $phone->returnedOrderId }}.
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Photos
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    @foreach($phone->photos as $photo)
                        <div class="alert">
                            <img width="100%" height="100%"src="{{ Storage::url($photo->path) }}">
                        </div>
                    @endforeach
                </div>
                <!-- .panel-body -->
            </div>
            <!-- /.panel -->
        </div>

    </div>
    <div class="col-xs-3">
        <form method="post" action="/phones/{{ $phone->id }}">
            <input type="hidden" name="_method" value="DELETE">
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>

@endsection
