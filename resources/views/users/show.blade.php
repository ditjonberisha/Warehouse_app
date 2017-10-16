@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                User Details

                @if(Auth::user()->role == 'admin')
                    <div class="pull-right">
                        <form method="post" action="/users/{{ $user->id }}">
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
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

@endsection
