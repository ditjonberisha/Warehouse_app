@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Shop Details
                <div class="pull-right">
                    <div class="pull-right">
                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#myModal">Delete</button>
                    </div>
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
                    <div>
                        <b>Name:</b> {{ $shop->name }}.
                    </div>
                    <div>
                        <b>Country:</b> {{ $shop->country }}.
                    </div>
                    <div>
                        <b>City:</b> {{ $shop->city }}.
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('partials._confirm', ['action'=>"/shops/$shop->id", 'model'=>'shop'])
@endsection
