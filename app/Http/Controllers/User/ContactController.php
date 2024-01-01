<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Notification;
use Mail ;
use Carbon\Carbon;
class ContactController extends Controller
{



    public $parentModel       =  Contact::class;
    public $notificationModel =  Notification::class;
    public $mail              =  Mail::class;
    public $parentView        = 'Admin.Contact';
    public $parentRoute       = 'admin.contact.messages';
    public function index(){
        $data['contact'] = $this->parentModel::paginate(20);
        return view($this->parentView .'.index')->with('data' , $data);
    }
    public function view_message($id = null){
        $data['contact'] = $this->parentModel::where('id' , $id)->first();
        $update          = $this->parentModel::where('id' , $id)->update([
            'is_view'=> 1,
        ]);
        return view($this->parentView .'.view_message')->with('data' , $data );
    }
    public function create($id = null){
        $data['contact'] = $this->parentModel::where('id' , $id)->first();
        return view($this->parentView .'.create')->with('data' , $data );
    }

    public function edit($id = null){
        $data['action'] = "edit" ;
        $data['mail']   = $this->parentModel::where('id' , $id)->first();
        return view($this->parentView.'.create')->with('data' , $data );
    }

    public function store(Request $request , $id = null ){
        $data      = $request->all();
        $storeSmtp = $this->parentModel::updateOrCreate(['id' => $id ] , $data);
        if($storeSmtp){
            // Sending User Mail
            $currentTime  = Carbon::now();
            $userData  = ['from' => config('mail.mailers.smtp.username') , 'to' => $data['email'] , 'subject' => "Contact Request Received"];
            $adminData = ['to' => config('mail.mailers.smtp.username') , 'from' => $data['email'] , 'subject' => $data['subject']];
            $sendingMail = $this->mail::send('EmailTemplates.user_contact' , ['currentTime' => $currentTime , 'data' => $userData , 'routeForHome' => Route('user.index')] , function($message) use ($userData){
                $message->to($userData['to'])->from($userData['from'])->subject($userData['subject']);
            });
            $adminMail = $this->mail::send('EmailTemplates.admin_contact' , ['currentTime' => $currentTime ,'data' => $userData , 'routeForHome' => Route('admin.dashboard')] , function($message) use ($userData){
                $message->to($userData['from'])->from($userData['to'])->subject($userData['subject']);
            });

            $storeNotification  = $this->notificationModel::create([
                'subject' => 'Contact Request Received',
                'route' => Route('admin.contact.messages.view.message' , $storeSmtp->id),
                'message' => "".$data['name']." Has Requested For Contact at $currentTime",
            ]);
            return redirect()->back()->with('success' , 'Message For Contact has been Sent');
        }
        else{
            return redirect()->back()->with('error' , 'Failed To Send Contact Message');
        }
    }

    public function reply(Request $request , $id = null ){
        $data      = $request->all();
        $storeSmtp = $this->parentModel::where(['id' => $id ])->update(['is_replied' =>  1 ]);
        if($storeSmtp){
            // Sending User Mail
            $currentTime  = Carbon::now();
            $userData  = ['from' => config('mail.mailers.smtp.username') , 'to' => $data['email'] , 'subject' => $data['subject']];
            $sendingMail = $this->mail::send('EmailTemplates.user_contact_reply' , ['currentTime' => $currentTime , 'messageData' => $data['message'] , 'routeForHome' => Route('user.index')] , function($message) use ($userData){
                $message->to($userData['to'])->from($userData['from'])->subject($userData['subject']);
            });
            return redirect()->route($this->parentRoute.'.index')->with('success' , 'Message has been Replied');
        }
        else{
            return redirect()->back()->with('error' , 'Failed To Reply Message ');
        }
    }
    public function destroy($id = null ){


        $delete = $this->parentModel::where(['id' => $id ])->delete();
        if($delete){
            return redirect()->back()->with('success' , ' Contact Message has been Deleted');
        }
        else{
            return redirect()->back()->with('error' , 'Failed To Delete Contact Message Information');
        }

    }


}


