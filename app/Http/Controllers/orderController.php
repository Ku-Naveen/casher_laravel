<?php

namespace App\Http\Controllers;
use App\Models\Products;
use Illuminate\Support\Facades\Auth;

class orderController extends Controller
{
    public static function getAction() {        
        return view('orders.view', [
            'orders' => Products::where('user_id', auth()->user()->id)->paginate(20)
        ]);
    }

}
