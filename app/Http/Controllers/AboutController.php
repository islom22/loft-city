<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Category;
use Illuminate\Http\Request;

class   AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = About::latest()->paginate(10);
        return view('app.about.index', compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.about.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
   
        $request->validate([
            'img1' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'img2' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'img3' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // 'video' => 'required|mimes:mp4,mov,ogg | max:20000',
            // 'phone' => 'required'
        ]);
       
       $about = new About();
       if($request->hasfile('img1'))
       {
           $file = $request->file('img1');
           $extention = $file->getClientOriginalExtension();
           $filename = time().'.'.$extention;
           $file = $request->file('img1');
           $file->move('uploads/about/', $filename);
           $about->img1 = $filename;
       }
       if($request->hasfile('img2'))
       {
           $file = $request->file('img2');
           $extention = $file->getClientOriginalExtension();
           $filename = time().'.'.$extention;
           $file = $request->file('img2');
           $file->move('uploads/about1/', $filename);
           $about->img2 = $filename;
       }
       if($request->hasfile('img3'))
       {
           $file = $request->file('img3');
           $extention = $file->getClientOriginalExtension();
           $filename = time().'.'.$extention;
           $file = $request->file('img3');
           $file->move('uploads/about2/', $filename);
           $about->img3 = $filename;
       }
       if($request->hasfile('video'))
       {
           $file = $request->file('video');
           $extention = $file->getClientOriginalExtension();
           $filename = time().'.'.$extention;
           $file = $request->file('video');
           $file->move('uploads/video/', $filename);
           $about->video = $filename;
       }
        $about->address1 = $request->input('address1');
        $about->phone = $request->input('phone');
        $about->address2 = $request->input('address2');
        $about->address3 = $request->input('address3');
        $about->telegram_user = $request->input('telegram_user');
        $about->telegram_link = $request->input('telegram_link');
        $about->instagram = $request->input('instagram');
        $about->save();

        return redirect()->route('abouts.index')->with(['message' => 'Successfully added!']);
    }

    public function upload_about_image_1(Request $request)
    {
        //   dd($request->all());
        $request->validate([
            'img1' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $about = About::find($request->id);

        $file = $request->file('img1');
        $extention = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extention;
        $file->move('uploads/about/', $filename);
        $about->img1 = $filename;


        $about->save();

        return redirect()->back()->with('message', 'Image Upload Successfully');
    }

    public function upload_about_image_2(Request $request)
    {
        //   dd($request->all());
        $request->validate([
            'img2' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $about = About::find($request->id);

        $file = $request->file('img2');
        $extention = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extention;
        $file->move('uploads/about1/', $filename);
        $about->img2 = $filename;


        $about->save();

        return redirect()->back()->with('message', 'Image Upload Successfully');
    }

    public function upload_about_image_3(Request $request)
    {
        //   dd($request->all());
        $request->validate([
            'img3' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $about = About::find($request->id);

        $file = $request->file('img3');
        $extention = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extention;
        $file->move('uploads/about2/', $filename);
        $about->img3 = $filename;


        $about->save();

        return redirect()->back()->with('message', 'Image Upload Successfully');
    }

    public function upload_about_video(Request $request)
    {
        //   dd($request->all());
        $request->validate([
            'video' => 'required|mimes:mp4,mov,ogg | max:20000'
        ]);

        $about = About::find($request->id);

        $file = $request->file('video');
        $extention = $file->getClientOriginalExtension();
        $filename = time().'.'.$extention;
        $file = $request->file('video');
        $file->move('uploads/video/', $filename);
        $about->video = $filename;


        $about->save();

        return redirect()->back()->with('message', 'Video Upload Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $about = About::find($id);
        return view('app.about.edit', compact([
            'about'
        ]));
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
        // dd($request->all());
        $request->validate([
            // 'img1' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // 'img2' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // 'img3' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // 'video' => 'required|mimes:mp4,mov,ogg | max:20000',
            // 'phone' => 'required',
        ]);

        $about =About::find($id);
    //    if($request->hasfile('img1'))
    //    {
    //        $file = $request->file('img1');
    //        $extention = $file->getClientOriginalExtension();
    //        $filename = time().'.'.$extention;
    //        $file = $request->file('img1');
    //        $file->move('uploads/about/', $filename);
    //        $about->img1 = $filename;
    //    }
    //    if($request->hasfile('img2'))
    //    {
    //        $file = $request->file('img2');
    //        $extention = $file->getClientOriginalExtension();
    //        $filename = time().'.'.$extention;
    //        $file = $request->file('img2');
    //        $file->move('uploads/about1/', $filename);
    //        $about->img2 = $filename;
    //    }
    //    if($request->hasfile('img3'))
    //    {
    //        $file = $request->file('img3');
    //        $extention = $file->getClientOriginalExtension();
    //        $filename = time().'.'.$extention;
    //        $file = $request->file('img3');
    //        $file->move('uploads/about2/', $filename);
    //        $about->img3 = $filename;
    //    }
    //    if($request->hasfile('video'))
    //    {
    //        $file = $request->file('video');
    //        $extention = $file->getClientOriginalExtension();
    //        $filename = time().'.'.$extention;
    //        $file = $request->file('video');
    //        $file->move('uploads/video/', $filename);
    //        $about->video = $filename;
    //    }
        $about->address1 = $request->input('address1');
        $about->phone = $request->input('phone');
        $about->address2 = $request->input('address2');
        $about->address3 = $request->input('address3');
        $about->telegram_user = $request->input('telegram_user');
        $about->telegram_link = $request->input('telegram_link');
        $about->instagram = $request->input('instagram');
        $about->update();

        return redirect()->route('abouts.index')->with(['message' => 'Successfully updated!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        About::find($id)->delete();

        return redirect()->route('abouts.index')->with(['message' => 'Successfully deleted!']);
    }
}
