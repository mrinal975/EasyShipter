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
            @foreach($products as $product)
            <div class="" style="padding: 5px">
                <div class="card card-padding">
                    <div class="row ">
                        <div class="col-md-4">
                            <img src="{{asset($product->image)}}" class="image-card">
                        </div>
                        <div class="col-md-8 ">
                            <div class="card-block">
                                <h4 class="card-title color">{{$product->name}}</h4>
                                <p class="card-text color"><?php echo str_limit($product->shortDescriptoin,75);?></p>
                                <p class="card-text color"><?php echo str_limit($product->longDescriptoin,86);?></p>
                                <p class="card-text color">Full Day Rent :{{$product->fullDayRent}} ৳</p>
                                <p class="card-text color">Half Day Rent :{{$product->halfDayRent}} ৳</p>
                                <br>
                                <a href="{{url('/orderProduct/'.$product->id)}}" class="btn btn-primary color">Order Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                @endforeach
            <br>
                @if ($products->lastPage() > 1)
                    <ul class="pagination pull-right">
                        <li class="{{ ($products->currentPage() == 1) ? ' disabled' : '' }}">
                            <a href="{{ $products->url(1) }}">Previous</a>
                        </li>
                        @for ($i = 1; $i <= $products->lastPage(); $i++)
                            <li class="{{ ($products->currentPage() == $i) ? ' active' : '' }}">
                                <a href="{{ $products->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor
                        <li class="{{ ($products->currentPage() == $products->lastPage()) ? ' disabled' : '' }}">
                            <a href="{{ $products->url($products->currentPage()+1) }}" >Next</a>
                        </li>
                    </ul>
                @endif
        </div>
        </div>
    </section>



@endsection
