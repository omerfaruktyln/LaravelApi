<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class ProductController extends Controller
{
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
        $token = cookie('token');
        $response = Http::withToken($token)->post("http://localhost:8000/api/product/store", [
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
        ]);
    
        return redirect('product');
    }
    
    public function show(string $id)
    {
        
        $token = cookie('token');
        $response = Http::withToken($token)->post("http://localhost:8000/api/product/find/{$id}");
        $product = json_decode($response->body(), true);

        if($product  == null)
        {
            return view('create');
        }

        return view('show', compact('product'));
    }

    
    public function edit(string $id)
    {
        $token = cookie('token');
        $response = Http::withToken($token)->post("http://localhost:8000/api/product/find/{$id}");
        $product = json_decode($response->body(), true);
        return view('update', compact('product'));
    }


    public function update(Request $request, string $id)
    {
        $token = cookie('token');
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
        ]);
        
        $response = Http::withToken($token)->put("http://localhost:8000/api/product/update/{$id}", [
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
        ]);
        if ($response->successful()) {
            return redirect('product');
        } else {
            return redirect('product');
        }
    
        return redirect('product');
    }

    public function destroy(string $id)
    {
        $token = cookie('token');
        $response = Http::withToken($token)->post("http://localhost:8000/api/product/destroy/{$id}");
        return redirect('product');
    }

    public function index()
    {
        $token = cookie('token');
        $response = Http::withToken($token)->get('http://localhost:8000/api/product');
        $products = json_decode($response->body(), true);
        return view('index', compact('products'));
    }
}
