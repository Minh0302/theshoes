<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider = Slider::orderby('slider_id','ASC')->get();
        return view('admin.slider.index')->with(compact('slider'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'slider_name' => 'required|max:255',
            'slider_image'=> 'required|image|mimes:jpg,png,jpeg,gif,webp,svg|max:2048|dimensions:min_width:100,min_height:100,max_width:1000,max_height:1000'
        ]);

        $slider = new Slider();
        $slider->slider_name = $data['slider_name'];
        
        // image
        $get_image = $request->file('slider_image');
        $path = 'public/uploads/slider';
        $get_image_name = $get_image->getClientOriginalName();
        $name_image = current(explode('.',$get_image_name));
        $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
        $get_image -> move($path,$new_image);

        $slider->slider_image = $new_image;   
   

        $slider->save();
        return redirect()->back()->with('message','Thêm Slider thành công!');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::find($id);
        $slider->delete();
        return redirect()->back()->with('message','Xoá Slider thành công!');
    }
}
