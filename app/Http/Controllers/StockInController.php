<?php

namespace App\Http\Controllers;

use App\Http\Requests\StockInRequest;
use App\Models\Product;
use App\Models\StockIn;
use App\Models\Supplier;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class StockInController extends Controller
{
    /**
     * Display a listing of the stock ins.
     */
    public function index(): View
    {
        $stockIns = StockIn::with('product', 'supplier')
            ->paginate(15);
        return view('stockin.index', compact('stockIns'));
    }

    /**
     * Show the form for creating a new stock in.
     */
    public function create(): View
    {
        $products = Product::all();
        $suppliers = Supplier::all();
        return view('stockin.create', compact('products', 'suppliers'));
    }

    /**
     * Store a newly created stock in in storage.
     */
    public function store(StockInRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $stockIn = StockIn::create($validated);

        // Update product quantity
        $product = Product::find($validated['product_id']);
        $product->increment('quantity', $validated['quantity']);

        return redirect()->route('stockins.index')
            ->with('success', 'Stock in recorded successfully.');
    }

    /**
     * Display the specified stock in.
     */
    public function show($id): View
    {
        $stockIn = StockIn::with('product', 'supplier')->findOrFail($id);
        return view('stockin.show', compact('stockIn'));
    }
}
