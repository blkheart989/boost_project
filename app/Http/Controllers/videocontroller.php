<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class videocontroller extends Controller
{
    public function video(){



        return view('admin.videos_recharge.video');
    }

    public function store(Request $request){
        // dd($request->all());

    
    $request->validate([
    'video' => 'required|file|mimetypes:video/mp4,video/quicktime,video/x-matroska,video/webm|max:51200'
]);
    // dd($request->all());
        
        if($request->Hasfile('video')){
$video='blkheartyt'.time().'.'.$request->file('video')->extension();
$request->file('video')->move(public_path('videos'),$video);

        }
        else{
            return $request;
            $video='';
        }
        $videoname=array(
'title'=>$request->title,
'description'=>$request->description,
'video'=>$video

        );
        // dd($videoname);
        DB::table('videos_tables')->insert($videoname);
        return back()->with('success','Video Uploaded Successfully');
}
}