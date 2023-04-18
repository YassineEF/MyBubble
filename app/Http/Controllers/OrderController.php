<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderFormRequest;
use App\Models\Order;
use App\Models\Product;
use App\Models\Popping;
use App\Models\OrderPoppingProduct;
use App\Models\OrderProduct;
use App\Models\Size;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{
    public function showAll()
    {
        return view('pages.commande', ['products' => Product::all(), 'poppings' => Popping::all(), 'sizes' => Size::all()]);
    }
    public function orderOne()
    {
        return redirect('/order')->with('message', 'Order added succesfully');
    }
    public function showItems(Request $request)
    {
        $data = json_decode($request->storage);

        if (isset($data)) {

            $popping = [];
            $poppingImage = [];
            $products = Product::all();
            $poppings = Popping::all();
            $size = Size::all();
            $datas = [];
            foreach ($data as $item) {
                $donnes = [];
                $product = $products->find($item->product)->name;
                $productImage = $products->find($item->product)->image;
                foreach ($item->popping as $value) {
                    array_push($popping, $poppings->find($value)->name);
                    array_push($poppingImage, $poppings->find($value)->image);
                }
                $pop = $popping;
                $sizes = $size->find($item->size)->name;
                $quantity = $item->quantity;
                $sugar = $item->sugar;
                $donnes = array("product" => $product, "productImage" => $productImage, "popping" => $pop, "poppingImage" => $poppingImage, "size" => $sizes, "quantity" => $quantity, "sugar" => $sugar);
                array_push($datas, $donnes);
                
            }
            return view('layouts.cart', ['orders' => $datas]);
            ;
        }
        return view('layouts.cart', ['orders' => null]);
    }
    
    public function createOrder(Request $request)
    {
        $data = json_decode($request->storage);
        // dd($data);
        // $validatedData = $request->validated();

        $newOrder = new Order;
        $newOrder->user_id = auth()->id();
        $newOrder->save();

        $orderId = $newOrder->id_order;

        foreach ($data as $orderOne) {
            $newOrderProduct = new OrderProduct;
            $newOrderProduct->order_id = $orderId;
            $newOrderProduct->product_id = $orderOne->product;
            $newOrderProduct->size_id = $orderOne->size;
            $newOrderProduct->sugar = $orderOne-> sugar;
            $newOrderProduct->quantity = $orderOne->quantity;
            $newOrderProduct->save();

            foreach ($orderOne->popping as $singlePopping) {
                $newOrderPoppingProduct = new OrderPoppingProduct;
                $newOrderPoppingProduct->order_id = $orderId;
                $newOrderPoppingProduct->product_id = $orderOne->product;
                $newOrderPoppingProduct->popping_id = $singlePopping;
                $newOrderPoppingProduct->save();
            }
                
        }
        return redirect('/')->with('message', 'Command recived succesfully');
    }
}