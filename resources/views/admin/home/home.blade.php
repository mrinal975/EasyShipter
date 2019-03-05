@extends('admin.master')
@section('rootcontent')
    <section class="wrapper">
        <!-- //market-->
        <div class="market-updates">
            <a href="#">
            <div class="col-md-3 market-update-gd">
                <div class="market-update-block clr-block-2">
                    <div class="col-md-4 market-update-right">
                        <i class="fa fa-eye"> </i>
                    </div>
                    <div class="col-md-8 market-update-left">
                        <h4>Products</h4>
                        <h3>12</h3>
                        <p>Other hand, we denounce</p>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
            </a>
            <div class="col-md-3 market-update-gd">
                <div class="market-update-block clr-block-1">
                    <div class="col-md-4 market-update-right">
                        <i class="fa fa-users" ></i>
                    </div>
                    <div class="col-md-8 market-update-left">
                        <h4>Users</h4>
                        <h3>11</h3>
                        <p>Other hand, we denounce</p>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
            <a href="">
            <div class="col-md-3 market-update-gd">
            <div class="market-update-block clr-block-3">
                <div class="col-md-4 market-update-right">
                    <i class="fa fa-usd"></i>
                </div>
                <div class="col-md-8 market-update-left">
                    <h4> Precription</h4>
                    <h3>14</h3>
                    <p>New Unseen Prescription</p>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
            </a>
            <a href="3">
                <div class="col-md-3 market-update-gd">
                    <div class="market-update-block clr-block-3">
                        <div class="col-md-4 market-update-right">
                            <i class="fa fa-usd"></i>
                        </div>
                        <div class="col-md-8 market-update-left">
                            <h4>Sales</h4>
                            <h3>12</h3>
                            <p>Overall sell over here </p>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>
            </a>
            <div class="clearfix"> </div>
            <div class="clearfix"> </div>
        </div>
        <div class="market-updates">
            <a href="#">
            <div class="col-md-3 market-update-gd">
                <div class="market-update-block clr-block-4">
                    <div class="col-md-4 market-update-right">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    </div>
                    <div class="col-md-8 market-update-left">
                        <h4>Orders</h4>
                        <h3>11</h3>
                        <p>New Orders</p>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
            </a>
            <div class="clearfix"> </div>

        </div>
        <!-- //market-->
        <div class="row">
            <div class="panel-body">
            
            </div>
        </div>
        <div class="agil-info-calendar">
            <!-- calendar -->
            <div class="col-md-3"></div>
            <div class="col-md-6 agile-calendar">
                <div class="calendar-widget">
                    <div class="panel-heading ui-sortable-handle">
					<span class="panel-icon">
                      <i class="fa fa-calendar-o"></i>
                    </span>
                        <span class="panel-title"> Calendar Widget</span>
                    </div>
                    <!-- grids -->
                    <div class="agile-calendar-grid">
                        <div class="page">

                            <div class="w3l-calendar-left">
                                <div class="calendar-heading">

                                </div>
                                <div class="monthly" id="mycalendar"></div>
                            </div>

                            <div class="clearfix"> </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
            <!-- //calendar --> 
            <div class="clearfix"> </div>
        </div>
        <!-- tasks -->
    
        <!-- //tasks -->
    </section>
    @endsection
