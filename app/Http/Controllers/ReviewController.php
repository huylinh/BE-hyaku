<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

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
}
