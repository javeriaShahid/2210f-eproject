<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EmailVerificationTable;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Hash;
class ResetPasswordController extends Controller
{
    public $parentModel              = User::class;
    public $mailClass                = Mail::class;
    public $verificationModel        = EmailVerificationTable::class;
    // Sending Email Verification
    public function get_verification_code(Request $request)
    {
            $email                   = $request->verification_email;
            $userData                = $this->parentModel::where('email' , $email)->count();
            if($userData > 0)
            {
                $verificationCode        = rand(000000 , 999999);
                $routeForHome            = Route('user.index');
                $emailData               = [
                    'from'               => config('mail.mailers.smtp.username'),
                    'to'                 => $email ,
                    'subject'            => "Email Verification" ,
                ];
                $sendEmail               = $this->mailClass::send('EmailTemplates.verification' , ['routeforhome'=>$routeForHome , 'email_data' => $emailData ,'verification_code' => $verificationCode] , function($message) use ($emailData){
                    $message->from($emailData['from'])->to($emailData['to'])->subject($emailData['subject']);
                });

                if($sendEmail == true)
                {
                    $saveCode       = $this->verificationModel::create([
                        'email_address'     => $email ,
                        'verification_code' => $verificationCode
                    ]);

                    return response()->json(['message' => 'success']);
                }
                else
                {
                    return response()->json(['message' => 'error']);
                }
            }
            // Counting IF Ends here
            else
            {
                return response()->json(['message' => 'email not found']);
            }
   } // Ended here

   //Verifying Email
   public function verify_code(Request $request)
   {
        $email              = $request->verification_email;
        $verificationCode   = $request->verification_code ;
        $checkValues        = $this->verificationModel::where(['email_address'=>$email , 'verification_code' => $verificationCode])->count();

        if($checkValues > 0)
        {
            $deleteCode    = $this->verificationModel::where('email_address', $email)->forceDelete();
            return response()->json(['message' => 'success']);
        }
        else
        {
            return response()->json(['message' => 'error']);
        }
   }
   public function reset_password(Request $request)
   {
              $email              = $request->verification_email;
              $password           = Hash::make($request->new_password);
              $updatePassword     = $this->parentModel::where('email' , $email)->update([
                'password'        => $password ,
              ]);
              if($updatePassword == true)
              {
                return response()->json(['message' => 'success']);
              }
              else
              {
                return response()->json(['message' => 'error']);
              }
   }
}
