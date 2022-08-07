<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    protected $fillable = [
        'video',
        'img1',
        'img2',
        'img3',
        'address1',
        'address2',
        'address3',
        'telegram_user',
        'telegram_link',
        'instagram',
        'phone'
];
}

// public function to_basket(Request $request)
// {
// //   if (session()->has('products_id')) {
// //      $products_id = session()->get('products_id');
// //      $products_count = session()->get('products_count');
// //   } else {
// //      $products_id = [];
// //      $products_count = 0;
// //   }

// //   $products_id[] = $request->product_id;
// //   if(!in_array($request->product_id, session()->get('products_id') ?? [])) {
// //      $products_count++;
// //   }

// //   session()->put('products_id', $products_id);
// //   session()->put('products_count', $products_count);

// //   return back()->with([
// //      'success' => true
// //   ]);
//    // session()->flush();
//    if(session()->has('products.'.$request->product_id)){
//       // session()->get('products.'.$request->product_id);
//    }else{
//       Product::find($request->product_id);
//       session()->put('products.'.$request->product_id.'.product_id', $request->product_id);
//       session()->put('products.'.$request->product_id.'.count', 1);
//       session()->put('products.'.$request->product_id.'.price', 40000);
      
//    }

//    return response()->json(session()->get('products'), 200);
// }
