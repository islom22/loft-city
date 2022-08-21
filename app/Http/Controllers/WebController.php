<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Models\About;
use App\Models\Category;
use App\Models\Dastavka;
use App\Models\File;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class    WebController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      $products = Product::with('category', 'productImage')->get();
      $categories = Category::all()->take(5);
      $abouts = About::latest()->first();
      $files = File::latest()->first();
      return view('index', compact('products', 'categories', 'abouts', 'files'));
   }

   public function products()
   {
      $products = Product::with('category', 'productImage')
         ->paginate(6);

      $categories = Category::all();

      $abouts = About::latest()
         ->first();
      $files = File::latest()->first();

      return view('products', compact(
         'products',
         'categories',
         'abouts',
         'files'
      ));
   }

   public function about_company()
   {
      $abouts = About::latest()->first();
      $categories = Category::all();
      $files = File::latest()->first();
      return view('about_company', compact(
         'abouts',
         'categories',
         'abouts',
         'files'
      ));
   }

   public function inner_page($id)
   {
      $products = Product::with('productImage', 'category')->findOrFail($id);
      //   dd($products);
      $images = ProductImage::find($id);
      $categories = Category::all();
      $abouts = About::latest()->first();
      // $admins = Product::with('productImage', 'category')->paginate(5);
      $admins = Product::where('id', '!=', $id)
         ->where('category_id', $products->category_id)
         ->take(4)
         ->get();
      $files = File::latest()->first();
      return view('inner_page', compact(
         'products',
         'images',
         'categories',
         'abouts',
         'admins',
         'files'
      ));
   }


   public function reservation_page()
   {
      // session()->flush('products_id');
      // session()->flush('products_count');
      $categories = Category::all();
      $abouts = About::latest()->first();
      $dast = Dastavka::all()->first();
      $files = File::latest()->first();
      return view('reservation_page', compact(
         'categories',
         'abouts',
         'dast',
         'files'
      ));
   }

   public function categories_show($category_id)
   {
      $category = Category::find($category_id);

      $products = Product::with('category', 'productImage')
         ->where('category_id', $category_id)
         ->paginate(6);

      $categories = Category::all();

      $abouts = About::latest()
         ->first();
      $files = File::latest()->first();

      return view('categories_show', compact(
         'products',
         'categories',
         'abouts',
         'category',
         'files'
      ));
   }

   public function to_basket(Request $request)
   {
      if (session()->has('products_id')) {
         $products_id = session()->get('products_id');
         $products_count = session()->get('products_count');
      } else {
         $products_id = [];
         $products_count = 0;
      }

      $products_id[] = $request->product_id;
      if (!in_array($request->product_id, session()->get('products_id') ?? [])) {
         $products_count++;
      }

      session()->put('products_id', $products_id);
      session()->put('products_count', $products_count);

      return back()->with([
         'success' => true
      ]);
   }

   public function from_basket(Request $request)
   {
      if (session()->has('products_id')) {
         $products_id = session()->get('products_id');
         $products_id = array_diff($products_id, [$request->product_id]);
         $products_id = array_values($products_id);
         session()->forget('products_id');
         session()->put('products_id', $products_id);

         $products_count = session()->get('products_count');
         $products_count = $products_count - 1;
         session()->forget('products_count');
         session()->put('products_count', $products_count);
      } else {
         return back()->with([
            'success' => false
         ]);
      }

      return back()->with([
         'success' => true
      ]);
   }

   public function order(Request $request)
   {
     
      $data = $request->all();
      $data['phone'] = $request->phone;
      $data['payment_method'] = $request->payment_method;
      $data['with_delivery'] = $request->with_delivery;
      $data['products'] = session()->has('products_id') ? session()->get('products_id') : [];
      $order = Order::create($data);

      foreach ($data['products'] as $id) {
         if (!OrderProduct::where('order_id', $order->id)->where('product_id', $id)->first()) {
            OrderProduct::create([
               'order_id' => $order->id,
               'product_id' => $id
            ]);
         }
      }

      session()->forget('products_id');
      session()->forget('products_count');

      return back()->with([
         'success' => true,
         'message' => 'Заказ оформлен! Скоро с вами свяжемся'
      ]);
   }

   public function dastavka(Request $request)
   {
      $data = $request->all();
      $data['dastavka'] = preg_replace('/\D/', '', $data['dastavka']);
      
      $validator = Validator::make($data, [
         'dastavka' => 'required|integer'
      ]);
      if($validator->fails()) {
         return back()->with([
            'sucecss' => false,
            'message' => $validator->errors()
         ]);
      }

      Dastavka::truncate();
     
      Dastavka::create([
         'dastavka' => $data['dastavka']
      ]);

      return back()->with([
         'message' => 'Dastavka Upload Successfully'
      ]);
   }

   public function session_delete()
   {
      session()->forget('products_id');
      session()->forget('products_count');

      return back()->with([
         'success' => true,
         'message' => 'Заказ оформлен! Скоро с вами свяжемся'
      ]);
   }

}
