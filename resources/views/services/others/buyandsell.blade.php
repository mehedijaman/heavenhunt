@extends('layouts.app')

@section('content')

<!-- Sub banner start -->
<div class="sub-banner overview-bgi">
    <div class="overlay">
        <div class="container">
            <div class="breadcrumb-area">
                <h1>Buy & Sell Service</h1>
                <ul class="breadcrumbs">
                    <li><a href="/">Home</a></li>
                    <li class="active">Services</li>
                    <li class="active">Others</li>
                    <li class="active">Buy & Sell</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Sub Banner end -->

<!-- About city estate start -->
<div class="about-city-estate">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
               <img src="/img/properties/properties-3.jpg" alt="properties-3" class="img-responsive">
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="about-text">
                    <h3>Buy & Sell Service</h3>
                    <p>While you are going global we are here to deliver your homely touch at abroad. Convenient set up, state of the art facilities, prime locations and overall affordable price is what we can offer for you. Quality is something which only money cannot buy, caring matters. Whether it is for some overnight stay to yearlong we have the best packages to offer. Our personal touch, combined with an ideal selection of buildings and unmatched services and extras, make life easy for our guests who can just unpack their bags and leave the rest to us. You deserve a heavenly house in Bangladesh & we hunt it for you.</p>

                    <p>We have eight years national and internationally experienced team to support our expat with professional, trustworthy services which make sense & help our client to promote us. We love to say “DON’T TRUST US ONLY PLEASE TEST US” because we know the value of commitment & always try to feel the needs of our clients; they are our boss we are not. So let’s try once with us with your needs.</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <div class="contact-1 sidebar-widget">
                    <div class="main-title-2">
                        <h1> <span>Leave</span> a Message</h1>
                    </div>
                    <div class="contact-form">
                        <form id="contact_form" action="index.html" method="GET" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group fullname">
                                        <input type="text" name="full-name" class="input-text" placeholder="Full Name">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group enter-email">
                                        <input type="email" name="email" class="input-text" placeholder="Enter email">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group subject">
                                        <input type="text" name="subject" class="input-text" placeholder="Subject">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group number">
                                        <input type="text" name="phone" class="input-text" placeholder="Phone Number">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 clearfix">
                                    <div class="form-group message">
                                        <textarea class="input-text" name="message" placeholder="Write message"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group send-btn mb-0">
                                        <button type="submit" class="button-md button-theme">Send Message</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About city estate end -->

<div class="clearfix"></div>



<!-- Intro section strat -->
<div class="intro-section">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-sm-9 col-xs-12">
                <img src="/img/logos/logo.png" alt="logo-2">
                <h3>Looking To Sell Or Rent Your Property?</h3>
            </div>

            <div class="col-md-3 col-sm-3 col-xs-12">
                <a href="/contact" class="btn button-md button-theme">Message Now</a>
            </div>
        </div>
    </div>
</div>
<!-- Intro section end -->
@endsection