<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreGalleryRequest;
use App\Http\Requests\Admin\UpdateGalleryRequest;
use App\Models\Gallery;
use App\Models\SubGallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
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
        $galleries = Gallery::withCount('subgalleries')->orderBy('order','asc')->orderBy('created_at','desc')->get();
        return view('admin.galleries.index',compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.galleries.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGalleryRequest $request)
    {
        $imagePath=null;
        if($image = $request->file('image')) {
            $path = 'images/galleries/';
            $imagePath = $this->uploads($image,$path);
        }
        Gallery::create([
            'title'=>$request->title,
            'image'=>$imagePath,

        ]);

        return redirect()->route('admin.galleries.index')->with('success','Gallery created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gallery= Gallery::findOrFail($id);
        $subgalleries = SubGallery::where('gallery_id',$gallery->id)->paginate(8);
        return view('admin.galleries.show',compact('gallery','subgalleries'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {

        return view('admin.galleries.edit',compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGalleryRequest $request, Gallery $gallery)
    {
        $gallery->title = $request->title;
        if($image = $request->file('image')) {
            $path = 'images/galleries/';
            $this->deleteImage($gallery->image);
            $imagePath = $this->uploads($image,$path);
            $gallery->image =$imagePath;
        }
        $gallery->save();

        return redirect()->route('admin.galleries.index')->with('success','Gallery updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        $path = 'images/galleries/'.$gallery->id;

        $this->deleteImageDirectory($path);
        $this->deleteImage($gallery->image);
        $gallery->delete();
        return redirect()->route('admin.galleries.index')->with('success','Gallery deleted successfully');
    }

    public function changeStatus(Request $request)
    {

        $galleryId = $request->gallery_id;
        $status =  $request->status;
        Gallery::whereId($galleryId)->update(['status' => $status]);

        return response()->json([
            'success' => true,
            'status' => $status == 1 ? 'Active' : 'Inactive',
            'message' => 'Status Successfully Changed!',
        ]);
    }

    public function updateOrder(Request $request)
    {
        $galleries = Gallery::get();

        foreach ($galleries as $gallery) {
            foreach ($request->order as $order) {
                if ($order['id'] == $gallery->id) {
                    $gallery->update(['order' => $order['position']]);
                }
            }

        }

        return response('Update Successfully.', 200);
    }
}
