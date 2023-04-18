<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PoppingFormRequest;
use App\Models\Popping;

class PoppingController extends Controller
{
    public function store(PoppingFormRequest $request)
    {
        $validatedData = $request->validated();

        $popping = new Popping;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('images/popping/', $filename);
            $popping->image = $filename;
        }
        $popping->name = $validatedData['name'];
        $popping->price = $validatedData['price'];

        $popping->save();

        return redirect('/')->with('message', 'Popping added Succesfully');
    }
}