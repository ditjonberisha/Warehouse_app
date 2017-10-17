@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                User Details

                @if(Auth::user()->role == 'admin')
                    <div class="pull-right">
                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#myModal">Delete</button>
                    </div>
                @endif
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
                        <b>Name:</b> {{ $user->name }}
                    </div>
                    <div>
                        <b>Email:</b> {{ $user->email }}
                    </div>
                    <div>
                        <b>Role:</b> {{ $user->role }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('partials._confirm', ['action'=>"/users/$user->id", 'model'=>'user'])
@endsection
