@extends('layouts.app')

@section('title','Inventory App')

@section('content')
    <div class="container mt-5">
        <form action="/product/{{$product->id}}/update" method="post">
            @csrf
            @method('PATCH')
            <div class="row align-items-end g-3">
                <div class="col-8">
                    <label for="name">Product Name</label>
                    <input type="text" name="name" value="{{ $product->name }}" class="border rounded px-3 py-2 hover:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <div class="col-4">
                    <label for="price">Price</label>
                    <input type="number" name ="price" step="any" value="{{ $product->price }}"  class="border rounded px-3 py-2 hover:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-warning">
                        <i class="fa-solid fa-plus"></i>Update
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection