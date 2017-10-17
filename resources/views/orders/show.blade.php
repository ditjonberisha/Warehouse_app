@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Order Details

                <div class="pull-right">
                    <form method="post" action="/orders/{{ $order->id }}">
                        {{ csrf_field() }}
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
                        <b>Status:</b> {{ $order->status  }}
                    </div>
                    <div class="">
                        <b>Returned Order ID:</b> {{ $order->phone->returnedOrderId }}
                    </div>
                    <div class="">
                        <b>Registered by:</b> {{ $order->user->name }}
                    </div>
                    @if($order->status == 'sold')
                        <div class="">
                            <b>Sold Order ID:</b> {{ $order->soldOrderId }}
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>

    <div class="row">
        <div id="phone_details" class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Phone Details
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="col-lg-12">
                        <div class="col-lg-6">
                            <b>Customer name:</b> {{ $order->phone->customer_name }}
                        </div>
                        <div class="col-lg-6">
                            <b>Customer email:</b> {{ $order->phone->customer_email }}.
                        </div>
                        <div class="col-lg-6">
                            <b>IMEI1:</b> {{ $order->phone->IMEI1 }}.
                        </div>
                        <div class="col-lg-6">
                            <b>IMEI2:</b> {{ $order->phone->IMEI2 }}.
                        </div>
                        <div class="col-lg-6">
                            <b>EAN:</b> {{ $order->phone->EAN }}.
                        </div>
                        <div class="col-lg-6">
                            <b>Condition:</b> {{ $order->phone->condition }}.
                        </div>
                        <div class="col-lg-6">
                            <b>Description:</b> {{ $order->phone->description }}.
                        </div>
                        <div class="col-lg-6">
                            <b>Shop:</b> {{ $order->phone->shop->name }}.
                        </div>
                        <div class="col-lg-6">
                            <b>Order ID:</b> {{ $order->phone->returnedOrderId }}.
                        </div>
                    </div>
                </div>
                <!-- .panel-body -->
            </div>
            <!-- /.panel -->
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    Photos
                </div>
                <div class="panel-body">
                    @if (count($order->phone->photos))
                        <div class="col-lg-offset-3 col-lg-6">
                            <div class="w3-content w3-display-container">
                    @foreach($order->phone->photos as $photo)
                        <img class="mySlides" style="border: 1px solid black; width: 100%;" src="{{ Storage::url($photo->path) }}">
                    @endforeach
                        <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
                        <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>


    <script>
        var slideIndex = 1;
        showDivs(slideIndex);

        function plusDivs(n) {
            showDivs(slideIndex += n);
        }

        function showDivs(n) {
            var i;
            var x = document.getElementsByClassName("mySlides");
            if (n > x.length) {slideIndex = 1}
            if (n < 1) {slideIndex = x.length}
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            x[slideIndex-1].style.display = "block";
        }
    </script>

@endsection
