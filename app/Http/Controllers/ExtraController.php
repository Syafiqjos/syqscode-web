<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExtraController extends Controller
{
    public function fpdf(){
        return view('extra.fpdf');
    }
}
