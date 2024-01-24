<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{User};
use Str;
use Mail;
use Hash;
class AdminController extends Controller
{
        public $parentModel =  User::class;
        public $parentView  =  'Admin.User';
        public $parentRoute =  'admin.user';

        public function create($id = null){
            $data['admin']  = $this->parentModel::where('id' , $id)->first();
            $data['action']  = $data['admin'] != null ? 'edit' : 'create';

            return view($this->parentView.".create")->with("data" , $data);
        }
        public function store(Request $request , $id = null){
            $data             =  $request->except('_token');
            $data['password'] =  Str::random(15);
            $password         =  $data['password'];
            $data['password'] =  Hash::make($data['password']);
            $data['role']     =  2 ;
            $checkAdmin       = $this->parentModel::where(['email' => $data['email']])->count();
            $checkUsername       = $this->parentModel::where(['username' => $data['username']])->count();
            if($checkAdmin > 0){
                return redirect()->back()->with('error' , 'Admin Email has been Used..!');
            }
            if($checkUsername > 0) {
                return redirect()->back()->with('error' , 'Admin User Name has been Used..!');
            }
            if ($request->hasFile('profile_image')) {
                $fileName = time().'.'.$data['profile_image']->getClientOriginalExtension();
                $data['profile_image']->move('UserImages/', $fileName);
                $data['profile_image'] = $fileName;
            }

            if ($id != null) {
                $existingData = $this->parentModel::find($id);


                if (isset($data['profile_image'])) {
                $filePath = public_path('UserImages/' . $existingData->image) ;
                if (file_exists($filePath)) {
                   unlink($filePath); // Delete the file
                 }
                $existingData->profile_image = $data['profile_image'];
                }

                $existingData->update($data);
                if($existingData){
                    return redirect()->route($this->parentRoute.'.index')->with('success' , 'Admin has been updated');
                }
                else{
                    return redirect()->back()->with('error' , 'Failed to Update Admin Information');
                }

            } else {
                $storeData = $this->parentModel::create($data);


                if($storeData){
                    $route          = Route('verify.email' ,  $storeData->id);
                    $routeForHome   = Route('user.index');
                    $userData = [
                        'to' => $storeData->email,
                        'from' => config('mail.mailers.smtp.username'),
                        'subject'=> "Admin Registeration"
                    ];
                    Mail::send('EmailTemplates.admin_register' , ['password' => $password , 'route' => $route , 'routeForHome'=> $routeForHome] , function($message) use($userData) {
                        $message->to($userData['to']);
                        $message->from($userData['from']);
                        $message->subject($userData['subject']);
                    });
                    return redirect()->route($this->parentRoute.'.index')->with('success' , 'Admin information has been stored');
                }
                else{
                    return redirect()->back()->with('error' , 'Failed to Store Admin  Information');
                }
            }
        }

}
