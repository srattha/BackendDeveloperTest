<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Product;
use App\Models\User;

class ReviewController extends Controller
{
    
    public function store(Request $request, $productId)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string'
        ]);

        $product = Product::find($productId);
        if (!$product) {
            return response()->json([
                'status' => 'error',
                'message' => 'Product not found'
            ], 404);
        }

        $review = Review::create([
            'user_id' => auth()->id(),
            'product_id' => $productId,
            'rating' => $request->rating,
            'comment' => $request->comment
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Review added successfully',
            'data' => $review
        ], 201);
    }

    public function productReviews($productId)
    {
        $product = Product::with('reviews.user')->find($productId);

        if (!$product) {
            return response()->json([
                'status' => 'error',
                'message' => 'Product not found'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $product->reviews
        ]);
    }


    public function userReviews($userId)
    {
        $user = User::with('reviews.product')->find($userId);

        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'User not found'
            ], 404);
        }

        $reviews = $user->reviews->map(function($review) {
            return [
                'id' => $review->id,
                'product' => [
                    'id' => $review->product->id,
                    'name' => $review->product->name
                ],
                'rating' => $review->rating,
                'comment' => $review->comment
            ];
        });

        return response()->json([
            'status' => 'success',
            'data' => $reviews
        ]);
    }

}
