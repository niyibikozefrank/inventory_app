<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StockIn;
use App\Models\StockOut;
use Illuminate\View\View;

class ReportController extends Controller
{
    /**
     * Display the inventory report.
     */
    public function inventory(): View
    {
        $products = Product::orderBy('quantity', 'asc')->get();
        return view('reports.inventory_report', compact('products'));
    }

    /**
     * Display the stock in report.
     */
    public function stockIn(): View
    {
        $stockIns = StockIn::with('product', 'supplier')
            ->orderBy('created_at', 'desc')
            ->get();
        
        $totalQuantity = $stockIns->sum('quantity');

        return view('reports.stockin_report', compact('stockIns', 'totalQuantity'));
    }

    /**
     * Display the stock out report.
     */
    public function stockOut(): View
    {
        $stockOuts = StockOut::with('product')
            ->orderBy('created_at', 'desc')
            ->get();
        
        $totalQuantity = $stockOuts->sum('quantity');

        return view('reports.stockout_report', compact('stockOuts', 'totalQuantity'));
    }

    /**
     * Display the low stock report.
     */
    public function lowStock(): View
    {
        $products = Product::where('quantity', '<', 10)
            ->orderBy('quantity', 'asc')
            ->get();

        return view('reports.lowstock_report', compact('products'));
    }

    /**
     * Display the fast moving products report.
     */
    public function fastMoving(): View
    {
        $products = Product::withCount([
            'stockOuts' => function ($query) {
                $query->where('created_at', '>=', now()->subDays(30));
            }
        ])
        ->having('stock_outs_count', '>', 0)
        ->orderByDesc('stock_outs_count')
        ->get();

        return view('reports.fastmoving_report', compact('products'));
    }
}
