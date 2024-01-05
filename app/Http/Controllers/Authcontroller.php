<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Checkout;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\State;
use App\Models\City;
use App\Models\UserAddresses;
use Carbon\Carbon;
use App\Models\FirebaseStore;
use Mail ;
use Illuminate\Support\Facades\Hash;
use App\Models\Notification;
class Authcontroller extends Controller
{
    public $parentModel      = User::class;
    public $countryModel     = Country::class ;
    public $cityModel        = City::class ;
    public $stateModel       = State::class;
    public $addressModel     = UserAddresses::class;
    public $checkoutModel    = Checkout::class;
    public $cartModel        = Cart::class;
    public $mailClass        = Mail::class;
    public $notification     = Notification::class;
    public $firebaseStore    = FirebaseStore::class;
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
                return redirect()->back()->with("error" , 'Please Verify Your Account');
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

        $userCount    = $this->parentModel::where('email' , $email)->count();
        $nameCount    = $this->parentModel::where('username' , $username)->count();
        if($userCount < 1 && $nameCount < 1)
        {
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
                    $image         =  $request->file('image');
                    $folderName    =  "UserImages/";
                    $imagePath     =   $this->firebaseStore::storeFiles($image , $folderName);
                    $updateImage   = $this->parentModel::where('id' , $user_create->id)->update([
                        'profile_image' => $imagePath,
                    ]);
                }
                $emailData  = [
                    'from'  => config('mail.mailers.smtp.username'),
                    'to'    => $email,
                    'subject' => "Email Verification"
                ];
                $verifyRoute   = Route('verify.email' , $user_create->id);
                $routeforhome  = Route('user.index');
                $sendEmail               = $this->mailClass::send('EmailTemplates.verifyemail' , ['routeforhome'=>$routeforhome , 'email_data' => $emailData ,'verifyRoute' => $verifyRoute] , function($message) use ($emailData){
                    $message->from($emailData['from'])->to($emailData['to'])->subject($emailData['subject']);
                });
                $currentTime    = Carbon::now();
                $storeNotification = $this->notification::create([
                    'subject' => 'User Has Registered',
                    'route' => Route('admin.user.index'),
                    'message' => "User $name Has Registered at $currentTime",
                ]);
                return redirect(Route('login.view'))->with('success' , 'Your Account has been register please check your email to get verified');
            }
            else
            {
                return redirect()->back()->with('error' , 'Failed to add Your credientals');
            }
        }
        else if($userCount >=1)
        {
            return redirect()->back()->with('error' , 'Email Already Exists use a different one');
        }
        else if($nameCount >=1)
        {
            return redirect()->back()->with('error' , 'User Name Already Exists use a different one');
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
        $data['address']   =  $this->addressModel::where('user_id', $id )->get() ;
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
            $userData     = User::where('id' , $id )->first();
            if($userData->role == 1)
            {
                session()->put('admin' , $userData);
            }
            if($userData->role == 0)
            {
                session()->put('user' , $userData);
            }
            $currentTime    = Carbon::now();
            $storeNotification = $this->notification::create([
                'subject' => 'User Has Update Profile',
                'route' => Route('admin.user.index'),
                'message' => "$name Has Updated Profile at $currentTime",
            ]);
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
            $data['user']          = $this->parentModel::where('id' , $createAddress->user_id)->with('address')->get();
            $data['address']       = $this->addressModel::where('user_id' , $createAddress->user_id)->with('countries')->get();
            return response()->json(['message' => 'success' , 'userdata' => $data['user'] , 'address' => $data['address']]);
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
       $checkoutAddress   =  $this->checkoutModel::where('address_id' , $id)->count();
       if($checkoutAddress >=1 )
       {
        return response()->json(["message" => "delete"]);
       }
       else
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
    public function order_tracking(Request $request){
        $tracking_number    =  $request->tracking_number;
        $data['checkout']   =  $this->checkoutModel::where('tracking_id',$tracking_number)->first();
        if($data ['checkout'] == true){
            if($data['checkout'] ->is_delivered == 4 ){
                return redirect()->back()->with('error','This order has been cancelled');
            }
            return view('User.ordertracking')->with('data',$data);
        }else{
            return redirect()->back()->with('error','No matching order found for this tracking id');

        }

    }
    public function create_address(Request $request){
        $address_id = $request->address_id;
        $user_id    = session()->get('user')['id'];
        $address1   = $request->streetaddress1;
        $address2   = $request->streetaddress2;
        $contact1   = $request->contactNumber1;
        $contact2   = $request->contactNumber2;
        $postalcode = $request->postalcode;
        $city       = $request->city;
        $country    = $request->country;
        $state      = $request->state;

        $saveAddress = $this->addressModel::updateOrcreate(['id' => $address_id],[
            'user_id' => $user_id ,
            'phone_number1' => $contact1 ,
            'phone_number2' => $contact2 ,
            'addressline1'  => $address1 ,
            'addressline2'  => $address2 ,
            'postalcode'    => $postalcode ,
            'city'          => $city ,
            'country'       => $country ,
            'state'         => $state ,
        ]);
        if($saveAddress == true){
            $data['address']     = $this->addressModel::where('user_id' , $user_id)->with('countries')->get();
            return response()->json(['message' => 'success'  , 'address' => $data['address']]);
        }else{
            return response()->json(['message' => 'error']);
        }


    }
    public function remove_account($id = null)
    {
            $userData            = $this->parentModel::where('id' , $id)->first();
            // To Remove Admin Account
             if($userData->role == 1){
                $currentTime    = Carbon::now();

                $storeNotification = $this->notification::create([
                    'subject' => 'Admin Account Deleted',
                    'route'   =>  Route('admin.user.index'),
                    'message' => "$userData->name Has Deleted Profile at $currentTime",
                ]);

                $removeAccount   = $this->parentModel::where("id" , $id )->forceDelete();
                if($removeAccount)
                {
                session()->forget('admin');
                return redirect(Route('Auth_login'))->with('error' , 'Your Account Has been removed You have no access to your account anymore');
                }
                else
                {
                    return redirect()->back()->with('error' , 'Failed to Remove Your account');
                }
            }
            // To Remove user Account
            if($userData->role == 0){

                $currentTime    = Carbon::now();

                $storeNotification = $this->notification::create([
                    'subject' => 'User Account Deleted',
                    'route'   =>   Route('admin.user.index'),
                    'message' => "$userData->name Has Deleted Profile at $currentTime",
                ]);
                $orderDelete     = $this->checkoutModel::where('user_id'  , $id)->forceDelete();
                $cartDelete      = $this->cartModel::where('user_id'  , $id)->forceDelete();

                    $removeAccount   = $this->parentModel::where("id" , $id )->first();

                    if($removeAccount != null )
                    {
                      session()->forget('user');
                      $removeAccount->delete();
                      return redirect(route('login.view'))->with('error' , 'Your Account Has been removed You have no access to your account anymore');
                    }
                    else
                    {
                      return redirect()->back()->with('error' , 'Failed to Remove Your account');
                    }
            }


    }
    public function verify_email_address($id = null)
    {
        $verify   =  $this->parentModel::where('id' , $id)->update([
            'email_verified_at' => Carbon::now()
        ]);
        $userData        = $this->parentModel::where('id' , $id)->first();

        if($verify == true)
        {
            $currentTime    = Carbon::now();
            $storeNotification = $this->notification::create([
                'subject' => 'Email Verified',
                'route'   =>   Route('admin.user.index'),
                'message' => "$userData->name Has Verified Email at $currentTime",
            ]);
            return redirect(Route('login.view'))->with('success' , 'Your Email has been verified');
        }
        else
        {
            return redirect(Route('login.view'))->with('error' , 'Failed to Verify your Email');

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
}
