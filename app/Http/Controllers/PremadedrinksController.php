<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PremadeDrinkRequest;
use App\Models\PremadeDrinks;

class PremadedrinksController extends Controller
{
    public function index(){
      return view('pages.premade', ['premade'=> PremadeDrinks::all()]);
    }

    public function store(PremadeDrinkRequest $request)
    {
        $validatedData = $request->validated();
       
        $premade = new PremadeDrinks;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension(); // ext (extension) => récupère extension de l'image
            $filename = time() . '.' . $ext;
            $file->move('images/premade_drinks/', $filename);
            $premade->image = $filename;
        }
        $premade->name = $validatedData['name'];
        $premade->description = $validatedData['description'];
        $premade->price = $validatedData['price'];
 
        $premade->isLimited = true;
      

        $premade->save();

        return redirect('/')->with('message', 'Tea added Succesfully');
    }

}

