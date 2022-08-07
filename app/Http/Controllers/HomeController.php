<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function component(){
        return view('component.main_page');
    }

      // upload image for CKEditor
      public function uploadImage(Request $request) {
        if ($request->hasFile('upload')) {
            $fileName = time().'.'.$request->file('upload')->getClientOriginalExtension();

            $request->file('upload')->move(public_path('upload'), $fileName);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('upload/'.$fileName);
            $msg = 'Image upload successfully!';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
    }

    public function deleteImage(Request $request){

        if(!$files = ProductImage::find($request->id)){
            return redirect()->back()->withErrors('message', 'Image not found');
        }
        
        $destination = 'upload/product_image/'.$files->file;
        if(File::exists($destination)){
            File::delete($destination);
        }
        $files->delete();
        return redirect()->back()->with('message', 'Image Delete Successfully');
        }

    public function delete_image_category(Request $request){
        if(!$files = Category::find($request->id)){
            return redirect()->back()->withErrors('message', 'Image not found');
        }
        $destination = 'uploads/category/'.$files->img;
        if(File::exists($destination)){
            File::delete($destination);
        }
        $files->update([
            'img' => null
        ]);
        return redirect()->back()->with('message', 'Image Delete Successfully');
        
    }

    public function delete_image_about(Request $request){
        if(!$files = About::find($request->id)){
            return redirect()->back()->withErrors('message', 'Image not found');
        }
        $destination = 'uploads/about/'.$files->img1;
        if(File::exists($destination)){
            File::delete($destination);
        }
        $files->update([
            'img1' => null
        ]);
        return redirect()->back()->with('message', 'Image Delete Successfully');
        
    }

    public function delete_image_about_2(Request $request){
        if(!$files = About::find($request->id)){
            return redirect()->back()->withErrors('message', 'Image not found');
        }
        $destination = 'uploads/about1/'.$files->img2;
        if(File::exists($destination)){
            File::delete($destination);
        }
        $files->update([
            'img2' => null
        ]);
        return redirect()->back()->with('message', 'Image Delete Successfully');
        
    }

    public function delete_image_about_3(Request $request){
        if(!$files = About::find($request->id)){
            return redirect()->back()->withErrors('message', 'Image not found');
        }
        $destination = 'uploads/about2/'.$files->img3;
        if(File::exists($destination)){
            File::delete($destination);
        }
        $files->update([
            'img3' => null
        ]);
        return redirect()->back()->with('message', 'Image Delete Successfully');
        
    }

    public function delete_video_about(Request $request){
        if(!$files = About::find($request->id)){
            return redirect()->back()->withErrors('message', 'Video not found');
        }
        $destination = 'uploads/video/'.$files->video;
        if(File::exists($destination)){
            File::delete($destination);
        }
        $files->update([
            'video' => null
        ]);
        return redirect()->back()->with('message', 'Video Delete Successfully');
        
    }

    public function delete_file(Request $request){
        if(!$files = File::find($request->id)){
            return redirect()->back()->withErrors('message', 'File not found');
        }
        $destination = 'uploads/file/'.$files->file;
        if(File::exists($destination)){
            File::delete($destination);
        }
        $files->update([
            'file' => null
        ]);
        return redirect()->back()->with('message', 'File Delete Successfully');
        
    }

    }  


    
    
