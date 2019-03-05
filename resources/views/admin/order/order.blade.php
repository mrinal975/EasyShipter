@extends('admin.master')
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
                    <h3 class="text-center">Manage Product</h3>
                    <br><br>
                    <div class="well">

                        <h3 class="text-center text-success">{{Session::get('message')}}</h3>
                        <br>
                        <div class="overflowprotect">
                            <table class="table vcctable-hover table-bordered class_to_style" id="exampleProduct">
                                <thead>
                                <tr>
                                    <th class="text-center">Customer Name</th>
                                    <th class="text-center">Customer Phone</th>
                                    <th class="text-center">Vehicle Name</th>
                                    <th class="text-center">Vehicle Code</th>
                                    <th class="text-center">Owner Name</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th class="text-center">Customer Name</th>
                                    <th class="text-center">Customer Phone</th>
                                    <th class="text-center">Vehicle Name</th>
                                    <th class="text-center">Vehicle Code</th>
                                    <th class="text-center">Owner Name</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>

                    </div>
                </div>

            </div>
        </div>
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Modal Header</h4>
                    </div>
                    <div class="modal-body">
                        <p>Some text in the modal.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
                "url":"<?= route('OrderProcessingVehicle') ?>",
                "dataType":"json",
                "type":"POST",
                "data":{"_token":"<?= csrf_token() ?>"}
            },
            "columns":[
                {"data":"cutomerName"},
                {"data":"phone"},
                {"data":"VehicleName"},
                {"data":"VehicleCode"},
                {"data":"ownerName"},
                {"data":"action","searchable":false,"orderable":false}
            ]
        } );
    </script>
@endsection
