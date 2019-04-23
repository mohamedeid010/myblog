<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Yajra\Datatables\Datatables;
use Session;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.all');
    }

    // ajax function for PostsController
    public function getdata()
    {
      $posts = Post::select('id','title');
      return Datatables::of($posts)->addIndexColumn()
      ->addColumn('action', function($row){

             $btn = '<a href="'.route("post.edit",["id"=>$row->id]).'" data-toggle="tooltip"
             data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct">تعديل</a>';

             $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'"
             data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">حذف</a>';

              return $btn;
      })
      ->rawColumns(['action'])
      ->make(true);;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate form data
        $article = $this->validate($request,[
          'title' => 'required',
          'image' => 'required|image|mimes:jpeg,png,jpg,gif',
          'content' => 'required',
        ],[
          "title.required" => "يرجى ادخال عنوان الموضوع",
          "image.required" => "يجب رفع صورة",
          "image.image" => "يرجي التاكد من الصوره المرفوعه",
          "image.mimes" => " jpeg,png,jpg,gifيجب ان يكون اكتداد الصوره ",
          "content.required" => "يجب ادخال محتوى",
        ]);
        $image = $request->image;
        $new_image = time().$image->getClientOriginalName();
        $image->move('uploads/posts', $new_image);
        $article = new Post;
        $article->title = $request->title;
        $article->image = $new_image;
        $article->body = $request->content;
        $article->save();
        Session::flash('success','post has been created successfuly');
        return redirect()->route('posts');
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
        $post = Post::find($id);
        return view('admin.posts.edit')->with('post',$post);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
