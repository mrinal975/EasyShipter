@extends('FrontEnd.Owner.master')
@section('css')
    <!-- Fonts -->
    <link href="{{asset('fonts.googleapis.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('bootstrap.min.css')}}">
@endsection
@section('rootcontent')
    <section class="wrapper">
        <!-- //market-->
        <div class="market-updates">
            <br>
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="text-center">New Order</h3>
                    <br><br>
                    <div class="well">
                        <h3 class="text-center text-success">{{Session::get('message')}}</h3>
                        <br>
                        <div class="overflowprotect">
                            <table class="table vcctable-hover table-bordered class_to_style" id="exampleProduct">
                                <thead>
                                <tr>
                                    <th class="text-center">Product Code</th>
                                    <th class="text-center">Product Name</th>
                                    <th class="text-center">Customer Name</th>
                                    <th class="text-center">Rent type</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th class="text-center">Product Code</th>
                                    <th class="text-center">Product Name</th>
                                    <th class="text-center">Customer Name</th>
                                    <th class="text-center">Rent type</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
@section('js')
    <script src="{{asset('jquery-1.12.4.js')}}"></script>
    <script src="{{asset('jquery.dataTables.min.js')}}"></script>
    <script>
        $('#exampleProduct').DataTable( {
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url":"<?= route('dataProcessingAllOrder') ?>",
                "dataType":"json",
                "type":"POST",
                "data":{"_token":"<?= csrf_token() ?>"}
            },
            "columns":[
                {"data":"productCode"},
                {"data":"productName"},
                {"data":"CustomerName"},
                {"data":"type"},
                {"data":"action","searchable":false,"orderable":false}
            ]
        } );
    </script>
@endsection

