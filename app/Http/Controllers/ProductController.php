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
        $all_products = $this->product->paginate(5);
        return view('products.index')->with('all_products',$all_products);
    }
    
    public function store(Request $request){
        $request->validate(['name'=>'required | string | max:100',]);
        $request->validate(['price'=>'required | numeric']);
        $this->product->name=$request->name;
        $this->product->price=$request->price;
        $this->product->save();

        return back();
    }
    public function edit($id){
        $product = $this->product->find($id);
        
        return view('products.edit')->with('product',$product);
    }
    public function update($id,Request $request){
        $request->validate(['name'=>'required | string | max:100',]);
        $request->validate(['price'=>'required | numeric']);
        $product = $this->product->find($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->save();

        return redirect('/');
    }
    
    public function destroy($id){
        $product = $this->product->destroy($id);

        return back();
    }
}
