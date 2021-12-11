@extends('backend.layout.app')
@section('section')
    <div class="container mt-5">
        <div class="pull-right float-right text-right mb-2">
            <a href="{{route('testimonial.create')}}" class="btn btn-success">Create</a>
        </div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>Name</th>
                    <th>role</th>
                    <th>Created at</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($testimonials as $item)
                    <tr>
                            <th>{{$item->name}}</th>
                            <th>{{$item->role}}</th>
                            <th>{{$item->created_at}}</th>
                            <th>
                                <a href="{{route('testimonial.edit',$item->id)}}" class="btn btn-info">Edit</a>
                                <a href="" class="btn btn-danger">Delete</a>
                            </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection