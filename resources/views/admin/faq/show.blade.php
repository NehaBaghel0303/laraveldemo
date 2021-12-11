@extends('backend.layout.app')
@section('section')
    <div class="container mt-5">
        Name:{{$faq->name}}
        description:{{$faq->description}}
        
    </div>

@endsection