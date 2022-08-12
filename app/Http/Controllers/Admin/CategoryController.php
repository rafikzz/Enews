<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCategoryRequest;
use App\Http\Requests\Admin\UpdateCategoryRequest;
use App\Models\Category;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    use ImageTrait;
    /**
     * use
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::orderBy('order','asc')->orderBy('created_at','desc')->get();
        return view('admin.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {

        $request['slug'] = Str::slug($request->title);
        Category::create($request->all());

        return redirect()->route('admin.categories.index')->with('success','Category created successfully');

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
    public function edit(Category $category)
    {

        return view('admin.categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $request['slug'] = Str::slug($request->title);
        $category->update($request->all());

        return redirect()->route('admin.categories.index')->with('success','Category updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $pages = Page::where('category_id',$category->id)->get();
        foreach($pages as $page){
            $this->deleteImage($page->image);
        }
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success','Category deleted successfully');
    }

    public function changeStatus(Request $request)
    {

        $categoryId = $request->category_id;
        $status =  $request->status;
        Category::whereId($categoryId)->update(['status' => $status]);

        return response()->json([
            'success' => true,
            'status' => $status == 1 ? 'Active' : 'Inactive',
            'message' => 'Status Successfully Changed!',
        ]);
    }

    public function updateOrder(Request $request)
    {
        $categories = Category::get();

        foreach ($categories as $category) {
            foreach ($request->order as $order) {
                if ($order['id'] == $category->id) {
                    $category->update(['order' => $order['position']]);
                }
            }

        }

        return response('Update Successfully.', 200);
    }
}
