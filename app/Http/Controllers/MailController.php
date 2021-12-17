<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class MailController extends Controller
{
    public function show_mail(){
    	//send mail
                $to_name = "lê minh";
                $to_email = "minhb1809606@student.ctu.edu.vn";//send to this email
        
                $data = array("name"=>"noi dung ten","body"=>'test'); //body of mail.blade.php
            
                Mail::send('pages.mail.show_mail',$data,function($message) use ($to_name,$to_email){
                    $message->to($to_email)->subject('test mail nhé');//send this mail with subject
                    $message->from($to_email,$to_name);//send from this mail
                });
                return redirect()->back();

    }
}
