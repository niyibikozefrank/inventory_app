<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StockIn;
use App\Models\StockOut;
use App\Models\User;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Display the dashboard.
     */
    public function index(): View
    {
        $totalProducts = Product::count();
        $lowStockProducts = Product::where('quantity', '<', 10)->count();
        $totalStockIn = StockIn::sum('quantity');
        $totalStockOut = StockOut::sum('quantity');
        $totalUsers = User::count();

        $recentStockIns = StockIn::with('product', 'supplier')
            ->latest()
            ->take(5)
            ->get();

        $recentStockOuts = StockOut::with('product')
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard.index', compact(
            'totalProducts',
            'lowStockProducts',
            'totalStockIn',
            'totalStockOut',
            'totalUsers',
            'recentStockIns',
            'recentStockOuts'
        ));
    }
}
