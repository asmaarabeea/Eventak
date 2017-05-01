<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Event;
use auth;
use DB;
use App\EventUser;

class UserProfileController extends Controller
{
    public function index()
	{
	    $user   = User::find(auth::id());
        $title  = "View $user->name's Profile";
        $active = 'userprofile';
        $events = Event::where('user_id' , auth::id())->where('user_type', '=', 'user')->get();
        $event_user = EventUser::where('interested','=','1')->get();
		return view('user.userprofile',compact('user','events','title','active','event_user'));
	}

    public function viewEditProfile()     
    {
        $user   = User::find(auth::id());
        $title  = "Edit $user->name's Profile";
        $active = 'editprofile';
        return view('user.profile',compact('user', 'title', 'active'));
        // return view('editprofile',compact('user'));
    }


    public function editProfile(Request $request)
    {
        $user = User::find(auth::id());
        $title  = "Edit $user->name's Profile";
        $active = 'editprofile';
        $events = Event::where('user_id' , auth::id())->get();

        if($request->save){

            $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
            'oldpassword' => 'required|string|min:6'
            ]);
            
            $user->name     = $request->name;
            $user->email    = $request->email;
            if($user->originalpass == $request->oldpassword){
                if($request->password){
                $user->password = bcrypt($request->password);
                $user->originalpass = $request->password;
                 }
                if($request->image){
                $user->image    = $request->file('image')->store('images');
                 }
            $user->save();
            $event_user = EventUser::where('interested','=','1')->get();
            return view("user.userprofile",compact('user','events','title','active','event_user'));
        }else{
            return back();
        }
        
        }else {
            return view("user.userprofile",compact('user','events','title','active','event_user'));
        }
        
    }

public function selectEvents($name)
    {   $user = User::find(Auth::id());
        if($name == 'accepted')
            {
            $title  = "Accepted Events";
            $active = 'eventprofileaccepted';
            $events = DB::table('events')->where('approved' ,'accepted')->where('user_id' , auth::id())->get();
            }
        if($name == 'waiting')
            {
            $title  = "Waiting Events";
            $active = 'eventprofilewaiting';
            $events = DB::table('events')->where('approved' ,'waiting')->where('user_id' , auth::id())->get();
            }
        if($name == 'rejected')
            {
            $title  = "Rejected Events";
            $active = 'eventprofilerejected';
            $events = DB::table('events')->where('approved' ,'rejected')->where('user_id' , auth::id())->get();
            }

            if($name == 'interested')
            {
            $title  = "interested Events";
            $active = 'eventprofileintrested';
            $events = DB::table('events')
            ->join('event_user', 'events.id', '=', 'event_user.event_id')
            ->where('event_user.interested' ,'1')->where('event_user.user_id' , auth::id())
            ->select('events.*', 'event_user.interested')
            ->get();
            }
            
            $event_user = EventUser::where('interested','=','1')->get();
            return view('user.selectevent', compact('events','active','title','user','event_user'));
    }



        public function viewUserProfile($id){
            $title  = " Profile";
            $active = 'editprofile';
            $events = Event::where('user_id' , $id)->where('user_type', '=', 'user')->get();
            $user   = User::find($id);
            $event_user = EventUser::where('interested','=','1')->get();
            return view('userviewuserprofile',compact('events','user','active','title','event_user'));
        }


        public function logviewProfile($id)
            {
                $title  = " Profile";
                $active = 'editprofile';
                $events = Event::where('user_id' , $id)->get();
                $user   = User::find(Auth::id());
                $event_user = EventUser::where('interested','=','1')->get();
                return view('userviewuserprofile',compact('events','user','active','title','event_user'));
            }
        public function viewMyProfile()
            {
                $title  = " Profile";
                $active = 'editprofile';
                $events = Event::where('user_id' , Auth::id())->get();
                $user   = User::find(Auth::id());
                return view('user.userprofile',compact('events','user','active','title'));
            }

}
