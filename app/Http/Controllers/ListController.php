<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;


class ListController extends Controller
{

    public function index()
    {
        $items = Item::all();
        $totalAmount = Item::sum('price');

        return view('shopping-list.index', compact('items', 'totalAmount'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
        ]);

        Item::create($validatedData);

        return redirect()->route('shopping-list.index')->with('success', 'Item added successfully.');
    }

    public function edit(Item $item)
    {
        return view('shopping-list.edit', compact('item'));
    }

    public function update(Request $request, Item $item)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
        ]);

        $item->update($validatedData);
        $item->update($validatedData);

        return redirect()->route('shopping-list.index')->with('success', 'Item updated successfully.');
    }

    public function destroy(Item $item)
    {
        $item->delete();

        return redirect()->route('shopping-list.index')->with('success', 'Item deleted successfully.');
    }
}
