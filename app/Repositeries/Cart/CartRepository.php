<?php
namespace App\Repositeries\Cart;

use App\Models\Product;
use Illuminate\Support\Collection;


interface CartRepository
{
    public function get() : Collection;
   public function add(Product $product ,$quantity = 1);
   public function update(Product $product, $quantity);
   Public function delete($id);
   public function empty();
   public function total():float;
   
   
}