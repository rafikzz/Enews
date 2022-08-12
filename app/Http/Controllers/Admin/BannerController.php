<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreBannerRequest;
use App\Http\Requests\Admin\UpdateBannerRequest;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    use ImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $banners = Banner::orderBy('order','asc')->orderBy('created_at','desc')->get();
        return view('admin.banners.index',compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banners.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBannerRequest $request)
    {
        $imagePath=null;
        if($image = $request->file('image')) {
            $path = 'images/banners/';
            $imagePath = $this->uploads($image,$path);
        }
        Banner::create([
            'title'=>$request->title,
            'image'=>$imagePath,

        ]);

        return redirect()->route('admin.banners.index')->with('success','Banner created successfully');

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
    public function edit(Banner $banner)
    {

        return view('admin.banners.edit',compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBannerRequest $request, Banner $banner)
    {
        $banner->title = $request->title;
        if($image = $request->file('image')) {
            $path = 'images/banners/';
            $this->deleteImage($banner->image);
            $imagePath = $this->uploads($image,$path);
            $banner->image =$imagePath;
        }
        $banner->save();

        return redirect()->route('admin.banners.index')->with('success','Banner updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        $this->deleteImage($banner->image);
        $banner->delete();
        return redirect()->route('admin.banners.index')->with('success','Banner deleted successfully');
    }

    public function changeStatus(Request $request)
    {

        $bannerId = $request->banner_id;
        $status =  $request->status;
        Banner::whereId($bannerId)->update(['status' => $status]);

        return response()->json([
            'success' => true,
            'status' => $status == 1 ? 'Active' : 'Inactive',
            'message' => 'Status Successfully Changed!',
        ]);
    }

    public function updateOrder(Request $request)
    {
        $banners = Banner::get();

        foreach ($banners as $banner) {
            foreach ($request->order as $order) {
                if ($order['id'] == $banner->id) {
                    $banner->update(['order' => $order['position']]);
                }
            }

        }

        return response('Update Successfully.', 200);
    }

}
