@extends('FrontEnd.Owner.master')
@section('rootcontent')
    <section class="wrapper">
        <!-- //market-->
        <div class="market-updates">
            <br>
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="text-center">Add Vehicle</h3>
                    <br><br>
                    <div class="well">

                        <h3 class="text-center text-success">{{Session::get('message')}}</h3>
                        <br>
                        {!! Form::open(['url'=>'/product/store','method'=>'POST','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}

                            <div class="form-group">
                                <label for="name" class="col-sm-4 control-label">Name</label>
                                <div class="col-sm-5">
                                    <input name="name" type="text" class="form-control">
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                    <strong class="text-danger">{{ $errors->first('name') }}</strong>
                                </span>
                                    @endif
                                </div>
                                <div class="col-sm-3"></div>
                            </div>
                            <div class="form-group">
                            <label for="categoryId" class="col-sm-4 control-label">Type</label>
                            <div class="col-sm-5">
                                <select class="form-control" name="type">
                                        <option value="small">small</option>
                                        <option value="medium">Medium</option>
                                        <option value="large">Large</option>
                                </select>
                            </div>
                            <div class="col-sm-3"></div>
                        </div>
                        <div class="form-group ">
                            <label for="productBought" class="col-sm-4 control-label">Full Day Rent</label>
                            <div class="col-sm-5 {{ $errors->has('fullDayRent') ? ' has-error' : '' }}">
                                <input type="number" min="0" class="form-control" name="fullDayRent">
                                @if ($errors->has('fullDayRent'))
                                    <span class="help-block">
                                    <strong class="text-danger">{{ $errors->first('fullDayRent') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="col-sm-3"></div>
                        </div>
                        <div class="form-group ">
                            <label for="halfDayRent" class="col-sm-4 control-label">Half Day Rent</label>
                            <div class="col-sm-5 {{ $errors->has('halfDayRent') ? ' has-error' : '' }}">
                                <input type="number" min="0" class="form-control" name="halfDayRent">
                                @if ($errors->has('halfDayRent'))
                                    <span class="help-block">
                                <strong class="text-danger">{{ $errors->first('halfDayRent') }}</strong>
                            </span>
                                @endif
                            </div>
                            <div class="col-sm-3"></div>
                        </div>
                        <div class="form-group ">
                            <label for="imputEmail" class="col-sm-4 control-label">Product Quantity</label>
                            <div class="col-sm-5 {{ $errors->has('quantity') ? ' has-error' : '' }}">
                                <input type="number" min="1" class="form-control" name="quantity">

                                @if ($errors->has('quantity'))
                                    <span class="help-block">
                                  <strong class="text-danger">{{ $errors->first('quantity') }}</strong>
                            </span>
                                @endif
                            </div>
                            <div class="col-sm-3"></div>
                        </div>
                        <div class="form-group {{ $errors->has('shortDescriptoin') ? ' has-error' : '' }}">
                            <label for="shortDescriptoin" class="col-sm-4 control-label">Product Short Description</label>
                            <div class="col-sm-5">
                                <textarea class="form-control" name="shortDescriptoin" rows="8"></textarea>
                                @if ($errors->has('shortDescriptoin'))
                                    <span class="help-block">
                                <strong class="text-danger">{{ $errors->first('shortDescriptoin') }}</strong>
                            </span>
                                @endif
                            </div>
                            <div class="col-sm-3"></div>
                        </div>
                            <div class="form-group {{ $errors->has('longDescriptoin') ? ' has-error' : '' }}">
                                <label for="longDescriptoin" class="col-sm-4 control-label">Product Detail Description</label>
                                <div class="col-sm-5">
                                    <textarea class="form-control" name="longDescriptoin" rows="8"></textarea>
                                    @if ($errors->has('longDescriptoin'))
                                        <span class="help-block">
                                <strong class="text-danger">{{ $errors->first('productShortDescriptoin') }}</strong>
                            </span>
                                    @endif
                                </div>
                                <div class="col-sm-3"></div>
                            </div>

                        <div class="form-group {{ $errors->has('image') ? ' has-error' : '' }}">
                            <label for="image" class="col-sm-4 control-label">Product Image</label>
                            <div class="col-sm-5">
                                <input type="file" name="image" accept="image">
                                @if ($errors->has('image'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-sm-3"></div>
                        </div>
                        <br>
                        <div class="form-group">
                            <div class="col-sm-4"></div>
                            <div class="col-sm-5">
                                <button type="submit" class="btn btn-success btn-block">Save Product Info</button>
                            </div>
                            <div class="col-sm-3"></div>
                        </div>
                        {!! Form::close() !!}
                        {{--</form>--}}
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
