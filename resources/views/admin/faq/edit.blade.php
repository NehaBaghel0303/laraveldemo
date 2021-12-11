@extends('backend.layout.app')
@section('section')

    <div class="container mt-3">
        <form action="{{route('faq.update',$faq->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" placeholder="Enter Name" name="name" value="{{$faq->name}}">
            </div>
            <div class="form-group">
                <label for="">Description</label>
                <textarea name="description" id="" cols="30" rows="10" class="form-control">{{$faq->description}}</textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>

@endsection