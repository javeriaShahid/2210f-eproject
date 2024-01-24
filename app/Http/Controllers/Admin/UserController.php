<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserAddresses;

class UserController extends Controller
{
    public $parentModel   = User::class ;
    public $addressModel  = UserAddresses::class;
    public function index()
    {
        $data['user']   =  $this->parentModel::where('role',  0)->with('address')->paginate(25);
        return view('Admin.User.index')->with('data' , $data);
    }
    public function admins()
    {
        $data['user']   =  $this->parentModel::where('role',  2)->with('address')->paginate(25);
        return view('Admin.User.admins')->with('data' , $data);
    }

    public function blocked()
    {
        $data['user']   =  $this->parentModel::where(['is_blocked' => 1 , 'role' => 0])->with('address')->paginate(25);
        return view('Admin.User.block')->with('data' , $data);
    }
    public function active()
    {
        $data['user']   =  $this->parentModel::where(['status' => 1 ,'is_blocked' => 0 , 'role' => 0])->with('address')->paginate(25);
        return view('Admin.User.active')->with('data' , $data);
    }
    public function deactive()
    {
        $data['user']   =  $this->parentModel::where(['status' => 0 ,'is_blocked' => 0 , 'role' => 0])->with('address')->paginate(25);
        return view('Admin.User.deactive')->with('data' , $data);
    }
    public function block_user($id  = null)
    {
        $block    = $this->parentModel::where('id' , $id)->update(['is_blocked' => 1]);
        if($block == true )
        {
            return redirect()->back()->with('success' , 'User has been blocked');
        }
        else
        {
            return redirect()->back()->with('error' , 'Failed to block user');
        }

    }
    public function unblock_user($id = null)
    {
        $unblock    = $this->parentModel::where('id' , $id)->update(['is_blocked' => 0]);
        if($unblock == true )
        {
            return redirect()->back()->with('success' , 'User has been unblocked');
        }
        else
        {
            return redirect()->back()->with('error' , 'Failed to unblock user');
        }
    }
    public function delete($id = null)
    {
        $userDelete       = $this->parentModel::where('id' , $id)->forceDelete();
        $addressDelete    = $this->addressModel::where('user_id' , $id)->forceDelete();

        if($userDelete == true && $addressDelete == true)
        {
            return redirect()->back()->with('success' , 'User has been deleted');
        }
        else
        {
            return redirect()->back()->with('error' , 'Failed to delete user');
        }
    }

}
