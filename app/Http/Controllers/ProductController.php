<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Dastavka;
use App\Models\Lang;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Termwind\Components\Dd;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('category')
            ->paginate(10);
        $categories = Category::all();
        $dast = Dastavka::all()->firstOrFail();

        return view('app.product.index', compact(
            'products',
            'categories',
            'dast'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $languages = Lang::all();
        $products = Product::all();

        return view('app.product.create', compact(
            'categories',
            'products',
            'languages'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function uploadImage(Request $request)
    {
        $request->validate([
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $product = Product::find($request->id);
        $item = $request->file('img');
        if ($request->hasFile('img')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($item->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $uploade_path = 'upload/product_image/';
            $image_url = $uploade_path . $image_full_name;
            $item->move($uploade_path, $image_full_name);

            ProductImage::create([
                'img' => $image_url,
                'product_id' => $product->id
            ]);

            return redirect()->back()->with('message', 'Image Upload Successfully');
        }
        return redirect()->back()->withErrors('message', 'Image Upload Error');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $request->validate([
            'title.ru' => 'required|max:255',
            'title' => 'required',
            // 'category_id' => 'required',
            'img.*' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
            'img' => 'required'
        ]);

        $product = Product::create($data);
        if ($request->hasFile('img')) {
            foreach ($request->file('img') as $item) {
                $image_name = md5(rand(1000, 10000));
                $ext = strtolower($item->getClientOriginalExtension());
                $image_full_name = $image_name . '.' . $ext;
                $uploade_path = 'upload/product_image/';
                $image_url = $uploade_path . $image_full_name;
                $item->move($uploade_path, $image_full_name);

                ProductImage::create([
                    'img' => $image_url,
                    'product_id' => $product->id
                ]);
            }

            return redirect()->route('products.index')->with('message', 'Product Added Successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     $products = Product::find($id);
    //     $categories = Product::with('category')->get();
    //     return view('app.products.show',compact('products','categories'));
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $product = Product::with('productImage')->findOrFail($id);
        $languages = Lang::all();
        // $image = ProductImage::all();
        return view('app.product.edit', compact(
            'product',
            'categories',
            'languages',
            // 'image'
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
        
        $request->validate([
            'title.ru' => 'required',
            'category_id' => 'required',
            // 'img.*' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // 'img' => 'required'
        ]);

        $product =  Product::find($id);
        $product->category_id = $request->input('category_id');
        $product->title = $request->input('title');
        $product->subtitle = $request->input('subtitle');
        $product->brand = $request->input('brand');
        $product->left = $request->input('left');
        $product->price = $request->input('price');
        $product->desc = $request->input('desc');
        $product->info = $request->input('info');
        // if ($request->hasfile('img')) {
        //     $destination = 'uploads/product_image/' . $product->img;
        //     if (File::exists($destination)) {
        //         File::delete($destination);
        //     }
        //     // $file = $request->file('img');
        //     // $extention = $file->getClientOriginalExtension();
        //     // $filename = time().'.'.$extention;
        //     // $file->move('uploads/product_image/', $filename);
        //     // $product->img = $filename;
        //     foreach ($request->file('img') as $item) {
        //         $image_name = md5(rand(1000, 10000));
        //         $ext = strtolower($item->getClientOriginalExtension());
        //         $image_full_name = $image_name . '.' . $ext;
        //         $uploade_path = 'upload/product_image/';
        //         $image_url = $uploade_path . $image_full_name;
        //         $item->move($uploade_path, $image_full_name);


        //         ProductImage::updated([
        //             'img' => $image_url,
        //             'product_id' => $product->id
        //         ]);
        //     }
            $product->update();
            // dd($product);
            return redirect()->route('products.index')->with('message', 'Product Edit Successfully');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = Product::find($id);
        $destination = 'uploads/product/' . $products->img;
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $products->delete();
        return back()->with('message', 'Product Delete Successfully');
    }

    public function products($category_id = null)
    {
        $products = Product::all();
        $categories = Category::all();
        if ($category_id) {
            $products = Product::where(
                'category_id',
                $category_id
            )->get();
        }

        return view('main.products', compact(
            'products',
            'categories'
        ));
    }

    public function shows($id)
    {
        $item = Product::find($id);
        $pro = Product::all();
        return view('main.show', compact('item', 'pro'));
    }
}
