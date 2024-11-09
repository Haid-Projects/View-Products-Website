<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index()
    {
        $categories = Category::all(); // Fetch all categories


        $mostSoldProducts = Product::with('variants')
            ->leftJoin('product_variants', 'products.id', '=', 'product_variants.product_id')
            ->leftJoin('orders', 'product_variants.id', '=', 'orders.product_variant_id')
            ->select('products.id', 'products.name', 'products.image', 'products.description', 'products.category_id', DB::raw('COALESCE(SUM(orders.quantity), 0) as total_sales'))
            ->groupBy('products.id', 'products.name', 'products.image', 'products.description', 'products.category_id')
            ->orderBy('total_sales', 'desc')
            ->take(8)
            ->get();


        return view('main', compact('categories', 'mostSoldProducts'));
    }
}
