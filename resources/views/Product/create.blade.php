@extends('layouts.app')


@section('content')
    <h1 class="text-center">New Product</h1>
    <form method="POST" action="{{asset('products')}}">
        {{ csrf_field() }}
        <div class="form-group row">
            <label for="category_id" class="col-sm-2 col-form-label">Category</label>
            <div class="col-sm-10">
                <select id="category_id" class="form-control" name="category_id" class="@error('category_id') is-invalid @enderror" required>
                    @foreach ($categories as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" placeholder="Product Name" name="name" required>
                @if ($errors->first('name'))
                    <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                @endif
            </div>
            
        </div>
        <div class="form-group row">
            <label for="quantity" class="col-sm-2 col-form-label">Quatity</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="quantity" placeholder="Quantity" name="quantity" required>
                @if ($errors->first('quantity'))
                    <div class="alert alert-danger">{{ $errors->first('quantity') }}</div>
                @endif
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection