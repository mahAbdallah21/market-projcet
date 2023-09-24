<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\storeCategoryRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            $categories = category::query();

                 return view('categories.index',['categories'=>$categories->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(storeCategoryRequest $request)
    {
        try {
              $validate = $request->validate();
              $image =$request->file('image')->store('categoryImage');
              $category = new Category();
              $category->name =['ar' =>$request->name_ar ,'en'=>$request->name_en];
              $category->meta_title =['ar' =>$request->meta_title_ar ,'en'=>$request->meta_title_en];
              $category->image = $image ;
              $category->is_showing = $request->is_showing ? '1' : '0';
            $category->is_popular = $request->is_popular ? '1' : '0';
            $category->category_id = $request->category_id;
            $category->meta_description = $request->meta_description;
            $category->mate_keywords = $request->mate_keywords;
            $category->save();
            //   toastr()->success(trans("messages_trans.success_save"), 'Congrats', ['timeOut' => 5000]);
            toastr()->success('Data has been saved successfully!', 'Congrats', ['timeOut' => 5000]);

            return redirect()->route('categories.index');



        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
