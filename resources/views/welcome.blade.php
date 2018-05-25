@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row row-continue">
            <div class="jumbotron jumbotron-continue" style="background-image: url('img/telemedicine.png'); background-repeat: no-repeat; background-size: cover; height: 80vh;">
                <div class="container" style="background-color: rgba(0,0,0,0.1); padding: 5%">
                    <h1>WoundCare</h1>
                    <p>Telemedicine system for monitoring chronic wound, Specifically designed to help both physicians and patients more comfortable.</p>
                    <p><a class="btn btn-success">Learn more</a></p>
                </div>
            </div>
        </div>
        <div class="row row-continue">
            <div class="jumbotron jumbotron-continue" style="height: 80vh;background-color: #ffffff">
                <div class="container">
                    <div class="col-md-8">
                        <img src="{{ url('/img/elderly-happy.jpg') }}" class="img-responsive" alt="">
                    </div>
                    <div class="col-md-4">
                        <h1>Take Care</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                        <small>Someone famous in <cite title="Source Title">Source Title</cite></small>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="height: 65vh;padding-top: 3%;background-color: #EEEEEE">
            <div class="container">
                <div class="col-md-4" style="border-right: 1px dashed">
                    <h1>Accessible</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                    <small>Someone famous in <cite title="Source Title">Source Title</cite></small>
                </div>
                <div class="col-md-4" style="border-right: 1px dashed">
                    <h1>Secure</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                    <small>Someone famous in <cite title="Source Title">Source Title</cite></small>
                </div>
                <div class="col-md-4" style="border-right: 1px dashed">
                    <h1>Open Source</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                    <small>Someone famous in <cite title="Source Title">Source Title</cite></small>
                </div>
            </div>
        </div>

        <div class="row row-continue">
            <div class="jumbotron jumbotron-continue text-center" style="height: 30vh;background-color: #ffffff">
                <div class="container">
                    <div class="col-md-12">
                        © 2018 WoundCare Ltd. WoundCare are registered trademarks of WoundCare Ltd.
                    </div>

                    <div class="col-md-8 col-md-offset-2">
                        <hr>
                    </div>
                    <div class="col-md-12">
                        <span class="fa-stack fa-lg">
                            <i class="fa fa-circle fa-stack-2x"></i>
                            <i class="fa fa-facebook fa-stack-1x fa-inverse" aria-hidden="true"></i>
                        </span>

                        <span class="fa-stack fa-lg">
                            <i class="fa fa-circle fa-stack-2x"></i>
                            <i class="fa fa-twitter fa-stack-1x fa-inverse" aria-hidden="true"></i>
                        </span>

                        <span class="fa-stack fa-lg">
                            <i class="fa fa-circle fa-stack-2x"></i>
                            <i class="fa fa-github fa-stack-1x fa-inverse" aria-hidden="true"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection