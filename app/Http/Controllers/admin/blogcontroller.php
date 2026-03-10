<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class blogcontroller extends Controller
{
    public function blog_page()
    {
        return view('admin.blogs.add_blog');
    }


    public function blog_add(Request $request){
    if($request->hasFile('image')){

$img="blkheartyt".time().'.'.$request->file('image')->extension();
$request->file('image')->move(public_path('show_blogs'),$img);

    }

    else{


    echo 'no image found';
    }
$arrayname=array('title'=>$request->title,

                  'slug'=>$request->slug,
                  'author_name'=>$request->author_name,
                  'published_date'=>$request->published_date,
                  'image'=>$img,
                  'status'=>$request->status,
                  "short_description"=>$request->short_description,
                  "content"=>$request->content,
                  "meta_title"=>$request->meta_title,
                  "meta_description"=>$request->meta_description,

);

// dd($arrayname);
DB::table('blogs_tables')->insert($arrayname);
return back()->with('status', 'Blog added successfully!');

    }
    public function show_blogs(){
$blogs=DB::table('blogs_tables')->get();
return view('admin.blogs.show_blog', compact('blogs'));

    }
    public function blog_delete($id){
DB::table('blogs_tables')->where('id',$id)->delete();

return redirect('admin/blogs/show_blogs')->with('success','blog deleted successfully');

    }

    public function blog_edit($id){
    $blogs=DB::table('blogs_tables')->where('id',$id)->first();
return view('admin.blogs.edit_blog', compact('blogs'));
}
public function blog_update(Request $request, $id){
if($request->hasFile('image')){

$img="blkheartyt".time().'.'.$request->file('image')->extension();
$request->file('image')->move(public_path('show_blogs'),$img);

    }

    else{

$img=$request->old_image;
    }
$arrayname=['title'=>$request->title,

                //   'slug'=>$request->slug,
                //   'author_name'=>$request->author_name,
                //   'published_date'=>$request->published_date,
                  'image'=>$img,
                  'status'=>$request->status,
                  "short_description"=>$request->short_description,
                //   "content"=>$request->content,
                //   "meta_title"=>$request->meta_title,
                //   "meta_description"=>$request->meta_description


];
//  dd($arrayname);
DB::table('blogs_tables')->where('id',$id)->update($arrayname);
return redirect('admin/blogs/show_blogs')->with('success','blogs updated successfully');


}
}

