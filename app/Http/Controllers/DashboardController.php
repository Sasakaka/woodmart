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
        $totalInventoryValue = Product::selectRaw('SUM(stock * price) as total')
            ->value('total') ?? 0;
        $activeProduct = Product::where('status', true)->count();
        $inactiveProduct = Product::where('status', false)->count();
        $lowStockProducts = Product::where('stock', '<=', 5)->count();
        $lowStockProductsList = Product::where('stock', '<=', 5)
            ->where('stock', '<=', 5)
            ->orderBy('stock', 'asc')
            ->get();
        $productsByCategory = Category::withCount('products')
            ->whereHas('products')
            ->orderBy('products_count')
            ->get();
        $categoryLabels = $productsByCategory
            ->pluck('category_name')
            ->values()
            ->toArray();
        $categoryData = $productsByCategory
            ->pluck('products_count')
            ->values()
            ->toArray();
        $latestProducts = Product::with('category')
            ->orderByDesc('stock')
            ->take(5)
            ->get();
        $highestStockProducts = Product::with('category')
            ->orderByDesc('stock')
            ->take(5)
            ->get();

        return view('dashboard.index', compact(
            'totalProducts',
            'totalCategories',
            'totalStock',
            'totalInventoryValue',
            'activeProduct',
            'inactiveProduct',
            'lowStockProducts',
            'lowStockProductsList',
            'productsByCategory',
            'categoryLabels',
            'categoryData',
            'latestProducts',
            'highestStockProducts'
        ));
    }
}
