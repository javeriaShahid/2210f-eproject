<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\State;
use App\Models\City;
use App\Models\UserAddresses;
use Illuminate\Support\Facades\Hash;

class Authcontroller extends Controller
{
    public $parentModel      = User::class;
    public $countryModel     = Country::class ;
    public $cityModel        = City::class ;
    public $stateModel       = State::class;
    public $addressModel     = UserAddresses::class;
    public $checkoutModel    = Checkout::class;
    public function login(Request $request){
        $email    = $request->email;
        $password = $request->password;
        //Or Middleware jo hai woh Sessions ke names ko  check karega put('admin') jo lekha hai line number 22 mai get karo ya jo bhi session()->ke bad jo function ho get put ya has ka('yahan par session ka name hoga');
        $login    = User::where('email', $email)->first();

       if($login ==true && Hash::check($password , $login->password) ) // Yahan humne pehle kaha check kro keya login ke variable mai data true hai fir humne Hash class ka use keya or check keya ke jo user password de rha hai keya woh data ke password jo hashed hain Hash:check hashed paswords ko check krta hai ke same hai ya nhi
       {
            if($login->is_blocked == 1)
            {
                return redirect()->back()->with('error' , 'Your Account has been Blocked You cannot login');
            }
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
                    $update_status      =  User::where('id' , $login->id)->update(['status' => 1]);
                    return redirect(Route('user.index'));
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
    public function registeration(Request $request)
    {
        $name         =  $request->name ;
        $email        =  $request->email;
        $password     =  Hash::make($request->password);
        $username     =  $request->username ;
        $contact      =  $request->contact_number;
        $country_code =  $request->country_code;

        $user_create  = $this->parentModel::create([
            'name'            => $name ,
            'username'        => $username ,
            'password'        => $password ,
            'email'           => $email ,
            'contact_number'  => $contact ,
            'phone_code'      => $country_code ,
            'role'            => 0
        ]);

        if($user_create == true)
        {
            if($request->hasFile('image'))
            {
                $image     =  $request->file('image');
                $fileName  = time().'.'.$image->getClientOriginalExtension();
                $image->move('assets/UserImages/', $fileName);
                $updateImage   = $this->parentModel::where('id' , $user_create->id)->update([
                    'profile_image' => $fileName,
                ]);
            }
            return redirect(Route('login.view'))->with('success' , 'Your Account has been register please check your email to get verified');
        }
        else
        {
            return redirect()->back()->with('error' , 'Failed to add Your credientals');
        }
    }

    public function admin_logout()
    {
        $update_status      =  User::where('id' , session()->get('admin')['id'])->update(['status' => 0]);
        if($update_status == true)
        {
            session()->forget('admin');
            return redirect(Route('Auth_login'));
        }
    }

    public function user_logout()
    {
        $update_status      =  User::where('id' , session()->get('user')['id'])->update(['status' => 0]);
        if($update_status == true)
        {
            session()->forget('user');
            return redirect(Route('login.view'));
        }
    }
    //Admin Profile Edit

    public function edit_admin()
    {   $id              = session()->get('admin')['id'];
        $data['user']    = $this->parentModel::where('id' , $id)->first();
        return view('Admin.profile.account-setting')->with('data' , $data);
    }
    public function edit_user()
    {
        $id                 = session()->get('user')['id'];
        $data['user']       = $this->parentModel::where('id' , $id)->first();
        $data['country']    = $this->countryModel::all();
        $data['checkout']  =  $this->checkoutModel::where('user_id' , session()->get('user')['id'])->paginate(10);
        return view('User.Account_setting')->with('data' , $data);
    }
    public function update($id = null , Request $request)
    {
        $name             = $request->name ;
        $username         = $request->username ;
        $email            = $request->email ;
        $phonecode        = $request->phonecode ;
        $contact_number   = $request->contact_number ;
        if($request->hasFile('image'))
        {
            $fileName     = time().'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move('assets/UserImages/' , $fileName);
            $updateImage  = User::where('id' , $id)->update([
                'profile_image' => $fileName
            ]);
        }
        $updateUser       = User::where('id' , $id)->update([
            'name'             => $name  ,
            'username'         => $username ,
            'email'            => $email ,
            'phone_code'       => $phonecode ,
            'contact_number'   => $contact_number
        ]);
        if($updateUser == true || $updateImage == true)
        {
            return redirect()->back()->with('success' , 'Profile info has been updated');
        }
        else
        {
            return redirect()->back()->with('error' , 'Failed to change profile info');

        }
    }

    public function get_state($id = null)
    {
        $state   = $this->stateModel::where('country_id' , $id)->get();


        if($state != null)
        {
          return response()->json($state);
        }

    }
    public function get_city($id = null)
    {
        $city   = $this->cityModel::where('state_id' , $id)->get();

        if($city != null)
        {
          return response()->json($city);
        }

    }

    public function store_user_address(Request $request)
    {
        if(session()->has('user'))
        {
            $userId             =  session()->get('user')['id'];
        }
        else
        {
            $userId             =  session()->get('admin')['id'];
        }
        $address1           = $request->addressline1;
        $address2           = $request->addressline2;
        $phone1             = $request->phonenumber1;
        $phone2             = $request->phonenumber2;
        $country            = $request->country;
        $city               = $request->city;
        $state              = $request->state;
        $postcode           = $request->postalcode;


        $createAddress      = $this->addressModel::create([

            'user_id'       => $userId ,
            'addressline1'  => $address1 ,
            'addressline2'  => $address2 ,
            'phone_number1' => $phone1 ,
            'phone_number2' => $phone2,
            'country'       => $country ,
            'state'         => $state ,
            'postalcode'    => $postcode ,
            'city'          => $city

        ]);

        if($createAddress == true)
        {
            $data['user']       = $this->parentModel::where('id' , $createAddress->user_id)->with('address')->get();
            return response()->json(['message' => 'success' , 'userdata' => $data['user']]);
        }
        else
        {
            return response()->json('message' , 'error');
        }

    }

    public function address_get(Request $request)
    {

        $email = $request->email_address;
        $data['user'] = $this->parentModel::where('email', $email)->with('address')->first();
        $data['address'] = $this->addressModel::where('user_id' , $data['user']->id)->with('countries')->get();
        if($data['address'] != null)
        {
            return response()->json($data['address']);
        }

    }
    public function specific_address_get($id  = null)
    {
        $data['address']     = $this->addressModel::where('id' , $id)->with('countries' , 'state' , 'city')->first();
        if($data['address'] == true)
        {
            return response()->json(['message' => 'success' , 'address' => $data['address']]);
        }
        else
        {
            return response()->json('message' , 'error');
        }
    }
    public function address_delete($id = null)
    {
        $deleteAddress       = $this->addressModel::where('id' , $id)->forceDelete();

        if($deleteAddress == true)
        {
            return response()->json(['message'  => 'success']);
        }
        else
        {
            return response()->json(['message'  => 'error']);
        }
    }
    public function last_order_filter($id =  null)
    {
        $number_of_last   =  $id ;
        $orders           =  $this->checkoutModel::where('user_id' , session()->get('user')['id'])->with('product')->orderBy('id' ,'desc')->limit($number_of_last)->get();

        if($orders == true)
        {
            return response()->json(['orders' => $orders]);
        }
        else
        {
            return response()->json(['message'=>'error']);
        }
    }
}
