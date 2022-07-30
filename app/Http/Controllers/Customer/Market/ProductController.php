<?php

namespace App\Http\Controllers\Customer\Market;

use Illuminate\Http\Request;
use App\Models\Market\Product;
use App\Models\Content\Comment;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Content\CommentRequest;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function product(Product $product)
    {
        $relatedProducts = Product::all();
        $comments = $product->comments()->where('approved', 1)->where('status', 1)->where('parent_id', null)->orderBy('created_at', 'desc')->get();
        return view('customer.product', compact('product', 'relatedProducts', 'comments'));
    }

    public function addComment(CommentRequest $request, Product $product)
    {
        // dd('hi');
        $inputs = $request->all();
        $inputs['author_id'] = Auth::user()->id;
        $inputs['body'] = str_replace(PHP_EOL, '<br>', $inputs['body']);
        $inputs['commentable_id'] = $product->id;
        $inputs['commentable_type'] = Product::class;
        $inputs['approved'] = 0;
        $inputs['status'] = 0;
        $inputs['seen'] = 0;
        // dd($inputs);

        $comment = Comment::create($inputs);
        // dd($comment);

        return back();
    }

    public function addToFavorite(Product $product)
    {
        if (Auth::check()) {
            $product->user()->toggle([Auth::user()->id]);
            if ($product->user->contains(Auth::user()->id)) {
                return response()->json(['status' => 1]);
            } else {
                return response()->json(['status' => 2]);
            }
        } else {
            return response()->json(['status' => 3]);
        }
    }
}
