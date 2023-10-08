<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\product;
use Illuminate\Http\Request;
use App\Models\product_images;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\storeProductRequest;
use App\Http\Requests\updateProductRequest;
use League\CommonMark\Extension\CommonMark\Node\Inline\Strong;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products =product::query();
        return view('products.index', ['products'=>$products->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(storeProductRequest $request)
    {
        try {
            $validate= $request->validated();

           $product= product::create([
                'name'=>[
                    'ar'=>$request->name_ar,
                    'en'=>$request->name_en

                ],
                'description'=>[
                    'ar'=>$request->description_ar,
                    'en'=>$request->description_en
                ],
                'price'=>$request->price,
                'quantity'=>$request->quantity,
                'unit_type'=>$request->unit_type,


                'category_id'=>$request->category_id,
                'is_show' => $request->is_show ? '1' : '0',
            ]);
            product_images::create([
                'image' => $request->file('image')->store('productImages') ,
                'product_id' => $product->id

            ]);

            return redirect()->route('products.index')->with('success' ,('Data has been saved successfully!'));

        } catch (Exception $e) {

              return redirect()->route('products.index')->withErrors($e->getMessage());

        }

    }

    /**
     * Display the specified resource.
     */
    public function show(product $product)
    {
        $product = $product ;
        return view('products.show', compact('product'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(product $product)
    {
       $product = $product ;
       return view('products.edit', compact('product'));


       }

    /**
     * Update the specified resource in storage.
     */
    public function update(updateProductRequest $request, product $product)
    {
        try {
            $validate= $request->validated();
            $image = $request->image ;
            if ($request->hasFile('image')) {
                  Storage::delete('image');
                  $image =$request->file('image')->store('productImages');
            }
            $product->update([
                'name'=>[
                    'ar'=>$request->name_ar,
                    'en'=>$request->name_en

                ],
                'description'=>[
                    'ar'=>$request->description_ar,
                    'en'=>$request->description_en
                ],
                'price'=>$request->price,
                'quantity'=>$request->quantity,
                'unit_type'=>$request->unit_type,

                'category_id'=>$request->category_id,
                'is_show' => $request->is_show ? '1' : '0',
            ]);

                product_images::where('product_id' , $product->id)->update([
                    'image' => $image ,
                    'product_id' => $product->id


                ]);


            return redirect()->route('products.index')->with('success' ,('Data has been Updated successfully!'));

        } catch (Exception $e) {

              return redirect()->route('products.index')->withErrors($e->getMessage());

        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(product $product)
    {
        if($product->product_images){
            Storage::delete($product->product_images);

        }

        product_images::where('product_id' , $product->id)->delete();
        $product->delete();

        return redirect()->route('products.index')->with( 'success',('Data Delete successfully!'));
    }
}
