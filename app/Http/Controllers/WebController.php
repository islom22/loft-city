<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class WebController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $products = Product::with('category','productImage')->get();   
      $categories = Category::all()->take(5);
      $abouts = About::latest()->first();
       return view('index',compact('products','categories','abouts'));
    }

    public function products()
    {
       $products = Product::with('category','productImage')->get();   
       $categories = Category::all();
       $abouts = About::latest()->first();
       return view('products',compact('products','categories','abouts'));
    }

    public function about_company()
    {
        $abouts = About::latest()->first();
         $categories = Category::all();
       return view('about_company',compact('abouts','categories','abouts'));
    }

    public function inner_page($id)
    {
        $products = Product::with('productImage','category')->findOrFail($id);
      //   dd($products);
        $images = ProductImage::find($id);
        $categories = Category::all();
        $abouts = About::latest()->first();
       return view('inner_page',compact('products','images','categories','abouts'));
    }
    
    public function reservation_page()
    {
      $categories = Category::all();
      $abouts = About::latest()->first();
       return view('reservation_page',compact('categories','abouts'));
    }

    public function categories_show($category_id)
    {
       $products = Product::with('category','productImage')->where('category_id', $category_id)->paginate(20);
       $categories = Category::all();
       $abouts = About::latest()->first();
       return view('categories_show',compact('products','categories','abouts'));
    }
}
