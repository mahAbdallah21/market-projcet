<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\product;
use Illuminate\Http\Request;

class wabColntroller extends Controller
{
    public function index(){

        $products = product::where('is_show' , '1')->get();

        // dd($products);

      return view('UI.index' ,compact('products'));
    }
}
