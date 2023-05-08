<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function store(Request $request){
        $validate = $request->validate([

            'name' =>'required|unique:tags,name',
        ]);

        $tag = new Tag();

        $tag->name = $request->name;
        $tag->color = $request->color;
        $tag->save();

        return back();

    }
}
