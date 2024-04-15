<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ProductController extends Controller
{
    public function __construct()
    {
    }
    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|integer',
        ]);
    
         $response = Product::create($request->all()); 
        return $response ;
    }

    public function show(string $id)
    {
        $product = Product::FindOrFail($id);
        return $product ;
    }

    public function update(Request $request, string $id)
    {
         $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
        ]);
    
        $product = Product::findOrFail($id);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->save();
    
        return  $product;
    }

    public function destroy(string $id)
    {
        $product = Product::FindOrFail($id);
        $product->delete();
        return $product;
    }
    public function find(string $id)
    {
        $product = Product::FindOrFail($id);
       return $product;
    }

    public function index()
    {
            $products = Product::all();
            return $products;
    }

}
