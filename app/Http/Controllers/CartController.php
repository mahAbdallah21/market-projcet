<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //
    public function add_to_cart(Request $request){

        $product_id = $request->product_id;
        $user_id = Auth::id();
        $qty = $request->qty ;

        if (Auth::check()) {
            $product = product::where('id' , $product_id)->exists();
            if ($product) {
                if (cart::where('product_id',$product_id)->where('user_id',$user_id)->exists()) {
                    return response()->json(['msg' =>'product in your cart already']);



                } else {

                    cart::create([
                        'user_id'=>$user_id ,
                        'product_id'=>$product_id,
                        'qty'=>$qty
                    ]);
                    $product = product::findOrFail($product_id);
                    return response()->json(['msg' =>$product->name.'successfully add your cart']);
                }


            }else {
                return response()->json(['msg' => 'product not found']);
            }


        } else {
            return response()->json(['msg' => 'Loin  first']);
        }

    }
    public function cart_destroy($id){

        if (Auth::check()) {
            $cart= cart::findOrfail($id);
            $cart->delete();
            return back()->with( 'success',('Data Delete successfully!'));

        }else{
            return back()->with( 'warning',('LogIN first !'));
        }


    }
}
