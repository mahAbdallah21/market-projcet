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
        $sideShow = sideShow::where('is_showing' , '1')->get();



      return view('UI.index' ,['products'=>$products , 'main_category'=>$main_category ,'sideShow'=>$sideShow]);
    }
    public function categories(Request $request , $id = null){

        $categories = Category::all();
        $main_category_name=null;
        if ($request->has('search')) {
            $categories = Category::where('name','like','%'.$request->search.'%')->orderBy('name')->get();

        }
        if (isset($id)) {
            $categories = Category::where('category_id' , $id)->get();
            $main_category_name = Category::where('id' , $id)->pluck('name')->first() ;
        }



       return view('UI.categories' , ['categories' =>$categories ,'main_category_name'=>$main_category_name ]);

    }
    public function products(Request $request ,$id = null){
        $products = product::where('is_show' , '1')->get();
        $catagory=null;

        if ($request->has('search')) {
            $products = product::where('name','like','%'.$request->search.'%')->orderBy('name')->get();

        }
        if (isset($id)) {
            $products = product::where('is_show' , '1')->where('category_id' , $id)->get();

            $catagory = Category::findOrFail($id);
        }


        return view('UI.products_ui' ,['products'=>$products ,'category'=>$catagory  ]);


    }
    public function about(){


        return view('UI.about');


    }
}
