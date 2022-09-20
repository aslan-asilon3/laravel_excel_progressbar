<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
        return view('pages.index');
    }

    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'title'     => 'required',
        //     'file'     => 'required|file',
        // ]);
    
        $title = "Someone Name";

        $filename = time().'.'.request()->file->getClientOriginalExtension();

        $request->file->move(public_path('blogs'),$filename);

        $blog = new Blog;
        $blog->title = $title;
        $blog->file = $filename;
        $blog->save();

        // alert()->success('Success','Your Data Saved !');
        return view('pages.index');
        // toast('Success Toast','success');

    }



}
