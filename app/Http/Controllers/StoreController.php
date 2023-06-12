<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;

class StoreController extends Controller
{
    public function index()
    {
        $stores = Store::with(['reviews', 'aWorkingDay'])->get();
        return response()->json($stores, 200);
    }

    public function show($id)
    {
        $store = Store::findOrFail($id);
        return response()->json($store, 200);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'business_hour' => 'required',
            'air_condition' => 'required|boolean',
            'parking_lot' => 'required|boolean',
            'introduction' => 'nullable|string',
            'picture' => 'nullable|url',
            'owner_id' => 'required|integer',
            'coordinates' => 'required|string',
            'max_capacity' => 'required|integer',
        ]);

        $store = Store::create($validatedData);

        return response()->json($store, 201);
    }

    public function update(Request $request, $id)
    {
        $store = Store::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'business_hour' => 'required',
            'air_condition' => 'required|boolean',
            'parking_lot' => 'required|boolean',
            'introduction' => 'nullable|string',
            'picture' => 'nullable|url',
            'owner_id' => 'required|integer',
            'coordinates' => 'required|string',
            'max_capacity' => 'required|integer',
        ]);

        $store->update($validatedData);

        return response()->json($store, 200);
    }

    public function destroy($id)
    {
        $store = Store::findOrFail($id);
        $store->delete();
        return response()->json(['message' => 'Store deleted successfully'], 200);
    }

    public function searchTerm($searchTerm)
    {
        $stores = Store::where(function ($query) use ($searchTerm) {
            $query->where('name', 'like', "%{$searchTerm}%")
                ->orWhere('address', 'like', "%{$searchTerm}%");
        })
        ->with(['reviews', 'a_working_day'])
        ->get();

        return response()->json($stores, 200);
    }
}
