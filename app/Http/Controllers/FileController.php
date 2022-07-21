<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = File::latest()->paginate(10);
        return view('app.files.index',compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.files.create');
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
            'file' => 'required|mimes:pdf,xlx,csv|max:2048',
        ]);

        
        $admin = new File();
        if($request->hasfile('file'))
        {
            $file = $request->file('file');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/file/', $filename);
            $admin->file = $filename;
        }
        $admin->save();
        return redirect()->route('files.index')->with('message', "File Added Successfully");
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
        $file = File::find($id);
        return view('app.files.edit',compact('file'));
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
            'file' => 'required|mimes:pdf,xlx,csv|max:2048',
        ]);

        $admin = File::find($id);
        if($request->hasfile('file'))
        {
            $destination = 'uploads/file/'.$admin->file;
            if(File::exists($destination)){
                // File::delete($destination);
            }
            $file = $request->file('file');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/file/', $filename);
            $admin->file = $filename;
        }
        $admin->update();
        return redirect()->route('files.index')->with('message', 'File Edit Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $files = File::find($id);
        // $destination = 'uploads/file/'.$files->file;
        // if(File::exists($destination)){
        //     File::delete($destination);
        // }
        $files->delete();
        return redirect()->back()->with('message', 'File Delete Successfully');
    }
}
