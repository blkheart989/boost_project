<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class testimonialcontroller extends Controller
{
    public function testimonial_page(){
    
        return view('admin.testimonials.add_testimonials');
    }
    public function testimonial_add(Request $request){

if($request->hasFile('image')){
$img='blkheartyt'.rand(111111111,99999999).'.'.$request->file('image')->extension();
$request->file('image')->move(public_path('show_testimonial'),$img);


}
else{

echo "No file found";
}
$arrayname=array(
    'name'=>$request->name,
    'designation'=>$request->designation,
    'description'=>$request->message,
    'image'=>$img,
    'rating'=>$request->rating,
    'status'=>$request->status,


);
// dd($arrayname);
    
    DB::table('testimonials')->insert($arrayname);
    return back()->with('status', 'Testimonial added successfully!');

    }
public function show_testimonial(){
    $testimonials=DB::table('testimonials')->get();
    return view('admin.testimonials.show_testimonials',compact('testimonials'));



    }
    public function delete_testimonial($id){
        DB::table('testimonials')->where('id',$id)->delete();
        return redirect('admin/testimonials/show')->with('status', 'Testimonial deleted successfully!');
    }
    public function edit_testimonial($id){
        $testimonial=DB::table('testimonials')->where('id',$id)->first();
        return view('admin.testimonials.edit_testimonial',compact('testimonial'));
}
public function update_testimonial(Request $request,$id){
    if($request->hasFile('image')){
        $img='blkheartyt'.rand(111111111,99999999).'.'.$request->file('image')->extension();
        $request->file('image')->move(public_path('show_testimonial'),$img);
        
        
        }
        else{
        
        echo "No file found";
        }
        $arrayname=array(
            'name'=>$request->name,
            'designation'=>$request->designation,
            'description'=>$request->message,
            'image'=>$img,
            'rating'=>$request->rating,
            'status'=>$request->status,
        
        
        );
        
        DB::table('testimonials')->where('id',$id)->update($arrayname);
        return redirect('admin/testimonials/show')->with('status', 'Testimonial updated successfully!');
}
}