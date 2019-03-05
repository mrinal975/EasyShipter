@extends('admin.master')
@section('rootcontent')
    <section class="wrapper">
        <!-- //market-->
        <div class="market-updates">
            <br>
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="text-center">View Product</h3>
                    <br><br>
                    <div class="well">

                        <h3 class="text-center text-success">{{Session::get('message')}}</h3>
                        <br>
                            <table class="table table-hover table-bordered">
                                <tr>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">{{$data->name}}</th>
                                </tr>
                                <tr>
                                    <th class="text-center">email</th>
                                    <th class="text-center">{{$data->email}}</th>
                                </tr>
                                <tr>
                                    <th class="text-center">Message </th>
                                    <th class="text-center">{{$data->message}}</th>
                                </tr>
                            </table>
                        <br>
                        <div class="text-center">
                        <a class="btn btn-info btn-md" href="{{url('admin/UserMessage')}}">Back</a>
                        </div>
                        </div>
                </div>

            </div>
        </div>
    </section>
@endsection
