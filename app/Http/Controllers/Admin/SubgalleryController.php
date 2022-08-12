<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageTrait;
use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\SubGallery;
use Illuminate\Http\Request;

class SubgalleryController extends Controller
{
    use ImageTrait;

    public function create($id){
        $gallery =Gallery::findOrFail($id);
        return view('admin.subgalleries.create',compact('gallery'));
    }

    public function store(Request $request){
        $galleryId =$request->gallery_id;
        if($image = $request->file('file')) {
            $path = 'images/galleries/'.$galleryId.'/';
            $imagePath = $this->uploads($image,$path);
            SubGallery::create([
                'image'=> $imagePath ,
                'gallery_id'=>$galleryId,

            ]);
        }
        return response()->json(['success'=>200]);
    }

    public function delete($id){
        $subgallery =SubGallery::findOrFail($id);
        $this->deleteImage($subgallery->image);
        $subgallery->delete();
        return redirect()->back()->with('success','Image deleted successfully');
    }

}
