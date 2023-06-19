<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\History;

class ReviewController extends Controller
{
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
