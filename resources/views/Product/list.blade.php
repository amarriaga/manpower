@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-md-11">
            <h1 class="text-center">
                Products list
            </h1>
        </div>
        <div class="col-md-1">
            <a href="{{asset('products/add')}}" class="btn btn-success">
                New <i class="fas fa-plus"></i>
            </a>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">category</th>
                <th scope="col">options</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $item)
                <tr>
                    <th scope="row">{{$item->id}}</th>
                    <td>{{$item->name}}</td>
                    <td>{{$item->category->name}}</td>
                    <td>
                        <form action="{{ asset('products')}}" method="POST" onsubmit="return confirm('Are you sure?')">
                            @method("DELETE")
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{$item->id}}">
                            <a href="{{asset('products/'.$item->id)}}" class="btn btn-info btn-sm">Edit</a>
                            <button  class="btn btn-danger btn-sm" type="submit" >
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>                
            @endforeach
        </tbody>
    </table>
@endsection