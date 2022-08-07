<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Lang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::latest()->paginate(10);
        return view('app.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $languages = Lang::all();
        return view('app.category.create', compact('languages'));
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
            'title.ru' => 'required|min:1|max:255',
            'img' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        // dd($request->title);

        $category = new Category();
        if ($request->hasfile('img')) {
            $file = $request->file('img');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/category/', $filename);
            $category->img = $filename;
        }
        $category->title = $request->title;
        $category->save();
        return redirect()->route('categories.index')->with('message', "Category Added Successfully");
    }

    public function upload_category_image(Request $request)
    {
        //   dd($request->all());
        $request->validate([
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $category = Category::find($request->id);

        $file = $request->file('img');
        $extention = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extention;
        $file->move('uploads/category/', $filename);
        $category->img = $filename;


        $category->save();

        return redirect()->back()->with('message', 'Image Upload Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        return view('app.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $languages = Lang::all();
        return view('app.category.edit', compact('category', 'languages'));
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
            // 'img' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title.ru' => 'required|min:1|max:255'
        ]);

        $category = Category::find($id);
        // if($request->hasfile('img'))
        // {
        //     $destination = 'uploads/category/'.$category->img;
        //     if(File::exists($destination)){
        //         File::delete($destination);
        //     }
        //     $file = $request->file('img');
        //     $extention = $file->getClientOriginalExtension();
        //     $filename = time().'.'.$extention;
        //     $file->move('uploads/category/', $filename);
        //     $category->img = $filename;
        // }
        $category->title = $request->title;
        $category->update();
        return redirect()->route('categories.index')->with('message', 'Category Edit Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $destination = 'uploads/category/' . $category->img;
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $category->delete();
        return redirect()->back()->with('message', 'Category Delete Successfully');
    }
}
