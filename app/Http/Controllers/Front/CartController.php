<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Repositeries\Cart\CartModelRepositery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $repository = App::make('cart');
         $items = $repository->get();
         return view('front.cart' , [
            'cart' =>$items ,
         ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request ->validate([
            'product_id' =>['required','int','exists:products,id'],
            'quantity' =>['nullable','int','min:1'],

        ]);
        $product = Product::findOrFail($request->post('product_id'));
        $repository = new CartModelRepositery();
        $repository->add($product , $request->post('quantity'));
    }

    /**
     * Display the specified resource.
     */
  

    /**
     * Show the form for editing the specified resource.
     */
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request ->validate([
            'product_id' =>['required','int','exists:products,id'],
            'quantity' =>['nullable','int','min:1'],

        ]);
        $product = Product::findOrFail($request->post('product_id'));
        $repository = new CartModelRepositery();
        $repository->update($product , $request->post('quantity'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $repository = new CartModelRepositery();
        $repository->delete($id);
    }
}
