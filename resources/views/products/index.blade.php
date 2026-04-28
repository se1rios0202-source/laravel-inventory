@extends('layouts.app')

@section('title','Inventory App')

@section('content')
    <div class="max-w-4xl mx-auto px-4 md:px-6 py-10">
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li style="color:red;">{{ $error }}</li>
                @endforeach
            </ul>
        @endif
            <form action="/product/store" method="post" class="mb-10">
                @csrf
                <div class="flex flex-col md:flex-row md:items-end gap-4 md:gap-6">
                    <div class="w-full md:w-auto">
                        <label for="name">Product Name</label>
                        <input type="text" name="name" class="w-full md:w-44 rounded-full bg-white/80 px-5 py-2 outline-none focus:ring-4 focus:ring-emerald-300 hover:ring-4 hover:ring-emerald-500">
                    </div>
                    <div>
                        <label for="price">Price</label>
                        <input type="number" name ="price" step="any" class="w-full md:w-36 rounded-full bg-white/80 px-5 py-2 outline-none focus:ring-4 focus:ring-emerald-300 hover:ring-4 hover:ring-emerald-500 transition">
                    </div>

                    <button type="submit" class="w-full md:w-auto rounded bg-emerald-400 px-8 py-2 text-white text-lg shadow-sm focus:bg-emerald-700 hover:bg-green-500 transition">
                        <i class="fa-solid fa-plus"></i>Add
                    </button>
                </div>
            </form>
            <table class="w-full border-separate border-spacing-y-4">
                <thead>
                    <tr class="text-left text-gray-700 text-xl">
                        <td>ID</td>
                        <td>Product Name</td>
                        <td>Price</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($all_products as $product)
                        <tr class="text-gray-700 text-lg h-12">
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->price }}</td>
                            <td class="flex gap-4">
                                <a href="/product/{{ $product->id }}/edit" class="btn btn-warning text-white active:scale-95 active:shadow-inner transition">
                                    Edit
                                </a>

                                <form action="/product/{{ $product->id }}/destroy" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="rounded bg-red-500 px-3 py-2 text-white hover:bg-red-700 active:scale-95 active:shadow-inner transition">
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