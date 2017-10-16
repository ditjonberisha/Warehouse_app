@extends('layouts.app_1')

@section('content')
    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Details
                </div>
                <div class="panel-body">
                    <div class="alert alert-info">
                        Name: {{ $shop->name }}.
                    </div>
                    <div class="alert alert-info">
                        Country: {{ $shop->country }}.
                    </div><div class="alert alert-info">
                        City: {{ $shop->city }}.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-3">
        <form method="post" action="/shops/{{ $shop->id }}">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="DELETE">
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>

@endsection
