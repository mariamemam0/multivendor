<?php

namespace App\Listeners;

use App\Events\OrderCreated;
use App\Facades\Cart;
use App\Models\Product;
use DB;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class DeductProductQuantity
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(OrderCreated $event): void
    {
        $order = $event->order;

       foreach($order->products as $product){
        $product->decrement('quantity', $product->order_item->quantity);
        /*Product::where('id','=',$item->product_id)
        ->update([
            'quantity' => DB::raw("quantity - {$item->quantity}")
        ]);*/
       }
    }
}
