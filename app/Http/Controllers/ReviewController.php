<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Models\History;

class ReviewController extends Controller
{
    public function store(Request $request) {
        $data = $request->all();
        try {
            $reviews = Review::created($data);
            return response()->json(['message' => 'success'], 201);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'error'], 400);
        }
    }
    
    public function index(Request $request)
    {
        $reviews = Review::with(['history.user:id,name'])
        ->when($request->input('store_id'), function ($query, $store_id) {
            $query->whereHas('history', function ($query) use ($store_id) {
                $query->where('store_id', $store_id);
            });
        })
        ->get();

    return response()->json($reviews, 200);
    }
}
