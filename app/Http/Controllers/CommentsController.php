<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Event;
use App\Comment;

class CommentsController extends Controller
{

    public function getAllComments()
    {
        $comments = Comment::all();
        return view('admin.adminManageComments',compact('comments'));
    }


    // public function deleteComments($id){
    //     $comment=Comment::find($id);
    //     $comment->delete();
    //     return back();
    // }   

    public function approval(Request $request)
    {
        $comment = Comment::find($request->commentId);
        $approveVal=$request->approve;
        if($approveVal=='on'){
            $approveVal=1;
        }else{
            $approveVal=0;
        }
        $comment->approve=$approveVal;
        $comment->save();
        return back();
    }
    
}
