<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Popping;
use App\Models\Size;
use App\Models\OrderPoppingProduct;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function showInformation()
    {

        // $donnes = DB::table('users')
        // ->select('users.firstname','users.lastname','users.mobile', 'users.adress','users.created_at',)
        // ->join('order','order.user_id','=','users.id_user')
        // ->where(['users.id_user' => auth()->id()])
        // ->get();
        $donnes = DB::select('select * from users  where  id_user = ?', [auth()->id()]);
        $ordersId = DB::select('select id_order from `order`  where user_id = ?', [auth()->id()]);
        $allOrder = [];
        foreach ($ordersId as $order) {
            $productOrder = DB::select('
            select order_product.id_order_product, order_product.product_id, product.name as productName, product.image as productImage,size.name as sizeName,sugar,quantity, order_product.created_at 
            from `order` 
            inner join order_product on `order`.id_order = order_product.order_id
            inner join product on order_product.product_id = product.id_product
            inner join size on order_product.size_id = size.id_size
             where `order`.id_order = ?', [$order->id_order]);
            $poppingOrder = DB::select('
            select popping.name, popping.image
            from `order` 
            inner join order_popping_product on `order`.id_order = order_popping_product.order_id
            inner join popping on order_popping_product.popping_id = popping.id_popping
             where `order`.id_order = ? and order_popping_product.product_id = ?', [$order->id_order, $productOrder[0]->product_id]);
            // var_dump($poppingOrder);
            $oneOrder = array("idOrderProduct" => $productOrder[0]->id_order_product, "product" => $productOrder[0]->productName, "productImage" => $productOrder[0]->productImage, "popping" => $poppingOrder, "size" => $productOrder[0]->sizeName, "quantity" => $productOrder[0]->quantity, "sugar" => $productOrder[0]->sugar, "date" => $productOrder[0]->created_at);
            array_push($allOrder, $oneOrder);
        }
        // dd($oneOrder);
        return view('pages.user', ['info' => $donnes, 'orders' => $allOrder]);
    }
}