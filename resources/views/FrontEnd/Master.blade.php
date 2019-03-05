<!DOCTYPE html>
<html>
<head>
    <title> @yield('title')</title>
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Car Rental Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <!-- //for-mobile-apps -->
    <link href="{{asset('Extra/css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{asset('Extra/css/galleryeffect.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" hSAY HELLOref="{{asset('Extra/css/jquery.flipster.css')}}">
    <link rel='stylesheet' href='{{asset('Extra/css/dscountdown.css')}}' type='text/css' media='all' />
    <link href="{{asset('Extra/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{asset('Extra/css/font-awesome.css')}}" rel="stylesheet">
    @yield('css')
    @yield('js')
</head>
<body>
@include('FrontEnd.include.header')
<!-- bootstrap-pop-up -->
<div class="modal video-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <section>
                <div class="modal-body">
                    <h3 class="agileinfo_sign">BEFRIEND</h3>
                    <img src="{{asset('Extra/images/g1.jpg')}}" alt=" " class="img-responsive" />
                    <p>Ut enim ad minima veniam, quis nostrum
                        exercitationem ullam corporis suscipit laboriosam,
                        nisi ut aliquid ex ea commodi consequatur.
                        <i>" Quis autem vel eum iure reprehenderit qui in ea voluptate velit .</i></p>
                </div>
            </section>
        </div>
    </div>
</div>
<!-- //bootstrap-pop-up -->

<!--//service-section-->
<div class="services" id="service">
    <div class="container">
        <div class="wthree_title_agile">
            <h3> Today <span>SPECIAL</span>  DEALS </h3>
        </div>
        <p class="sub_para">It’s time to shift</p>
        <div class="inner_w3l_agile_grids">
            <div class="col-md-4 agileits_service_grid_btm_left">
                <a href="ViewProduct/1" >
                <div class="agileits_service_grid_btm_left1" style="cursor: pointer !important">

                    <div class="agileits_service_grid_btm_left2">
                        <h5>Small</h5>
                        <p>Small size track</p>

                    </div>
                    <img src="{{asset('Extra/images/s3.jpg')}}" alt=" " class="img-responsive">

                </div>
                </a>
            </div>
            <div class="col-md-4 agileits_service_grid_btm_left">
                <a href="ViewProduct/2" >
                <div class="agileits_service_grid_btm_left1" style="cursor: pointer !important;">

                    <div class="agileits_service_grid_btm_left2" >
                        <h5>Medium</h5>
                        <p>Medium size track</p>
                    </div>

                    <img src="{{asset('Extra/images/s5.jpg')}}" alt=" " class="img-responsive">
                </div>
                </a>
            </div>
            <div class="col-md-4 agileits_service_grid_btm_left">
                <a href="ViewProduct/3" >
                <div class="agileits_service_grid_btm_left1" style="cursor: pointer !important">

                    <div class="agileits_service_grid_btm_left2" >
                        <h5>Large</h5>

                        <p>Large size track</p>
                    </div>

                    <img src="{{asset('Extra/images/s1.jpg')}}" alt=" " class="img-responsive">
                </div>
                </a>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!--//service-section-->
<!-- about -->
<div class="about" id="about">
    <div class="container">
        <div class="wthree_title_agile two">
            <h3>About <span>Us</span></h3>
        </div>
        <p class="sub_para two">It’s time to Shift</p>
        <div class="inner_w3l_agile_grids">
            <div class="col-md-6 about-left-w3layouts">
                <h6 class="sub">WELCOME TO OUR Rental Car</h6>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, rds which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
            </div>
            <div class="col-md-6 about-right-w3layouts">
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!--about--->

<div class="lb-overlay" id="image-1">
    <img src="{{asset('Extra/images/g1.jpg')}}" alt="image1" />
    <div class="gal-info">
        <h3>Car Rental</h3>
        <p>Neque porro quisquam est, qui dolorem ipsum
            quia dolor sit amet, consectetur, adipisci velit,
            sed quia non numquam eius modi tempora incidunt ut
            labore et dolore magnam aliquam quaerat voluptatem.</p>
    </div>
    <a href="index.html" class="lb-close">Close</a>
