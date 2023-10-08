<?php

namespace App\Http\Controllers;

use App\Models\cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\returnSelf;

class CheckOutController extends Controller
{
    public function index(){
        $carts = cart::where('user_id', Auth::id())->get();

        return view('UI.check_out' ,['carts'=>$carts
    ]);



    }
}
