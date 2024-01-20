<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeedBack;
use Auth;
use App\Models\ReplyFeedback;
class AdminFeedbackController extends Controller
{
    public $parentModel  = ReplyFeedback::class;
    public $childModel   = Feedback::class ;
    public $parentView   = 'Admin.Feedbacks';
    public $parentRoute  = 'admin.feedback.messages';

    public function index(){
        $data['feedback']   = $this->childModel::orderBy('id' , 'asc')->paginate(15);

        return view($this->parentView .'.index')->with('data' , $data);
    }
    public function create($id = null){
        $data['feedback']   = $this->childModel::where('id' , $id)->first();
        return view($this->parentView .'.reply')->with('data' , $data);
    }
    public function view_message($id = null){
        $data['reply-message']   = $this->parentModel::where('feedback_id' , $id)->get();
        $data['feedback']        = $this->childModel::where('id' , $id)->first();
        return view($this->parentView .'.view-message')->with('data' , $data);
    }
    public function store(Request $request , $id = null){
        $message               = $request->message;
        foreach($message as $key => $value){
            $storeReply       = $this->parentModel::create([
                    'message'     => $message[$key],
                    'feedback_id' => $id ,
                    'user_id'     => @session()->get('admin')['id']

            ]);

        }
        if($storeReply){
            $feedbackStatus   = $this->childModel::where('id' , $id)->update([
                'view_status' => 1
            ]);
            return redirect()->route($this->parentRoute.'.index')->with('success' , 'Feedback Has been Replied');
        }
        else{
            return redirect()->route($this->parentRoute.'index')->with('error' , 'Failed To Reply Feedback');
        }
    }

    public function destroy($id = null){
        $deleteFeedback = $this->childModel::where('id' , $id)->delete();
        if($deleteFeedback){

            return redirect()->route($this->parentRoute.'.index')->with('success' , 'Feedback Has been Deleted');
        }
        else{
            return redirect()->route($this->parentRoute.'.index')->with('error' , 'Failed To Delete Feedback');
        }
    }
    public function destroy_replied($id = null){
        $deleteFeedback = $this->parentModel::where('id' , $id)->delete();
        if($deleteFeedback){

            return redirect()->route($this->parentRoute.'.index')->with('success' , 'Feedback reply Has been Deleted');
        }
        else{
            return redirect()->route($this->parentRoute.'.index')->with('error' , 'Failed To Delete Feedback');
        }
    }

}
