<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sells;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products=DB::table('products')->get();
        return view('backend.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'quantity' => 'required',
            'price' => 'required',

        ]);
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,

        ]);

       return redirect()->route('product.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $products=DB::table('products')->find($id);
        return view('backend.product.edit',compact('products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $this->validate($request, [
            'name' => 'required',
            'quantity' => 'required',
            'price' => 'required',

        ]);
        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,

        ]);

       return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index');
    }

    public function product_sale($productId)
    {
        $products = Product::findOrFail($productId);
        return view('backend.product.sale_product',compact('products'));
    }

    public function product_sale_update(Request $request, $productId)
    {
        $quantity = $request->input('quantity');
        $product = Product::findOrFail($productId);
        $totalAmount = $product->price * $quantity;

        Sells::create([
            'product_id' => $product->id,
            'quantity' => $quantity,
            'total_price' => $totalAmount,
        ]);

        $product->decrement('quantity', $quantity);

        return redirect()->route('product.index');
    }

    public function sales(){
        $sales = Sells::with('product')->get();
        return view('backend.product.sales',compact('sales'));
    }
}
