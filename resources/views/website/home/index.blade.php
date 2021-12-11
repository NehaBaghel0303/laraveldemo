@extends('website.layout.main')
@push('scopedCss')
    <style>
        .hidden {
	display: none;
}
    </style>
@endpush
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
            <div class="animation-div"></div>
        <div class="work-together">
            <div class="work-content text-white">
                <h2 class="font-weight-bold">Lets work together</h2>
                <p>how do you take your coffee?</p>
                <ul class="list-unstyled d-lg-flex footer-items">
                    <li><a href=""><i class="fa fa-facebook"> </i> facebook</a></li>
                    <li><a href=""><i class="fa fa-github"> </i> Github</a></li>
                    <li><a href=""><i class="fa fa-twitter"> </i> Twitter</a></li>
                    <li><a href=""><i class="fa fa-envelope"> </i> Mail</a></li>
                    <li><a href=""><i class="fa fa-phone"> </i>Call</a></li>
                    <li><a href=""><i class="fa fa-linkedin"> </i> linkedin</a></li>
                </ul>
               
            </div>
        </div>
        <button onclick="this.innerHTML=Date()">The time is?</button>   
        <p></p>   
    </div>
    <div class="container">
        <input type="text" class="form-control mb-3" placeholder="Serach..." data-search>
        <div class="items">
            <div data-filter-item data-filter-name="apple">Apple</div>
            <div data-filter-item data-filter-name="google">Google</div>
            <div data-filter-item data-filter-name="microsoft">Microsoft</div>
            <div data-filter-item data-filter-name="hp">HP</div>
            <div data-filter-item data-filter-name="dell">Dell</div>
            <div data-filter-item data-filter-name="samsung">Samsung</div>
        </div>
    </div>
@endsection

@push('scopedJs')
    <script>
        $('[data-search]').on('keyup', function() {
            var searchVal = $(this).val();
            var filterItems = $('[data-filter-item]');

            if ( searchVal != '' ) {
                filterItems.addClass('hidden');
                $('[data-filter-item][data-filter-name*="' + searchVal.toLowerCase() + '"]').removeClass('hidden');
            } else {
                filterItems.removeClass('hidden');
            }
});
    </script>
@endpush