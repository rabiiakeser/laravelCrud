<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Models\Product;

//17.33
class ProductController extends Controller
{
    public function index()
    {
        $veri=DB::table("products")->get();
     
        // return view('products.index',compact('veri'));
        return view('pages.tables',['products'=> $veri]);
    }
    public function create()
    {
        return view('pages.create');
    }

    public function store(Request $request)
    { //verileri dışarıya atacağız.

        $data = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',

        ]);
       
        // $newProduct = Product::create($data);
        //$veriler=DB::table('product')->get();
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->save();

        //dd($product);
        return redirect(route('product.index'));

    }
    public function edit(Product $product){ 
        // return view ('products.edit',['product'=> $request]);
        return view('pages.edit', compact('product'));

    }
    public function update( Product $product,Request $request){
     
        // return view('products.update',['product'=> $request]);
           $data = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'nullable'
           
        ]);
        $product->update($data); //güncel veriler

        return redirect(route('product.index'))->with('success', 'Ürün başarıyla güncellendi.');

    }
    public function destroy(Product $product){
       
        $product->delete();
        return redirect(route('product.index'))->with('success', 'Ürün başarıyla silindi.');
    }
}