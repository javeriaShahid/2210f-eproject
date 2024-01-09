<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{User,Feedback , Notification};
use Carbon\Carbon ;
class FeedBackController extends Controller
{
    public $parentModel   = FeedBack::class;
    public $childModel    = User::class;
    public $notification  = Notification::class;
    public function store(Request $request){
        $data = $request->except('_token');
        $data['user_id'] =  session()->get('user')['id'];
        if($request->session()->has('user')){
            $storeFeedBack = $this->parentModel::create($data);
            $username          = session()->get('user')['name'];
            if($storeFeedBack){
                $currentTime  = Carbon::now();
                $this->notification::create([
                    'subject' => "Feed Back recieved From $username ",
                    'route' => Route('admin.order.index'),
                    'message' => "$username Has given Feed back at  $currentTime",
                ]);
                return redirect()->back()->with('success' , 'Thanks For Your Feed back it means alot for us.');
            }
            else{
                return redirect()->back()->with('error' , 'Sorry we got an error while storing your feedback');

            }
        }
        else{
            return redirect()->route('login.view')->with("error" , "Please Login Before Giving Products Feedbacks");
        }
    }
}
