@extends('backend.layout.app')
@section('section')
    <div class="container mt-3">
        <form action="{{route('testimonial.update',$testimonials->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" placeholder="Enter Name" name="name" value="{{$testimonials->name}}">
            </div>
            <div class="form-group">
                <label for="">Image</label>
                <input type="file" class="form-control" name="image">
            </div>
            <div class="form-group">
                <label for="">Role</label>
                <input type="text" class="form-control" placeholder="Enter Role" name="role" value="{{$testimonials->role}}">
            </div>
            <div class="form-group">
                <label for="">Description</label>
                <textarea name="description" id="" cols="30" rows="10" class="form-control">{{$testimonials->description}}</textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
@endsection