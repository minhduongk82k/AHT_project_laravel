<?php

namespace App\Http\Controllers\Site\Cart;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Cart;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    //
    public function cart()
    {
        $data['cart'] = Cart::content();
        $data["total"] = Cart::total();
        $data["priceTotal"] = Cart::priceTotal();
        return view("frontend/cart/cart",$data);
    }
    public function addToCart(Request $request, $id)
    {
        $qty = $request->quantity ? $request->quantity : 1;
        $product = Product::find($id);

        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'qty' => $qty,
            'weight' => 0,
            'options' => ['code' => $product->code, 'image' => $product->image]
        ]);
        return redirect("gio-hang");
    }
    public function update($rowId, $qty)
    {   
        Cart::update($rowId,$qty);
        return "updated";
    }
    public function delete($rowId)
    {
        Cart::remove($rowId);
        return redirect("/gio-hang");
    }
    public function checkout()
    {
        $data['cart'] = Cart::content();
        $data["priceTotal"] = Cart::priceTotal();
        return view("frontend/cart/checkout",$data);
    }
    public function payment( Request $request)
    {
        dd($request->input);
        return "pay";
    }
    public function complete()
    {
        return view("frontend/product/complete");
    }
}
