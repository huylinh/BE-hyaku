<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Models\History;

class ReviewController extends Controller
{
    public function store(Request $request) {
        $validatedData = $request->validate([
            'stars' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
            'picture' => 'nullable|url',
            'store_id' => 'required|integer|exists:stores,id',
            'user_id' => 'required|integer|exists:users,id'
        ]);

        try {
            $review = Review::create($validatedData);

            // Create a new history record
            History::create([
                'review_id' => $review->id,
                'visited_time' => now()
            ]);

            return response()->json(['message' => "success"], 201);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 400);
        }
    }


    public function index(Request $request)
    {
        $reviews = Review::with(['history','user:id,name'])
        ->when($request->input('store_id'), function ($query, $store_id) {
            $query->where('store_id', $store_id);
        })
        ->get();
        return response()->json($reviews, 200);
    }
}
