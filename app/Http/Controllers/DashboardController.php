<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;


class DashboardController extends Controller
{
    public function index()
    {
        $totalProducts = Product::count();
        $totalCategories = Category::count();
        $totalStock = Product::sum('stock');
        $activeProduct = Product::where('status', true)->count();
        $lowStockProducts = Product::where('stock', '<=', 5)->count();
        $lowStockProductsList = Product::where('stock', '<=', 5)
            ->where('stock', '<=', 5)
            ->orderBy('stock', 'asc')
            ->get();
        $productsByCategory = Product::with('category')
            ->get()
            ->pluck('product_count', 'category_name');

        return view('dashboard.index', compact(
            'totalProducts',
            'totalCategories',
            'totalStock',
            'activeProduct',
            'lowStockProducts',
            'lowStockProductsList',
            'productsByCategory'
        ));
    }
}
