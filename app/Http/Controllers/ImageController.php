<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Image;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ImageController extends Controller
{
    public function upload()
    {
    	return view('imageupload');
    }

    public function store(Request $request)
    {
	 	$image = new Image();
        $this->validate($request, [
            'title' => 'required',
            'image' => 'required'
        ]);
        $image->title = $request->title;
        $image->description = $request->description;
		if($request->hasFile('image')) {
            $file = Input::file('image');
            //getting timestamp
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
            
            $name = $timestamp. '-' .$file->getClientOriginalName();
            
            $image->filePath = $name;

            $file->move(public_path().'/images/', $name);
        }
        $image->save();
        //return $this->create()->with('success', 'Image Uploaded Successfully');
    }
}
