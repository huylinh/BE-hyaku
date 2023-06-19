<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\History;

class ReviewController extends Controller
{
    public function index(Request $request)
    {
        // $reviews = Review::join('histories', 'reviews.history_id', '=', 'histories.id')
        // ->get();
        $reviews =  Review::with(['history'])
        ->get();

        $arr = [
            'status' => true,
            'message' => 'Api reviews',
            'data' => $reviews
        ];
        return response()->json($arr, 201);
    }

    public function getReviewsByStoreId(Request $request, $id_stored)
    {
        // $reviews = Review::join('histories', 'reviews.history_id', '=', 'histories.id')
        $reviews =  Review::with(['history'])
        ->where('reviews.store_id','=', $id_stored)
        ->get();

        $arr = [
            'status' => true,
            'message' => 'Api get review by store',
            'data' => $reviews
        ];
        return response()->json($arr, 201);
    }
}
