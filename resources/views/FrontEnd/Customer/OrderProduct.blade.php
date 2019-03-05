@extends('FrontEnd.Master')
@section('css')
    <link rel='stylesheet' href='{{asset('Extra/css/custom.css')}}' type='text/css' media='all' />
    {{--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">--}}
@endsection
@section('js')
@endsection
@section('MainContent')
    <br>
    <section>
        <div class="container">
            {!! Form::open(['url'=>'storeOrderProduct','method'=>'POST','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}

            <div class="row">
                <br><br>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Address" class="col-sm-4 control-label color">Address</label>
                        <div class="col-sm-5">
                            <input name="Address" type="text" class="form-control" placeholder="District/thana/zip/road">
                            @if ($errors->has('Address'))
                                <span class="help-block">
                                    <strong class="text-danger">{{ $errors->first('Address') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-sm-3"></div>
                    </div>
                    <div class="form-group">
                        <label for="rentType" class="col-sm-4 control-label color">Rent Type</label>
                        <div class="col-sm-5">
                            <select class="form-control" name="rentType">
                                <option value="full">Rent for full day</option>
                                <option value="half">Rent for half day</option>
                            </select>
                        </div>
                        <div class="col-sm-3"></div>
                    </div>
                    <div class="form-group ">
                        <label for="phone" class="col-sm-4 control-label color">Phone number</label>
                        <div class="col-sm-5 {{ $errors->has('phone') ? ' has-error' : '' }}">
                            <input type="number" min="0" class="form-control" name="phone" placeholder="01xxxxxxxxx">
                            @if ($errors->has('phone'))
                                <span class="help-block">
                                    <strong class="text-danger">{{ $errors->first('phone') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-sm-3"></div>
                    </div>

                </div>
                {{--date & Time--}}
                <div class="col-md-6">
                    <div class="form-group ">
                        <label for="productBought" class="col-sm-4 control-label color">Rent Date</label>
                        <div class="col-sm-5 {{ $errors->has('date') ? ' has-error' : '' }}">
                            <input type="date" min="0" class="form-control" name="date">
                            @if ($errors->has('date'))
                                <span class="help-block">
                                    <strong class="text-danger">{{ $errors->first('date') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-sm-3"></div>
                    </div>
                    <div class="form-group ">
                        <label for="productBought" class="col-sm-4 control-label color">Rent Time</label>
                        <div class="col-sm-5 {{ $errors->has('time') ? ' has-error' : '' }}">
                            <input type="time" min="0" class="form-control" name="time">
                            @if ($errors->has('time'))
                                <span class="help-block">
                                    <strong class="text-danger">{{ $errors->first('time') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-sm-3"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5"></div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-success btn-block">Order Product</button>
                </div>
                <div class="col-md-3"></div>
            </div>
            {!! Form::close() !!}
        </div>
    </section>



@endsection
