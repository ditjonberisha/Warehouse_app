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
                        Name: {{ $user->name }}.
                    </div>
                    <div class="alert alert-info">
                        Email: {{ $user->email }}.
                    </div>
                    <div class="alert alert-info">
                        Role: {{ $user->role }}.
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(Auth::user()->role == 'admin')
        <div class="col-xs-3">
            <form method="post" action="/users/{{ $user->id }}">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    @endif

@endsection
