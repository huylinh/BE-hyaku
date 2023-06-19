<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
use DateTime;

class StoreController extends Controller
{
    public function index(Request $request)
    {
        $stores = Store::with(['reviews', 'aWorkingDay'])
        ->when($request->input('search'), function ($query, $search) {
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('address', 'like', "%{$search}%");
        })
        ->get();
        $storesWithStatus = [];
        foreach($stores as $store) {
            $storeWithStatus = $store;
            $coordinates = $store['coordinates'];
            $position = explode(',', $coordinates);
            $lat = $position[0];
            $lon = $position[1];
            $convertedCoordinates = ["latitude" => $lat, "longitude" => $lon];
            $storeWithStatus['coordinates'] = $convertedCoordinates;

            $open_time_array = explode(" - ", $store['business_hour']);
            if (count($open_time_array) >= 2) {
                $start_time = date('H:i', strtotime($open_time_array[0]));
                $end_time = date('H:i', strtotime($open_time_array[1]));
                $current_time = date('H:i');
    
                if ($current_time > $start_time && $current_time < $end_time) {
                    $store['isOpen'] = true;
                    
                } else {
                    $store['isOpen'] = false;
                }
            }

            if ($store['aWorkingDay']['guests'] >= $store['max_capacity']*2/3) {
                $storeWithStatus['status'] = false;
            } else {
                $storeWithStatus['status'] = true;
            }

            array_push($storesWithStatus, $storeWithStatus);
        }
        return response()->json($storesWithStatus, 200);
    }

    public function show($id)
    {
        $store = Store::with(['reviews', 'aWorkingDay'])->findOrFail($id);
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
}
