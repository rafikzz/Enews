<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreAboutRequest;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    use ImageTrait;

    public function create()
    {
        $about =About::get()->first();


        return view('admin.abouts.create',compact('about'));
    }


    public function store(StoreAboutRequest $request)
    {
        $about =About::get()->first();
        if(isset($about)){
            $about->tagline = $request->tagline;
            $about->altimage = $request->altimage;
            $about->brief = $request->brief;
            $about->content = $request->content;

            if($image = $request->file('image')) {
                $path = 'images/pages/';
                $this->deleteImage($about->image);
                $imagePath = $this->uploads($image,$path);
                $about->image =$imagePath;
            }
            $about->save();

        }else{
            if($image = $request->file('image')) {
                $path = 'images/about/';
                $imagePath = $this->uploads($image,$path);
            }
            About::create([
                'tagline'=>$request->tagline,
                'altimage'=>$request->altimage,
                'brief'=>$request->brief,
                'content'=>$request->content,
                'image'=>$imagePath,

            ]);
        }
        return redirect()->route('admin.abouts.create')->with('success','About Us Saved Successfully');
    }
}
