<?php

namespace App\Http\Controllers;

use App\Models\AWorkingDay;
use Illuminate\Http\Request;
use App\Models\Store;
use Illuminate\Support\Facades\DB;

class StoreController extends Controller
{
    public function index(Request $request)
    {
        $stores = Store::with(['reviews', 'aWorkingDay'])
        ->withCount(['reviews as avg_rating' => function ($query) {
            $query->select(DB::raw('COALESCE(AVG(stars), 0)'));
        }])
        ->when($request->input('search'), function ($query, $search) {
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('address', 'like', "%{$search}%");
        })->when($request->input('user_id'), function ($query, $user_id) {
            $query->where('owner_id', '=', $user_id);
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
                $storeWithStatus['isFree'] = false;
            } else {
                $storeWithStatus['isFree'] = true;
            }
            array_push($storesWithStatus, $storeWithStatus);
        }
        return response()->json($storesWithStatus, 200);

    }

    public function show($id)
    {
        $store = Store::with(['reviews', 'aWorkingDay'])
        ->withCount(['reviews as avg_rating' => function ($query) {
            $query->select(DB::raw('COALESCE(AVG(stars), 0)'));
        }])
        ->findOrFail($id);

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

        return response()->json($storeWithStatus, 200);
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
            'owner_id' => 'required|integer',
            'coordinates' => 'required|string',
            'max_capacity' => 'required|integer',
            'front_picture' => 'nullable|url',
            'view_picture' => 'nullable|url',
            'inside_picture' => 'nullable|url',
            'ac_picture' => 'nullable|url',
            'parking_lot_picture' => 'nullable|url',
            'business_license_pic' => 'nullable|url'
        ]);

        $store = Store::create(array_merge($validatedData, ['status' => 'pending']));

        $workingDay = new AWorkingDay();
        $workingDay->store_id = $store->id;
        $workingDay->guests = 0;
        $workingDay->updated_time = now();
        $workingDay->save();

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
            'owner_id' => 'required|integer',
            'coordinates' => 'required|string',
            'max_capacity' => 'required|integer',
            'front_picture' => 'nullable|url',
            'view_picture' => 'nullable|url',
            'inside_picture' => 'nullable|url',
            'ac_picture' => 'nullable|url',
            'parking_lot_picture' => 'nullable|url',
            'business_license_pic' => 'nullable|url'
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

    public function updateGuests(Request $request, $id)
    {
        $store = Store::find($id);
        $workingDay = $store->aWorkingDay;
        $workingDay->guests = $request->input('guests');
        $workingDay->updated_time = now();
        $workingDay->save();
        return response()->json(["message" => "Update Success!", "working_day" => $workingDay], 200);
    }

    public function updateStatus(Request $request, $id)
    {
        $store = Store::find($id);

        if (!$store) {
            return response()->json(['error' => 'Store not found'], 404);
        }

        if ($store->status != 'pending') {
            return response()->json(['error' => "Can't update this store because it had already been accepted or rejected"], 400);
        }

        $validatedData = $request->validate([
            'status' => 'required|in:accepted,rejected'
        ]);

        if (in_array($validatedData['status'], ['accepted', 'rejected'])) {
            $validatedData['confirmed_at'] = now();
        }

        $store->update($validatedData);

        return response()->json($store, 200);
    }

    public function showRequest(Request $request, $id){
        $store = Store::find($id);
        if(isset($store)){
            return response()->json($store, 200);
        }else{
            return response()->json(404);
        }
    }
}
