@extends('FrontEnd.Owner.master')
@section('rootcontent')
    <section class="wrapper">
        <!-- //market-->
        <div class="market-updates">

            <a href="{{url('/product/manage')}}">
            <div class="col-md-3 market-update-gd">
                <div class="market-update-block clr-block-3">
                    <div class="col-md-4 market-update-right">
                        <i class="fa fa-usd"></i>
                    </div>
                    <div class="col-md-8 market-update-left">
                        <h4> Vehicle</h4>
                        <h3>{{$ProductCount}}</h3>
                        <p>Total Vehicle</p>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
            </a>
            <a href="{{url('/ViewNewOrder')}}">
                <div class="col-md-3 market-update-gd">
                    <div class="market-update-block clr-block-3">
                        <div class="col-md-4 market-update-right">
                            <i class="fa fa-usd"></i>
                        </div>
                        <div class="col-md-8 market-update-left">
                            <h4> New Order</h4>
                            <h3>{{$NewOrnerCount}}</h3>
                            <p>New Unseen Order</p>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>
            </a>
            <div class="clearfix"> </div>
            <div class="clearfix"> </div>
        </div>
        <!-- //market-->

        <!-- //tasks -->
    </section>
    @endsection
