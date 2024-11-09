<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    // List all products
    public function index()
    {
        $products = Product::with('variants')->get();
        return view('products.index', compact('products'));
    }

    // Show a single product
    public function show($id)
    {
        $categories = Category::all(); // Fetch all categories
        $product = Product::with('variants')->findOrFail($id);
        $category = Category::find($product->category_id);
        $mostSoldProducts = Product::with('variants')
            ->leftJoin('product_variants', 'products.id', '=', 'product_variants.product_id')
            ->leftJoin('orders', 'product_variants.id', '=', 'orders.product_variant_id')
            ->select('products.id', 'products.name', 'products.image', 'products.description', 'products.category_id', DB::raw('COALESCE(SUM(orders.quantity), 0) as total_sales'))
            ->groupBy('products.id', 'products.name', 'products.image', 'products.description', 'products.category_id')
            ->orderBy('total_sales', 'desc')
            ->take(10)
            ->get();
        return view('product-details', compact('product', 'mostSoldProducts', 'category', 'categories'));
    }

    public function productsInCategory($id)
    {
        $categories = Category::all(); // Fetch all categories
        $category = Category::find($id);
        return view('products-in-category', compact('category', 'categories'));
    }
    // Search products
    public function search(Request $request)
    {
        $query = $request->input('query');
        $products = Product::where('name', 'like', "%$query%")->with('variants')->get();
        return view('products.search_results', compact('products'));
    }
}
