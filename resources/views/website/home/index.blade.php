@extends('website.layout.main')
@section('content')
    <div class="section">
        <section id="hero-section">
            <div class="hero-text">
                <h2>Hey I am Mimic</h2>
                <span>A web developer</span>
            </div>
        </section>
        <section class="project-section">
            <div class="container">
                <h3>There are some of my projects</h3>
                <div class="row justify-content-center mb-4">
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-lg-0 mb-3">
                        <div class="card border-0">
                            <img src="{{asset('assets/images/calculator.jpeg')}}" alt="">
                            <div class="card-body text-center bg-dark">
                                <h6 class="text-white">Tribute Page</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-lg-0 mb-3">
                        <div class="card border-0">
                            <img src="{{asset('assets/images/success.jpeg')}}" alt="">
                            <div class="card-body text-center bg-dark">
                                <h6 class="text-white">Random Quote Machine</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-lg-0 mb-3">
                        <div class="card border-0">
                            <img src="{{asset('assets/images/calculator.jpeg')}}" alt="">
                            <div class="card-body text-center bg-dark">
                                <h6 class="text-white">Javascript Calculator</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-lg-0 mb-3">
                        <div class="card border-0">
                            <img src="{{asset('assets/images/calculator.jpeg')}}" alt="">
                            <div class="card-body text-center bg-dark">
                                <h6 class="text-white">Map data access the globe</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-lg-0 mb-3">
                        <div class="card border-0">
                            <img src="{{asset('assets/images/calculator.jpeg')}}" alt="">
                            <div class="card-body text-center bg-dark">
                                <h6 class="text-white">Wikipedia Viewer</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-lg-0 mb-3">
                        <div class="card border-0">
                            <img src="{{asset('assets/images/board.jpeg')}}" alt="">
                            <div class="card-body text-center bg-dark">
                                <h6 class="text-white">Tic Tac Toe</h6>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <a href="" class="btn btn-sm show-all">Show all <i class="fas fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
        </section>
        <div class="work-together">
            <div class="work-content text-white">
                <h2 class="font-weight-bold">Lets work together</h2>
                <p>how do you take your coffee?</p>
                <ul class="list-unstyled d-flex footer-items">
                    <li><a href=""><i class="fa fa-facebook"> </i> facebook</a></li>
                    <li><a href=""><i class="fa fa-facebook"> </i> Github</a></li>
                    <li><a href=""><i class="fa fa-facebook"> </i> Twitter</a></li>
                    <li><a href=""><i class="fa fa-facebook"> </i> Send a mail</a></li>
                    <li><a href=""><i class="fa fa-facebook"> </i> Call me</a></li>
                </ul>
               
            </div>
        </div>
      
    </div>
@endsection