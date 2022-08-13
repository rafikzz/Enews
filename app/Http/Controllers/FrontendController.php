<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Menu;
use App\Models\Page;
use App\Models\PageView;
use App\Models\Setting;
use App\Models\SubGallery;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home(){
        $menu = new Menu;
        $menuList = $menu->tree();
        $newsList =Page::where('status', '=', 1)->orderBy('order')->get();
        $galleries =Gallery::where('status', '=', 1)->withCount('subgalleries')->orderBy('order')->take(4)->get();
        $setting= Setting::first();
        $banner=Banner::where('status',1)->first();

        return view('frontend.index',compact('menuList','newsList','galleries','setting','banner'));
    }
    public function news(){
        $menu = new Menu;
        $menuList = $menu->tree();
        $categories =Category::with('get_news')->has('active_news')->get();
        $setting= Setting::first();

        return view('frontend.news',compact('menuList','setting','categories'));
    }

    public function news_page($slug){
        $news =Page::where('slug',$slug)->where('status', '=', 1)->firstOrFail();
        if($user= auth()->user()){
            if(!$news->isViewedBy($user)){
                PageView::create(
                    ['user_id'=>$user->id,
                        'page_id'=>$news->id
                ]);
            }
        }
        $viewCount =$news->page_views()->count();

        $menu = new Menu;
        $menuList = $menu->tree();
        $setting= Setting::first();

        return view('frontend.news_page',compact('menuList','news','setting','viewCount'));
    }
    public function category(){
        $menu = new Menu;
        $menuList = $menu->tree();
        $categories =Category::withCount('active_news')->get();
        $setting= Setting::first();

        return view('frontend.category',compact('menuList','setting','categories'));
    }

    public function category_page($slug){
        $category =Category::where('slug',$slug)->where('status', '=', 1)->firstOrFail();
        $menu = new Menu;
        $menuList = $menu->tree();
        $newsList =Page::where('category_id',$category->id)->where('status', '=', 1)->orderBy('order')->paginate(1);
        $setting= Setting::first();

        return view('frontend.category_page',compact('menuList','newsList','setting','category'));
    }

    public function gallery(){
        $menu = new Menu;
        $menuList = $menu->tree();
        $galleries =Gallery::where('status', '=', 1)->withCount('subgalleries')->orderBy('order')->paginate(12);
        $setting= Setting::first();

        return view('frontend.gallery',compact('menuList','galleries','setting'));
    }

    public function gallery_page($id){
        $gallery =Gallery::where('id', '=', $id)->where('status', '=', 1)->firstOrFail();
        $menu = new Menu;
        $menuList = $menu->tree();
        $photos = SubGallery::where('gallery_id',$gallery->id)->paginate(24);
        $setting= Setting::first();

        return view('frontend.gallery_page',compact('menuList','gallery','photos','setting'));
    }

    public function about_us(){
        $menu = new Menu;
        $menuList = $menu->tree();
        $newsList =Page::where('status', '=', 1)->orderBy('order')->get();
        $setting= Setting::first();
        $about = About::first();

        return view('frontend.about_us',compact('menuList','newsList','about','setting'));
    }
}
