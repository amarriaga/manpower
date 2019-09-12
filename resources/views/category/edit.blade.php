@extends('layouts.app')


@section('content')
    <h1 class="text-center">Edit Category</h1>
    <form method="POST" action="{{asset('categories')}}">
        @method('PUT')
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{$category->id}}">
        
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" placeholder="Product Name" name="name" required value="{{$category->name}}">
                @if ($errors->first('name'))
                    <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                @endif
            </div>
            
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection