<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Authcontroller extends Controller
{
    public function login(Request $request){
        $email    = $request->email;
        $password = $request->password;
        //Or Middleware jo hai woh Sessions ke names ko  check karega put('admin') jo lekha hai line number 22 mai get karo ya jo bhi session()->ke bad jo function ho get put ya has ka('yahan par session ka name hoga');
        $login    = User::where('email', $email)->first();
       if($login ==true && Hash::check($password , $login->password) ) // Yahan humne pehle kaha check kro keya login ke variable mai data true hai fir humne Hash class ka use keya or check keya ke jo user password de rha hai keya woh data ke password jo hashed hain Hash:check hashed paswords ko check krta hai ke same hai ya nhi
       {
            if($login->email_verified_at != null) // jab if true hogi to esse hum check karenge agr emai_verfied_at column null na ho agr woh null hota hai means verified nhi hai agr nhi to means verified hai to agr verified hoto age wale data mai jae
            {
                if($login->role == 1 ) // Jab Data bhi miljaiga or Email Verified bhi hoga to fir yahan woh check karega ke role keya hai agr 1 hai to means woh admin hai
                {
                    session()->put('admin' , $login); // or role 1 hone ki wja se admin ka session banaiga or us session mai admin ke data ko daldega or yeh tab tk mujood hoga jab tk admin loggedin hoga  logout hote woh remove honge session storage se database se nhi
                    return redirect(Route('admin.dashboard'));
                }
                if($login->role == 0) // Agr nhi to fir woh user ka session banae or home ke route mai redirect ho user session mai same user data dalde
                {
                    session()->put('user' , $login);
                    return redirect(Route('user.home'));
                }
            }   
            else // nhi to yahan hame error de ke apne email ko verify karo
            {
                return redirect()->back()->with("Error" , 'Please Verify Your Account');
            }
       }
       else // or yahan agr woh first wale if ki condition false ho to fir hame redirect kare login mai orbole data nahi hai
       {
        return redirect()->back()->With('error' , 'Invalid Credientals');
       }



    }

    public function admin_logout()
    {
        session()->forget('admin');
        return redirect(Route('admin.login.view'));
    }

    public function user_logout()
    {
        session()->forget('user');
        return redirect(Route('user.login.view'));
    }
}
