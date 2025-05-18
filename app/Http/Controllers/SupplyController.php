<?php

namespace App\Http\Controllers;

use App\Models\Supply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pet;

class SupplyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $supplies = Supply::where('user_id', Auth::id())->with('pet')->get();
        return view('supplies.index', compact('supplies'));
    }

    /**
     * Show the form for creating a new supply.
     */
    public function create()
    {
        $pets = Pet::where('user_id', Auth::id())->get(); // Get the pets belonging to the authenticated user
        return view('supplies.create', compact('pets'));
    }

    /**
     * Store a newly created supply in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pet_id' => 'required|exists:pets,id',
            'item_name' => 'required|string|max:255',
            'quantity' => 'required|numeric|min:0',
            'unit' => 'required|string|max:50',
            'low_stock_threshold' => 'required|numeric|min:0',
        ]);

        Supply::create([
            'user_id' => Auth::id(),
            'pet_id' => $request->pet_id,
            'item_name' => $request->item_name,
            'quantity' => $request->quantity,
            'unit' => $request->unit,
            'low_stock_threshold' => $request->low_stock_threshold,
        ]);

        return redirect()->route('supplies.index')->with('success', 'Supply added successfully!');
    }

    /**
     * Show the form for editing the specified supply.
     */
    public function edit($id)
{
    $supply = Supply::findOrFail($id);
    $pets = Pet::where('user_id', Auth::id())->get(); // Ensure this retrieves pets for the authenticated user
    return view('supplies.edit', compact('supply', 'pets'));
}


    /**
     * Update the specified supply in storage.
     */
    public function update(Request $request, $id)
    {
        $supply = Supply::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        $request->validate([
            'pet_id' => 'required|exists:pets,id',
            'item_name' => 'required|string|max:255',
            'quantity' => 'required|numeric|min:0',
            'unit' => 'required|string|max:50',
            'low_stock_threshold' => 'required|numeric|min:0',
        ]);

        $supply->update([
            'pet_id' => $request->pet_id,
            'item_name' => $request->item_name,
            'quantity' => $request->quantity,
            'unit' => $request->unit,
            'low_stock_threshold' => $request->low_stock_threshold,
        ]);

        return redirect()->route('supplies.index')->with('success', 'Supply updated successfully!');
    }

    /**
     * Remove the specified supply from storage.
     */
    public function destroy($id)
    {
        $supply = Supply::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $supply->delete();

        return redirect()->route('supplies.index')->with('success', 'Supply deleted successfully!');
    }
}
