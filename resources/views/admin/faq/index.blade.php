@extends('backend.layout.app')
@section('section')
    <div class="container mt-5">
        <div class="pull-right float-right text-right mb-2">
            <a href="{{route('faq.create')}}" class="btn btn-success">Create</a>
        </div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($faq as $item)
                    <tr>
                        <th>{{$item->id}}</th>
                        <th>{{$item->name}}</th>
                        <th>{{$item->description}}</th>
                        <th>
                            <a href="{{route('faq.edit',$item->id)}}" class="btn btn-primary">Edit</a>
                            <a href="{{route('faq.delete',$item->id)}}" class="btn btn-danger">Delete</a>
                            <a href="{{route('faq.show',$item->id)}}" class="btn btn-danger">Show</a>
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection