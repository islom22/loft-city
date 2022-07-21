<?php

namespace App\Http\Controllers;

use App\Models\Lang;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews = Review::with('product')->paginate(10);
        return view('app.review.index',compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = Product::all();
        $languages = Lang::all();
        return view('app.review.create',compact('product',
        'languages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'product_id' => 'required',
            'comment' => 'required',
         ]);

        $review = new Review();
        $review->comment = $request->input('comment');
        $review->product_id = $request->input('product_id');
        // $review->status = $request->input('status');
        $review->save();    
        return redirect()->route('reviews.index')->with('message','Product Added Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::all();
        $review = Review::find($id);
        $languages = Lang::all();
        return view('app.review.edit',compact(
            'product',
            'review',
            'languages'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all);
        $request->validate([
            'product_id' => 'required',
            'comment' => 'required'
         ]);    

        $review =  Review::find($id);
        $review->comment = $request->input('comment');
        $review->product_id = $request->input('product_id');
        $review->status = $request->input('status');
        $review->update();
        return redirect()->route('reviews.index')->with('message','Review Edit Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = Review::find($id);
        $products->delete();
        return back()->with('message','Product Delete Successfully');
    }

}
