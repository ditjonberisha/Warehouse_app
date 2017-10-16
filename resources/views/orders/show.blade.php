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
                        Status: {{ $order->status  }}
                    </div>
                    <div class="alert alert-info">
                        Returned Order ID: {{ $order->phone->returnedOrderId }}
                    </div>
                    <div class="alert alert-info">
                        Registered by: {{ $order->user->name }}
                    </div>
                    @if($order->status == 'sold')
                        <div class="alert alert-info">
                            Sold Order ID: {{ $order->soldOrderId }}
                        </div>
                    @endif
                </div>
            </div>
                <form method="post" action="/orders/{{ $order->id }}">
                    <input type="hidden" name="_method" value="DELETE">
                    <button id="show_details" type="button" class="btn btn-primary">Show Details</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>

        </div>
        <div id="phone_details" class="col-lg-6" style="display: none;">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Phone Details
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <a href="/phones/{{ $order->phone->id }}">Phone details</a>
                    @foreach($order->phone->photos as $photo)
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
    <script>
        $(document).ready(function(){
            $('#show_details').click(function() {
                $('#phone_details').toggle();
                if($(this).text() == 'Show Details'){
                    $(this).text('Hide Details');
                } else {
                    $(this).text('Show Details');
                }
            })
        })
    </script>

@endsection
