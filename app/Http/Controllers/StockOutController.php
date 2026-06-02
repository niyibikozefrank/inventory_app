<?php

namespace App\Http\Controllers;

use App\Http\Requests\StockOutRequest;
use App\Models\Product;
use App\Models\StockOut;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class StockOutController extends Controller
{
    /**
     * Display a listing of the stock outs.
     */
    public function index(): View
    {
        $stockOuts = StockOut::with('product')
            ->paginate(15);
        return view('stockout.index', compact('stockOuts'));
    }

    /**
     * Show the form for creating a new stock out.
     */
    public function create(): View
    {
        $products = Product::where('quantity', '>', 0)->get();
        return view('stockout.create', compact('products'));
    }

    /**
     * Store a newly created stock out in storage.
     */
    public function store(StockOutRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        // Check if sufficient quantity exists
        $product = Product::find($validated['product_id']);
        if ($product->quantity < $validated['quantity']) {
            return back()->withErrors(['quantity' => 'Insufficient stock available.'])
                ->withInput();
        }

        $stockOut = StockOut::create($validated);

        // Update product quantity
        $product->decrement('quantity', $validated['quantity']);

        return redirect()->route('stockouts.index')
            ->with('success', 'Stock out recorded successfully.');
    }

    /**
     * Display the specified stock out.
     */
    public function show($id): View
    {
        $stockOut = StockOut::with('product')->findOrFail($id);
        return view('stockout.show', compact('stockOut'));
    }
}
