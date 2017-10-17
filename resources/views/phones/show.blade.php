@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Phone Details

                <div class="pull-right">
                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#myModal">Delete</button>
                </div>
            </h1>
        </div>
    </div>

    <div class="row">

        <div class="col-lg-12">
            <div class="panel panel-default">

                <div class="panel-heading">
                    Details
                </div>

                <div class="panel-body">
                    <div class="col-lg-12">
                        <div class="col-lg-6">
                            <b>Customer name:</b> {{ $phone->customer_name }}
                        </div>
                        <div class="col-lg-6">
                            <b>Customer email:</b> {{ $phone->customer_email }}.
                        </div>
                        <div class="col-lg-6">
                            <b>IMEI1:</b> {{ $phone->IMEI1 }}.
                        </div>
                        <div class="col-lg-6">
                            <b>IMEI2:</b> {{ $phone->IMEI2 }}.
                        </div>
                        <div class="col-lg-6">
                            <b>EAN:</b> {{ $phone->EAN }}.
                        </div>
                        <div class="col-lg-6">
                            <b>Condition:</b> {{ $phone->condition }}.
                        </div>
                        <div class="col-lg-6">
                            <b>Description:</b> {{ $phone->description }}.
                        </div>
                        <div class="col-lg-6">
                            <b>Shop:</b> {{ $phone->shop->name }}.
                        </div>
                        <div class="col-lg-6">
                            <b>Order ID:</b> {{ $phone->returnedOrderId }}.
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Photos
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    @foreach($phone->photos as $photo)
                        <div class=" col-lg-12" style="margin-bottom: 20px;">
                            <div class="col-lg-offset-3 col-lg-6">
                                <img style="border: 1px solid black;" width="100%" height="100%" src="{{ Storage::url($photo->path) }}">
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- .panel-body -->
            </div>
            <!-- /.panel -->
        </div>
    </div>

    @include('partials._confirm', ['action'=>"/phones/$phone->id", 'model'=>'phone'])

@endsection
