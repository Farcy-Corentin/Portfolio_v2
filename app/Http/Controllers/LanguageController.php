<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function switchLang($langue)
    {
        if(array_key_exists($langue, Config::get('languages')))
        {
            Session::put('applocale', $langue);
        }
        return Redirect::back();
    }
}
