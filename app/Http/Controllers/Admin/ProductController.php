<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFormRequest;

class ProductController extends Controller
{
    public function store(ProductFormRequest $request)
    {

        $validatedData = $request->validated();

        $product = new Product;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('images/tea/', $filename);
            $product->image = $filename;
        }
        $product->name = $validatedData['name'];
        $product->description = $validatedData['description'];
        $product->price = $validatedData['price'];

        $product->save();

        return redirect('/')->with('message', 'Tea added Succesfully');
    }
}