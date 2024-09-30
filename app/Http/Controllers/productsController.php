<?php

namespace App\Http\Controllers;
use App\Models\Products;
use Illuminate\Http\Request;

class productsController extends Controller
{
    public static function getAction() {        
        return view('products.view', [
            'products' => Products::paginate(5)
        ]);
    }

    public static function getProductDetail(Request $request) {        
        return view('products.detail', [
            'product' => Products::findOrFail($request->route('id'))
        ]);
    }
}
