<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePageRequest;
use App\Http\Requests\Admin\UpdatePageRequest;
use App\Models\Category;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class PageController extends Controller
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
        $pages = Page::with('category')->orderBy('order','asc')->orderBy('created_at','desc')->get();

        return view('admin.pages.index',compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories =Category::get();
        return view('admin.pages.create',compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePageRequest $request)
    {
        $imagePath=null;
        $request['slug'] = Str::slug($request->title);
        if($image = $request->file('image')) {
            $path = 'images/pages/';
            $imagePath = $this->uploads($image,$path);
        }
        Page::create([
            'title'=>$request->title,
            'slug'=>$request->slug,
            'category_id'=>$request->category_id,
            'brief'=>$request->brief,
            'content'=>$request->content,
            'image'=>$imagePath,

        ]);

        return redirect()->route('admin.pages.index')->with('success','Page created successfully');

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
    public function edit(Page $page)
    {
        $categories =Category::get();
        return view('admin.pages.edit',compact('page','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePageRequest $request, Page $page)
    {
        $page->title = $request->title;
        $page->category_id = $request->category_id;
        $page->slug =Str::slug($request->title);
        $page->brief = $request->brief;
        $page->content = $request->content;

        if($image = $request->file('image')) {
            $path = 'images/pages/';
            $this->deleteImage($page->image);
            $imagePath = $this->uploads($image,$path);
            $page->image =$imagePath;
        }
        $page->save();

        return redirect()->route('admin.pages.index')->with('success','Page updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        $this->deleteImage($page->image);
        $page->delete();
        return redirect()->route('admin.pages.index')->with('success','Page deleted successfully');
    }

    public function changeStatus(Request $request)
    {

        $pageId = $request->page_id;
        $status =  $request->status;
        Page::whereId($pageId)->update(['status' => $status]);

        return response()->json([
            'success' => true,
            'status' => $status == 1 ? 'Active' : 'Inactive',
            'message' => 'Status Successfully Changed!',
        ]);
    }

    public function updateOrder(Request $request)
    {
        $pages = Page::get();

        foreach ($pages as $page) {
            foreach ($request->order as $order) {
                if ($order['id'] == $page->id) {
                    $page->update(['order' => $order['position']]);
                }
            }

        }

        return response('Update Successfully.', 200);
    }
}
