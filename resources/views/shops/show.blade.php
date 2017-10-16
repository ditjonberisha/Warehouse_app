@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Shop Details
                <div class="pull-right">
                    <form method="post" action="/shops/{{ $shop->id }}">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
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

@endsection
