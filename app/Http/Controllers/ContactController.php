<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Contact;

class ContactController extends Controller
{
    public function contact(Request $request){
        $meta_desc = "Chuyên bán giày đá bóng. Nhiều mẫu giày đá bóng sân cỏ tự nhiên chính hãng, giá rẻ.";
        $meta_keywords = "giay bong da, giày bóng đá, shop giày chính hãng";
        $meta_title = "Giày Đá Bóng Chính Hãng | Giày Đá Banh | Thế Giới Bóng Đá";
        $url_canonical = $request->url();
        
        $slider = Slider::orderby('slider_id','ASC')->get();

        return view('pages.contact.view_contact')->with(compact('meta_desc','meta_keywords','meta_title','url_canonical','slider'));
    }
    public function confirm_contact(Request $request){
        $data = $request->all();
        $contact = new Contact();
        $contact->contact_name = $data['contact_name'];
        $contact->contact_email = $data['contact_email'];
        $contact->contact_phone = $data['contact_phone'];
        $contact->contact_notes = $data['contact_notes'];

        $contact->save();
        return redirect()->back();
    }
    public function list_contact(){
        $contact = Contact::orderby('contact_id','DESC')->get();
        return view('admin.contact.show_contact')->with(compact('contact'));
    }

}
