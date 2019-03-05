@extends('FrontEnd.Owner.master')
@section('rootcontent')
    <section class="wrapper">
        <!-- //market-->
        <div class="market-updates">
            <br>
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="text-center">View Vehicle</h3>
                    <br><br>
                    <div class="well">

                        <h3 class="text-center text-success">{{Session::get('message')}}</h3>
                        <br>

                        <table class="table table-hover table-bordered">
                            <tr >
                                <th class="text-center">product Code</th>
                                <th class="text-center">{{$productById->productCode}}</th>
                            </tr>
                            <tr>
                                <th class="text-center">Product Name</th>
                                <th class="text-center">{{$productById->name}}</th>
                            </tr>
                            <tr>
                                <th class="text-center">Product Type</th>
                                <th class="text-center"><?php echo ucfirst($productById->type)?>
                                </th>
                            </tr>
                            <tr >
                                <th class="text-center">Full Day Rent</th>
                                <th class="text-center">{{$productById->fullDayRent}}</th>
                            </tr>
                            <tr>
                                <th class="text-center">Half Day Rent</th>
                                <th class="text-center">{{$productById->halfDayRent}}</th>
                            </tr>
                            <tr>
                                <th class="text-center">Product Short Description</th>
                                <th class="text-center"> {!! $productById->longDescriptoin !!}</th>
                            </tr>
                            <tr>
                                <th class="text-center"> <br> <br> <br> <br>Product Image</th>
                                <th class="text-center"> <img src="{{asset($productById->image)}}" alt="{{$productById->productImage}}" height="250" width="400" class=" img-thumbnail"></th>
                            </tr>
                        </table>
                        <h1 class="text-center" title="back"><a href="{{url('/product/manage')}}" class="btn btn-info"><i class="fa fa-chevron-circle-left"></i> Back</a></h1>

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
