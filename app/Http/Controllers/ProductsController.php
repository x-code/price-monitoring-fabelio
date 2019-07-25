<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductComment;
use App\ProductCommentVote;
use Illuminate\Http\Request;
use Scrapper;

class ProductsController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function lists()
    {
        $products = Product::latest()->get();
        return view('products.list')->with(compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'link' => 'required|string'
        ]);

        $crawler = Scrapper::request('GET', $request->link);
        $title = $crawler->filter('.page-title span')->text();
        $desc = $crawler->filter('#description')->html();
        $special_price = $crawler->filter('.product-info-main  .special-price .price-wrapper span')->text();
        $old_price = $crawler->filter('.product-info-main  .old-price .price-wrapper span')->text();
        $images = $crawler->filter('.yotpo-main-widget')->attr('data-image-url');
        if (!empty($special_price) && !empty($old_price)) {
            $type_price = "promo";
            $special_price = $special_price;
            $old_price = $old_price;
            $price = $crawler->filter('.product-info-main .special-price .price-wrapper span')->text();
        } else {
            $type_price = "flat";
            $special_price = "";
            $old_price = "";
            $price = $crawler->filter('.product-info-main  .price-wrapper span')->text();
        }
        
        $check = Product::where('link_url', $request->link)->first();
        if (empty($check)) {
            $product = Product::create([
                'title' => $title,
                'description' => strip_tags($desc),
                'type_price' => $type_price,
                'special_price' => $special_price,
                'old_price' => $old_price,
                'price' => $price,
                'images' => $images,
                'link_url' => $request->link
            ]);
            return redirect()->route('product.detail', [$product->id]);
        }else{
            $request->session()->flash('status', 'Url already exists in product list');
            return back();
        }
    }

    public function detail($id)
    {
        $product = Product::find($id);
        return view('products.detail')->with(compact('product'));
    }

    public function storeComment(Request $request, $product_id)
    {
        $request->validate([
            'comment' => 'required|string'
        ]);

        $product = Product::findOrFail($product_id);
        $product->comments()->create([
            'comment' => $request->comment
        ]);

        $request->session()->flash('status', 'Comment has been added!');
        return back();
    }

    public function storeUpvote(Request $request, $product_id, $comment_id)
    {
        $product = Product::findOrFail($product_id);
        $comment = ProductComment::findOrFail($comment_id);
        $comment->comment_votes()->create([
            'type' => 'upvote'
        ]);

        $request->session()->flash('status', 'Comment has been upvoted!');
        return back();
    }

    public function storeDownvote(Request $request, $product_id, $comment_id)
    {
        $product = Product::findOrFail($product_id);
        $comment = ProductComment::findOrFail($comment_id);
        $comment->comment_votes()->create([
            'type' => 'downvote'
        ]);

        $request->session()->flash('status', 'Comment has been downvote!');
        return back();
    }
}