</div>
<div class="lb-overlay" id="image-2">
    <img src="{{asset('Extra/images/g2.jpg')}}" alt="image1" />
    <div class="gal-info">
        <h3>Car Rental</h3>
        <p>Neque porro quisquam est, qui dolorem ipsum
            quia dolor sit amet, consectetur, adipisci velit,
            sed quia non numquam eius modi tempora incidunt ut
            labore et dolore magnam aliquam quaerat voluptatem.</p>
    </div>
    <a href="index.html" class="lb-close">Close</a>
</div>
<div class="lb-overlay" id="image-3">
    <img src="{{asset('Extra/images/g3.jpg')}}" alt="image1" />
    <div class="gal-info">
        <h3>Car Rental</h3>
        <p>Neque porro quisquam est, qui dolorem ipsum
            quia dolor sit amet, consectetur, adipisci velit,
            sed quia non numquam eius modi tempora incidunt ut
            labore et dolore magnam aliquam quaerat voluptatem.</p>
    </div>
    <a href="index.html" class="lb-close">Close</a>
</div>
<div class="lb-overlay" id="image-4">
    <img src="{{asset('Extra/images/g4.jpg')}}" alt="image1" />
    <div class="gal-info">
        <h3>Car Rental</h3>
        <p>Neque porro quisquam est, qui dolorem ipsum
            quia dolor sit amet, consectetur, adipisci velit,
            sed quia non numquam eius modi tempora incidunt ut
            labore et dolore magnam aliquam quaerat voluptatem.</p>
    </div>
    <a href="index.html" class="lb-close">Close</a>
</div>
<div class="lb-overlay" id="image-5">
    <img src="{{asset('Extra/images/g5.jpg')}}" alt="image1" />
    <div class="gal-info">
        <h3>Car Rental</h3>
        <p>Neque porro quisquam est, qui dolorem ipsum
            quia dolor sit amet, consectetur, adipisci velit,
            sed quia non numquam eius modi tempora incidunt ut
            labore et dolore magnam aliquam quaerat voluptatem.</p>
    </div>
    <a href="index.html" class="lb-close">Close</a>
</div>
<div class="lb-overlay" id="image-6">
    <img src="{{asset('Extra/images/g6.jpg')}}" alt="image1" />
    <div class="gal-info">
        <h3>Car Rental</h3>
        <p>Neque porro quisquam est, qui dolorem ipsum
            quia dolor sit amet, consectetur, adipisci velit,
            sed quia non numquam eius modi tempora incidunt ut
            labore et dolore magnam aliquam quaerat voluptatem.</p>
    </div>
    <a href="index.html" class="lb-close">Close</a>
</div>
<div class="lb-overlay" id="image-7">
    <img src="{{asset('Extra/images/g7.jpg')}}" alt="image1" />
    <div class="gal-info">
        <h3>Car Rental</h3>
        <p>Neque porro quisquam est, qui dolorem ipsum
            quia dolor sit amet, consectetur, adipisci velit,
            sed quia non numquam eius modi tempora incidunt ut
            labore et dolore magnam aliquam quaerat voluptatem.</p>
    </div>
    <a href="index.html" class="lb-close">Close</a>
</div>
<div class="lb-overlay" id="image-8">
    <img src="images/g8.jpg" alt="image1" />
    <div class="gal-info">
        <h3>Car Rental</h3>
        <p>Neque porro quisquam est, qui dolorem ipsum
            quia dolor sit amet, consectetur, adipisci velit,
            sed quia non numquam eius modi tempora incidunt ut
            labore et dolore magnam aliquam quaerat voluptatem.</p>
    </div>
    <a href="index.html" class="lb-close">Close</a>
</div>
<!-- gallery -->

