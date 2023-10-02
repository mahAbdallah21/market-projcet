<?php

namespace App\Http\Controllers;

use App\Models\sideShow;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Termwind\Components\Dd;

class settingsController extends Controller
{
    public function index(){

        $sideshow = sideShow::all();
        return view('settings.side.sideShow' , compact('sideshow'));

    }
    public function create(){

        return view('settings.side.add_side');
    }
    public function store(Request  $request){

        $request->validate([
            "title_ar" =>'required',
            "title_en" =>'required',
            "description_ar" =>'required',
            "description_en" =>'required',
            'image' =>'required|image',
        ]);

        try {
            sideShow::create([
                'title' =>[
                    'ar'=>$request->title_ar,
                    'en'=>$request->title_en
                ],
                'description' =>[
                    'ar'=>$request->description_ar,
                    'en'=>$request->description_en
                ],
                'image' =>$request->file('image')->store('sideShow'),
                'is_showing' =>$request->is_showing ? 1 : 0 ,
            ]);
            return redirect()->route('side.index')->with('success' ,('Data has been saved successfully!'));
        } catch (Exception $e) {
            return back()->withErrors($e->getMessage());
        }
    }

   public function edit ( $id){






    $sideShow =sideShow::findOrFail($id);
        return view('settings.side.edit' , ['sideShow' => $sideShow]);
   }

public function update(Request $request , $id){



    $sideShow = sideShow::findOrFail($id);



    $request->validate([
        "title_ar" =>'required',
        "title_en" =>'required',
        "description_ar" =>'required',
        "description_en" =>'required',
        'image' =>'image',
    ]);
    $image = $sideShow->image ;

    if($request->hasFile('image')){
        Storage::delete('image');
        $image = $request->file('image')->store('sideShow');

    }
    try{
    $sideShow->update([
        'title' =>[
            'ar'=>$request->title_ar,
            'en'=>$request->title_en
        ],
        'description' =>[
            'ar'=>$request->description_ar,
            'en'=>$request->description_en
        ],
        'image' =>$image ,
        'is_showing' =>$request->is_showing ? 1 : 0 ,



    ]);
    return redirect()->route('side.index')->with('success' ,('Data has been Updated successfully!'));
} catch (Exception $e) {
    return back()->withErrors($e->getMessage());
}



}

  public function destroy($id)

{
    $sideShow = sideShow::findOrFail($id);
    if($sideShow->image){

        Storage::delete($sideShow->image);
    }
    try {
          $sideShow->delete();
          return redirect()->route('side.index')->with('success' ,('Data has been Deleted successfully!'));
    } catch (Exception $e) {
        return back()->withErrors($e->getMessage());

    }


}
}
