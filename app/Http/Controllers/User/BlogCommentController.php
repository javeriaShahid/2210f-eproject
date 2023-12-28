<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogComments;
use App\Models\Blogs;
use App\Models\User;
use App\Models\Notification;
class BlogCommentController extends Controller
{
   public  $parentModel    =  Blogs::class;
   public  $userModel      =  User::class;
   public  $childModel     =  BlogComments::class;
   public  $notification   =  Notification::class;
   public function store(Request $request){
        if($request->session()->has('user')){
        $data            = $request->except('_token');
        $data['user_id'] = session()->get('user')['id'];
        $storeData = $this->childModel::create($data);
        if($storeData){
            $blogDetails     = $this->parentModel::where('id' , $data['blog_id'])->first();
            $user            = $this->userModel::where('id' , $data['user_id'])->first();
            $commentNotification = [
                'subject' => $user->name . " Has Added Comment " ,
                'message' => $user->name ." Added Comment For " .$blogDetails->title,
                'route'   => Route("admin.blogs.view.comment" , $storeData->id)
            ];
            $addNotification = $this->notification::create($commentNotification);
            return redirect()->back()->with('success' , 'Comment has been added');
        }
        else{
            return redirect()->back()->with('error' , 'Failed to Add Comment ');
        }
        }
        else{
            return redirect()->route('login.view')->with('error' , 'Failed to Add Comment Login Before Adding A Comment on a blog');

        }
   }

}
