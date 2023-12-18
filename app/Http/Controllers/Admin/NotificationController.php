<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notification;
class NotificationController extends Controller
{
   public $parentModel = Notification::class;
   public function fetchNotification(){
        $notificationData  = $this->parentModel::orderby('id' , 'desc')->limit(5)->get();
        $notificationCount = $this->parentModel::count();
        return response()->json(['data' => $notificationData , 'count' => $notificationCount]);
   }
   public function removeNotification($id = null){
    $delete = $this->parentModel::where('id' , $id)->delete();
    return response()->json('status' , true);
   }
}
