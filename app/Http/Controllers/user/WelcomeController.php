<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Categories;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    public function index()
    {
        $categories = Categories::take(4)->get();
        $produks = Product::take(8)->get();

        $terlaris = DB::table('detail_order')
            ->leftjoin('products', 'products.id', '=', 'detail_order.product_id')
            ->select(
                'detail_order.product_id as id_product',
                'products.name as nama_product',
                'products.price as price_product',
                'products.image as image_product',
                DB::raw('COUNT(product_id) as total')
            )
            // ->where('products.id', 'detail_order.product_id')
            ->groupBy('detail_order.product_id', 'products.name', 'products.image', 'products.price')
            ->limit(10)
            ->orderBy('total', 'desc')
            ->get();

        return view('user.welcome', [
            'categories' => $categories,
            'produks' => $produks,
            'terlaris' => $terlaris
        ]);
    }

    public function kontak()
    {
        return view('user.kontak');
    }
}
