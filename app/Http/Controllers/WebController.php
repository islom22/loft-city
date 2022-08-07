<?php

namespace App\Http\Controllers;

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
      $admins = Product::with('productImage', 'category')->paginate(5);
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
      // dd($request->all());
      // $request->validate([
      //    'name' => 'required|max:255',
      //    'phone' => 'required|max:255',
      //    // 'payment' => 'required',
      //    // 'role' => 'required',
      //    // 'email' => 'required',
      //    // 'city' => 'required',
      //    // 'address' => 'required'
      // ]);
      $data = $request->all();
      // dd($request->all());
      $data['phone'] = $request->phone;
      $data['payment_method'] = $request->payment_method;
      $data['with_delivery'] = $request->with_delivery;
      $data['products'] = session()->has('products_id') ? session()->get('products_id') : [];
      // dd($data); 
      $order = Order::create($data);

      foreach ($data['products'] as $id) {

         OrderProduct::create([
            'order_id' => $order->id,
            'product_id' => $id
         ]);
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
      $request->validate([
         'dastavka' => 'required|max:255'
      ]);
      Dastavka::truncate();
    $dast=  Dastavka::create([
         'dastavka' => request('dastavka')
      ]);



      $products = Product::with('category')
         ->paginate(10);
      $categories = Category::all();
      // $dast = Dastavka::all()->last();

      return back()->with([
         'products' => $products,
         'categories' => $categories,
         'dast' => $dast,
         'message' => 'Заказ оформлен! Скоро с вами свяжемся'
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

   //  public function order(Request $request)
   //  {
   //      // dd($request->all());
   //      $request->validate([
   //       'name' => 'required',
   //       'email' => 'required',
   //       'phone' => 'required',
   //       'city' => 'required',
   //       'address' => 'required',
   //    ]);

   //   $order = new Order();
   //   $order->name = $request->input('name');
   //   $order->email = $request->input('email');
   //   $order->phone = $request->input('phone');
   //   $order->city = $request->input('city');
   //   $order->address = $request->input('address');
   //   $order->role = $request->input('role');
   //   $order->payment = $request->input('payment');
   //   $order->save();
   //   return redirect()->route('reservation_page')->with('message','Order Added Successfully');
   //  }

}
