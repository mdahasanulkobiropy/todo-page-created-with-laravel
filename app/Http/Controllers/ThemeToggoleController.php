<?php

namespace App\Http\Controllers;

use App\Models\ThemeToggole;
use Illuminate\Http\Request;

class ThemeToggoleController extends Controller
{
    public function themesatutstrue($id){

        // dd($id);

        $tasktoggole = ThemeToggole::find($id);

        $tasktoggole->themestatus = '1';
        $tasktoggole->save();

        return back();
    }
    public function themesatutsfalse($id){

        // dd($id);

        $tasktoggole = ThemeToggole::find($id);

        $tasktoggole->themestatus = '0';
        $tasktoggole->save();

        return back();
    }
}
