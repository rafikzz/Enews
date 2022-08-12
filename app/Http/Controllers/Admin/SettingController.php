<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreSettingRequest;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    use ImageTrait;

    public function create()
    {
        $setting =Setting::get()->first();
        return view('admin.settings.create',compact('setting'));
    }


    public function store(StoreSettingRequest $request)
    {
        $setting =Setting::get()->first();
        if(isset($setting)){
            $setting->contact_information =$request->contact_information;
            $setting->office_location =$request->office_location;
            if($logo = $request->file('logo')) {
                $path = 'images/logo/';
                $this->deleteImage($setting->logo);
                $imagePath = $this->uploads($logo,$path);
                $setting->logo =$imagePath;
            }
            $setting->save();

        }else{
            if($logo = $request->file('logo')) {
                $path = 'images/logo/';
                $imagePath = $this->uploads($logo,$path);
            }
            Setting::create([
                'contact_information'=>$request->contact_information,
                'office_location'=>$request->office_location,
                'logo'=>$imagePath,

            ]);
        }
        return redirect()->route('admin.settings.create')->with('success','Settings Saved Successfully');
    }



}
