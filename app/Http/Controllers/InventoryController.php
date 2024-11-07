<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    /* Display a list of all inventory items */
    public function index()
    {
        // Get all inventory items from the database
        $items = Inventory::all();

        // Return a view showing the list of items
        return view('inventory.index', compact('items'));
    }

  
    public function create()
    {
        // Return  view for creating a new inventory item
        return view('inventory.create');
    }

  
    public function store(Request $request)
    {
        // Validate the form input to make sure required fields are filled  correctly
        $request->validate([
            'product_name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        // Create a new inventory item with the validated data
        Inventory::create($request->all());

        // Redirect back to list of items with a success message
        return redirect()->route('inventory.index')->with('success', 'Inventory item created successfully.');
    }

   
    public function show($id)
    {
        // Find the inventory item by ID
        $item = Inventory::findOrFail($id);

        // Return  details of this item
        return view('inventory.show', compact('item'));
    }

  
    public function edit($id)
    {
        // Find the item by  ID
        $item = Inventory::findOrFail($id);

        // Return the edit view with the item's current details
        return view('inventory.edit', compact('item'));
    }

  
    public function update(Request $request, $id)
    {
        // Validate the updated form input to make sure all fields are correct
        $request->validate([
            'product_name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        // Find the item by ID and update it with the validated data
        $item = Inventory::findOrFail($id);
        $item->update($request->all());

        // Redirect back to the item list with a success message
        return redirect()->route('inventory.index')->with('success', 'Inventory item updated successfully.');
    }

 
    public function destroy($id)
    {
        // Find the item by ID and delete it
        $item = Inventory::findOrFail($id);
        $item->delete();

        // Redirect back to the item list with a success message
        return redirect()->route('inventory.index')->with('success', 'Inventory item deleted successfully.');
    }
}

