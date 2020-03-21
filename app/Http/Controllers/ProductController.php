<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function Index()
    {
        $product = Product::all();
        return response()->json(['status' => 'success', 'data' => $product]);
    }

    public function Store(Request $request)
    {
        $product = new Product;
        $product->name = $request->get('name');
        $product->price = $request->get('price');
        $product->qty = $request->get('qty');
        $product->save();

        return response()->json(['status' => 'success']);
    }

    public function Show($id)
    {
        $product = Product::find($id);
        return response()->json(['status' => 'success', 'data' => $product]);
    }

    public function Update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->get('name');
        $product->price = $request->get('price');
        $product->qty = $request->get('qty');
        $product->save();

        return response()->json(['status' => 'success']);
    }

    public function Destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return response()->json(['status' => 'success']);
    }
}
