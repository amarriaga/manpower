@extends('layouts.app')


@section('content')
    <h1 class="text-center">New Category</h1>
    <form method="POST" action="{{asset('categories')}}">
        {{ csrf_field() }}
        
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" placeholder="Category Name" name="name" required>
                @if ($errors->first('name'))
                    <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                @endif
            </div>
            
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection