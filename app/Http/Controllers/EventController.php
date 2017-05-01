<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Notification;
use App\Event;
use App\Location;
use App\Feedback;
use App\User;
use App\Category;
use auth;
use App\Notifications\AddEvent;

class EventController extends Controller
{

	public function showCreateForm(){
		$locations  = Location::all();
        $categories = Category::all();
        return view('createEvent', compact('locations', 'categories'));
	}

    public function store(Request $request)
    { 
        if($request->create){
        $this->validate($request,[

            //|regex:/^[A-z][A-z0-9_,\s\.\'\/]+$/
            'title'      => 'required',
            'date'       => 'required|after:today',
            'end_date'   => 'required|after:today',
            'start_time' => 'required',
            'end_time'   => 'required|after:start_time',
            'description'=> 'required',
            'image'      => 'required|Image',
            'category'   => 'required',
            'location'   => 'required',
            ]);
        
            $event              = new Event;
            $event->title       = $request->title;
            $event->date        = $request->date;
            $event->end_date    = $request->end_date;
            $event->start_time  = $request->start_time;
            $event->end_time    = $request->end_time;
            $event->description = $request->description ;
            $event->image       = $request->file('image')->store('images');
           
            $event->user_id     = Auth::id();
            $event->user_type   = $request->user_type;
            $event->category_id = $request->category;
            $event->location_id = $request->location;
            $event->save();
        $request->session()->flash('alert-success', 'Event has submited!');
        return redirect('/userprofile'); 
        }else{
            return redirect('/userprofile');
        }  
        // return \Redirect::back()->withSuccess( 'Message you want show in View' );    
        
    }
    

    public function showEvents($id)
    {
        $event = Event::find($id);
		$locations  = Location::all();
        $categories = Category::all();
       return view('editEvent', compact('event','locations', 'categories'));
    }

     public function editEvents($id , Request $request)
    {
        if ($request->save) {
    	$this->validate($request,[
           'title'      => 'required',
            'date'       => 'required|after:today',
            'end_date'   => 'required|after:today',
            'start_time' => 'required',
            'end_time'   => 'required|after:start_time',
            'description'=> 'required',
            'image'      => 'Image',
            'category'   => 'required',
            'location'   => 'required',
            ]);

		        $event              = Event::find($id);
		        $event->title       = $request->title;
		        $event->date        = $request->date;
                $event->end_date    = $request->end_date;
		        $event->start_time  = $request->start_time;
		        $event->end_time    = $request->end_time;
                $event->user_type   = $request->user_type;
		        $event->description = $request->description;
                $event->approved    = 'waiting';
                if($request->image){
		        $event->image       = $request->file('image')->store('images');
		        }
		        $event->user_id     = Auth::id();
		        $event->category_id = $request->category;
		        $event->location_id = $request->location;
		        $event->save();
		        
	        	return redirect("/userprofile");
	        } else{
	        	
	            return redirect("/userprofile");
	        }
	}
    
            public function delete($id)
            {
                $event = Event::find($id);
                $event->delete();
                return redirect("/userprofile");
            }

}
