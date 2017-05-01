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
use App\Admin;
use App\Notifications\AddEvent;

class AdminController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:admin');
    // }

	public function display(){
        $categories= Category::all();
        $events    = Event::all();
        $users     = User::all();
        $locations = Location::all();  
    	return view('admin.dash' ,compact('categories','users','events','locations'));
	}

    public function ShowAdminProfile(){
        $admin = Admin::find(1);
   		return view('admin.editadminprofile',compact('admin'));
	}

     public function EditAdminProfile(Request $request)
    {
        $admin = Admin::find(1);

        if($request->save){
            $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
            'oldpassword' => 'required|string|min:6'
            ]);
            
            $admin->name     = $request->name;
            $admin->email    = $request->email;
            if($admin->originalpass == $request->oldpassword){
                if($request->password){
                $admin->password = bcrypt($request->password);
                $admin->originalpass = $request->password;
                 }
                if($request->image){
                $admin->image    = $request->file('image')->store('images');
                 }
            $admin->save();
            return view("admin.dash",compact('admin'));
        }else{
            return back();
        }
        
        }else {
            return view("admin.dash",compact('admin'));
        }
        
    }


    public function adminManageWiatings(){
        $events = Event::where('approved','=','waiting')->get();
        return view('admin.adminManageWiatings',compact('events'));
    }

    public function adminApproveWiatings(Request $request ,$id){
        
        $event=Event::where('id','=',$id)->where('approved','=','waiting')->first();

        if($request->event == 'approved'){
            $event->approved = 'accepted';
            if($event->save()){
                $user = User::all();
                Notification::send($user,new AddEvent($event));
                }
        }else{
            $event->approved = 'rejected';
            $event->save();
        }
        
        if($event->save()){ 
            return response()->json(['success' => 'success'], 200);
        }else{
            return response()->json(['success' => 'fail'], 500);
        }
    }


//manage event 
	public function showAllEvents(){
       $events = Event::all();
       return view('admin.adminmanageevents',compact('events')) ;
    }

	public function approve(Request $request ,$id){
	$event = Event::find($id);

	if($request->event == 'approved'){
			$event->approved = 'accepted';
             if($event->save()){
                $user = User::all();
                Notification::send($user,new AddEvent($event));
                }

		}else{
	   		$event->approved = 'rejected';
            $event->save();
		}
	 if($event->save()){ 
            return response()->json(['success' => 'success'], 200);
        }else{
            return response()->json(['success' => 'fail'], 500);
        }

	}
    

//manage category
	public function showAllCategory(){
    	$categories=Category::all();
    	return view('admin.adminmanagecategories',compact('categories'));
	}

	public function addCategory(Request $request){
		$this->validate($request,[
			'cat'   => 'required',
			'image' => 'required'
			]);
		$categories           = new Category;
		if($request->cat){
        $categories->name     = $request->cat;
   		}
        if($request->image){
 		$categories->image    = $request->file('image')->store('images');
 		}
 		$categories->save();
		return back();
	}

	public function deleteCategory($id)
        {
            $categories = Category::find($id);
            $categories->delete();
            return back();
        }
  

    public function editCategory(Request $request){
        $this->validate($request,[
			'cat'   => 'required'
			]);
		$category = Category::find($request->id);
		if($request->cat){
        $category->name = $request->cat;
    	}

        if($request->image){
 		$category->image = $request->file('image')->store('images');
 	    }
 		$category->save();
	}    
//manage user
	public function getAllUsers(){
    	$users=User::all();
    	return view('admin.adminManageUsers',compact('users'));
    	
    }
    public function deleteUser($id){
    	$user=User::find($id);
    	$user->delete();
    	return back();
    }	
//manage location
	public function getAllLocation(){
    	$locations=Location::all();
    	return view('admin.adminmanagelocation',compact('locations'));
    }
     public function deleteLocation($id){
    	$locations=Location::find($id);
    	$locations->delete();
    	return back();
    }

    public function addLocation(Request $request){
    	$this->validate($request,[
			'location'       => 'required',
			]);
		$locations           = new Location;
		if($request->location){
        $locations->title    = $request->location;
   		}
 		$locations->save();
		return back();
    }


    /////////////////////////////////////////    Create Event

     public function showCreateForm(){
        $locations  = Location::all();
        $categories = Category::all();
        return view('createEvent', compact('locations', 'categories'));
    }


    public function store(Request $request)
    { 

        if($request->create){
        $this->validate($request,[
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
            $event->user_type   = $request->user_type;
            $event->description = $request->description ;
            $event->image       = $request->file('image')->store('images');
           
            $event->user_id     = Auth::id();
            $event->category_id = $request->category;
            $event->location_id = $request->location;
            $event->approved    = 'accepted';
            if($event->save()){
                $user = User::all();
                Notification::send($user,new AddEvent($event));
                }

            $request->session()->flash('alert-success', 'Event has submited!');
            return redirect('/adminmanageevents');   
            // return \Redirect::back()->withSuccess( 'Message you want show in View' );    
        }else{
            return redirect('/adminmanageevents'); 
        }
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
                $event->start_time  = $request->start_time;
                $event->end_date    = $request->end_date;
                $event->end_time    = $request->end_time;
                $event->user_type   = $request->user_type;
                $event->description = $request->description;
                if($request->image){
                $event->image       = $request->file('image')->store('images');
                }
                $event->user_id     = Auth::id();
                $event->category_id = $request->category;
                $event->location_id = $request->location;
                $event->save();
                
                return redirect('/dash');
            } else{
                return redirect('/dash');
            }
    
    }




}
