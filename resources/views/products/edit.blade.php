@extends('layouts.app')

@section('title','Update Product')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-12">
            <a href="{{ route('products.index') }}" class="btn btn-success mb-3">Back</a>

            <form method="post" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
                 @csrf
                 @method('PATCH')

                <div class="row justify-content-center">
                    <div class="col-12 w-75">
                        <div class="card card-primary">

                            <div class="card-header">
                                <h3 class="card-title">Update Product</h3>
                            </div>

                            <div class="card-body">

                                @if ($errors->any())
                                    <div class="alert alert-danger p-1 m-0">
                                        <ul class="g-0">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            
                                <div class="form-group row p-3">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                                    <div class="col-md-8">
                                        <input type="text" id="name" class="form-control" value="{{ $product->name }}" name="name"
                                        placeholder="Enter Product name" required autofocus>
                                    </div>
                                </div>

                                <div class="form-group row p-3">
                                    <label for="category" class="col-md-4 col-form-label text-md-right">Category</label>
                                    <div class="col-md-8">
                                        <select class="form-control" name="category_id">
                                            <option >== Choose Category ==</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"   @if ($category->id == $product->category_id) selected @endif >{{ $category->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row p-3">
                                    <label for="price" class="col-md-4 col-form-label text-md-right">Price</label>
                                    <div class="col-md-8">
                                        <input type="number" id="price" class="form-control" value="{{ $product->price }}" name="price"
                                        placeholder="Enter Product price">
                                    </div>
                                </div>

                                <div class="form-group row p-3">
                                    <label for="image" class="col-md-4 col-form-label text-md-right">Image</label>
                                    <div class="col-md-6">
                                        <input type="file" id="image" class="form-control" value="{{ old('image') }}" name="image">
                                    </div>
                                    <div class="col-md-2">
                                        <img src="{{ asset('images/'.$product->image) }}" alt="{{ $product->title }}" height="40" width="45">   
                                    </div>
                            
                                </div>

                                <div class="form-group row p-3">
                                    <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>
                                    <div class="col-md-8">
                                        <textarea type="text" id="description" class="form-control" name="description"
                                        placeholder="Enter Product Details" >{{ $product->description }}</textarea>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- /.card -->
            </form>
        </div>
    </div>
@endsection