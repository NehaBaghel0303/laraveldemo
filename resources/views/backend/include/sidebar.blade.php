@extends('backend.layout.app')
@section('section')
    <div class="row">
        <div class="col-lg-3 ">
            <div class="sidebar bg-dark">
                <div class="sidebar-menu">
                    <ul>
                        <li><a href="">Dashboard</a></li>
                        <li><a href="{{route('testimonial.index')}}">Testimonial</a></li>
                        <li><a href="{{route('faq.index')}}">Faq</a></li>
                    </ul>
                </div>
            </div> 
        </div>
    </div>
@endsection