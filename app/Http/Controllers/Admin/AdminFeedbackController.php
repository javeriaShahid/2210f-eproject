<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminFeedbackController extends Controller
{
    public $parentModel  = ReplyFeedback::class;
    public $childModel   = Feedback::class ;
    public $parentView   = 'Admin.Feedback';
    public $parentRoute  = 'admin.feedback';

    public function index(){
        $data['feedback']   = $this->childModel::orderBy('id' , 'asc')->paginate(15);
        return view($this->parentView .'.index')->with('data' , $data);
    }
}
