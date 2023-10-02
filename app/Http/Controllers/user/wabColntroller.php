<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\product;
use App\Models\sideShow;
use Illuminate\Http\Request;

class wabColntroller extends Controller
{
    public function index(){

        $products = product::where('is_show' , '1')->get();
        $main_category = Category::whereNull('category_id')->get();
        $sideShow = sideShow::where('is_showing' , '0')->get();



      return view('UI.index' ,['products'=>$products , 'main_category'=>$main_category ,'sideShow'=>$sideShow]);
    }
}
