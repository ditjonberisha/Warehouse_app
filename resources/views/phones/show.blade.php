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
                    @if (count($phone->photos))
                    <div class="col-lg-offset-3 col-lg-6">
                        <div class="w3-content w3-display-container">
                        @foreach($phone->photos as $photo)
                            <img class="mySlides" style="border: 1px solid black; width: 100%;" src="{{ Storage::url($photo->path) }}">
                        @endforeach
                            <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
                            <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
                        </div>
                    </div>
                    @endif
                </div>
                <!-- .panel-body -->
            </div>
            <!-- /.panel -->
        </div>
    </div>

    @include('partials._confirm', ['action'=>"/phones/$phone->id", 'model'=>'phone'])


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