<br>
<br><br><br><br><br>
<!-- /contact -->
<div class="map-w3ls">
    <div class="wthree_title_agile">
        <h3> Contact <span>Us</span>  </h3>
    </div>
    <p class="sub_para">It’s time to shift</p>
    <div class="contact-agile" id="contact">
        <div class="contact-middle">
            <h4>Say Hello</h4>
            {!! Form::open(['url'=>'messageSubmit','method'=>'POST','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}
                <div class="form-agileinfo">
                    <div class="input-w3ls">
                        <p>Your Name</p>
                        <input type="text" name="name" placeholder="" required="" />
                        @if ($errors->has('name'))
                            <span class="help-block">
                                    <strong class="text-danger">{{ $errors->first('name') }}</strong>
                                </span>
                        @endif
                    </div>
                    <div class="input-w3ls">
                        <p>Your Email</p>
                        <input type="email" name="email" placeholder="" required="" />
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong class="text-danger">{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-agileits-w3layouts">
                    <p>Your Comments</p>
                    <textarea  name="message" placeholder="" required="" ></textarea>
                    @if ($errors->has('message'))
                        <span class="help-block">
                            <strong class="text-danger">{{ $errors->first('message') }}</strong>
                        </span>
                    @endif
                    <input type="submit"   value="Send message">
                </div>
                <div class="clearfix"></div>
            {!! Form::close() !!}
        </div>
        <div class="contact-left">
            <h6>Longford,UK</h6>
            <p>+00 338 505 1221</p>
            <p>Inner Ring W, Hounslow TW6 1BP, UK</p>
            <p><a href="mailto:info@example.com">mail@example.com</a></p>
            <h6>Opening Hours</h6>
            <p>Monday-Friday</p>
            <span>7.00AM-10.00PM</span>
            ​<p>Saturday-Sunday</p>
            ​<span>7.00AM-8.00PM</span>
        </div>

    </div>
</div>


<!-- //contact -->
    @include('FrontEnd.include.footer')

<!-- js -->
<script type="text/javascript" src="{{asset('Extra/js/jquery-2.1.4.min.js')}}"></script>
<!--scripts-->
<!-- Counter required files -->
<script type="text/javascript" src="{{asset('Extra/js/dscountdown.min.js')}}"></script>
<script src="{{asset('Extra/js/demo-1.js')}}"></script>
<script>
    jQuery(document).ready(function($){
        $('.demo2').dsCountDown({
            endDate: new Date("December 24, 2020 23:59:00"),
            theme: 'black'
        });
    });
</script>
<!-- //Counter required files -->

<!--//scripts-->
<script type="text/javascript" src="{{asset('Extra/js/move-top.js')}}"></script>
<script type="text/javascript" src="{{asset('Extra/js/easing.js')}}"></script>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $(".scroll").click(function(event){
            event.preventDefault();
            $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
        });
    });
</script>
<!-- start-smoth-scrolling -->
<!--banner Slider starts Here-->
<script src="{{asset('Extra/js/responsiveslides.min.js')}}"></script>
<script>
    // You can also use "$(window).load(function() {"
    $(function () {
        // Slideshow 4
        $("#slider3").responsiveSlides({
            auto: true,
            pager:true,
            nav:false,
            speed: 500,
            namespace: "callbacks",
            before: function () {
                $('.events').append("<li>before event fired.</li>");
            },
            after: function () {
                $('.events').append("<li>after event fired.</li>");
            }
        });

    });
</script>
<script src="{{asset('Extra/js/modernizr.custom.js')}}"></script>


<script src="{{asset('Extra/js/jquery.flipster.js')}}"></script>
<script>

    $(function(){ $(".flipster").flipster({ style: 'carousel', start: 0 }); });


</script>
<!--banner Slider starts Here-->
<!-- required-js-files-->
<link href="{{asset('Extra/css/owl.carousel.css')}}" rel="stylesheet">
<script src="{{asset('Extra/js/owl.carousel.js')}}"></script>
<script>
    $(document).ready(function() {
        $("#owl-demo").owlCarousel({
            items :5,
            itemsDesktop : [768,4],
            itemsDesktopSmall : [414,3],
            lazyLoad : true,
            autoPlay : true,
            navigation :true,

            navigationText :  false,
            pagination :false,

        });

    });
</script>
<!--//required-js-files-->
<!-- smooth scrolling -->
<script type="text/javascript">
    $(document).ready(function() {
        /*
            var defaults = {
            containerID: 'toTop', // fading element id
            containerHoverID: 'toTopHover', // fading element hover id
            scrollSpeed: 1200,
            easingType: 'linear'
            };
        */
        $().UItoTop({ easingType: 'easeOutQuart' });
    });
</script>
<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!-- //smooth scrolling -->
<script type="text/javascript" src="{{asset('Extra/js/bootstrap.js')}}"></script>
</body>
</html>
