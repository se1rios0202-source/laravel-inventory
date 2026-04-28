@extends('layouts.app')

@section('title','Inventory App')

@section('content')
    <div class="max-w-3xl max-auto px-6 py-10">
        <form action="/product/{{$product->id}}/update" method="post" class="flex flex-col md:flex-row md:items-end gap-4 md:gap-6">
            @csrf
            @method('PATCH')
            <div class="flex flex-col md:flex-row gap-6">
                <div class="w-full md:w-1/2">
                    <label for="name">Product Name</label>
                    <input type="text" name="name" value="{{ $product->name }}" class="w-full text-blue-700 border rounded px-3 py-2 hover:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <div class="w-full md:w-1/2">
                    <label for="price">Price</label>
                    <input type="number" name ="price" step="any" value="{{ $product->price }}"  class="w-full text-blue-700 border rounded px-3 py-2 hover:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <div class="mt-6">
                    <button type="submit" class="w-full md:w-auto btn btn-warning text-white active:scale-95 active:shadow-inner transition">
                        <i class="fa-solid fa-plus"></i>Update
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection