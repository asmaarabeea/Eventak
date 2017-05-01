<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use auth;
use DB;

class FeedbackController extends Controller
{
    public function getFeedback()
    {
    	return view ('layouts/index');
    }

    public function postFeedback(Request $request)
    {
    	 $email = DB::table('users')->where ('id', '=' , Auth::id())->value('email');
    	$this->validate($request, [
    		//'email'   => 'required|email',
    		'subject' => 'min:3',
    		'message' => 'min:5']);

    	$data = array(
    		'email'        => $email,
    		'subject'      => $request->subject,
    		'bodyMessage'  => $request->message
    		);

    	Mail::send('emails.contact', $data, function($message) use ($data){

    		$message->from($data['email']);
    		$message->to('eventak.iti@gmail.com');
    		$message->subject($data['subject']);

    	});
    	return back();


    }
}

