<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //
    private $product;
    public function __construct(Product $product){
        $this->product = $product;
    }

    public function index(){
        $all_products = $this->product->all();
        return view('products.index')->with('all_products',$all_products);
    }
    
    public function store(Request $request){
        $this->product->name=$request->name;
        $this->product->price=$request->price;
        $this->product->save();

        return redirect('/');
    }
    public function edit($id){
        $product = $this->product->findOrFail($id);
        
        return view('products.edit')->with('product',$product);
    }
    
    public function destroy($id){
        $product = $this->product->findOrFail($id);
        $product->delete();

        return redirect('/');
    }
}
