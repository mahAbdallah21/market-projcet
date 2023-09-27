<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\storeCategoryRequest;
use App\Http\Requests\updateCategoryRequest;
use Illuminate\Support\Facades\Log;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log as FacadesLog;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Expr\Cast\String_;

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
                 $validate = $request->validated();

              Category::create([
                'name' =>[
                      'ar' =>$request->name_ar ,
                      'en'=>$request->name_en
                      ],
                      'meta_title' =>[
                        'ar' =>$request->meta_title_ar ,
                      'en'=>$request->meta_title_en
                      ],
                      'image' => $request->file('image')->store('categoryImage'),
                      'is_showing' => $request->is_showing ? '1' : '0',
                       'is_popular' => $request->is_popular ? '1' : '0',
                       'category_id' => $request->category_id,
                       'meta_description' => $request->meta_description,
                       'mate_keywords' => $request->mate_keywords,


              ]);




       //   toastr()->success("messages_trans.success_save"), 'Congrats', ['timeOut' => 5000]);
        // toastr()->success('Data has been saved successfully!', 'Congrats', ['timeOut' => 5000]);

           return redirect()->route('categories.index')->with('success' ,('Data has been saved successfully!'));



        } catch (Exception $e) {
            return back()->withErrors($e->getMessage()) ;
         }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $category = $category;
        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $category = $category;
        return view('categories.edit', compact('category'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(updateCategoryRequest $request, Category $category)
    {
        try {
            $validate = $request->validated();
            $image =$category->image ;
            if ($request->hasFile('image')) {
                Storage::delete('image');
                $image= $request->file('image')->store('categoryImage');

            }

             $category->update([
                'name' =>[
                'ar' =>$request->name_ar ,
                'en'=>$request->name_en
                ],
                'meta_title' =>[
                  'ar' =>$request->meta_title_ar ,
                'en'=>$request->meta_title_en
                ],
                'image' => $image,
                'is_showing' => $request->is_showing ? '1' : '0',
                 'is_popular' => $request->is_popular ? '1' : '0',
                 'category_id' => $request->category_id,
                 'meta_description' => $request->meta_description,
                 'mate_keywords' => $request->mate_keywords,
         ]);






   return redirect()->route('categories.index')->with('success' ,('Data has been Update successfully!'));



   } catch (Exception $e) {
      return back()->withErrors($e->getMessage()) ;
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {



       if ($category->image) {
        Storage::delete($category->image);

       }
       $category->delete();


       return redirect()->route('categories.index')->with( 'success',('Data Delete successfully!'));


    }


}
