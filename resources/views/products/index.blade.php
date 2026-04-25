@extends('layouts.app')

@section('title','Inventory App')

@section('content')
    <div class="container mt-5">
        <form action="{{url('/product/store')}}" method="post">
            @csrf
            <div class="row align-items-end g-3">
                <div class="col-8">
                    <label for="name">Product Name</label>
                    <input type="text" name="name" class="border rounded px-3 py-2 hover:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <div class="col-4">
                    <label for="price">Price</label>
                    <input type="number" name ="price" step="any" class="border rounded px-3 py-2 hover:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa-solid fa-plus"></i>Add
                    </button>
                </div>
            </div>
        </form>
        <table>
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Product Name</td>
                    <td>Price</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($all_products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>
                            <a href="{{ url('/product/'.$product->id.'/edit') }}" class="btn btn-secondary">
                                Edit
                            </a>

                            <form action="{{ url('/product/'.$product->id.'/destroy') }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>

                    
                @endforeach
            </tbody>
            
        </table>
    </div>
@endsection