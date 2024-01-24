<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
class RegisterController extends Controller
{
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
   public function Register(){
    return view('register');
   }    
    public function Store(Request $request){
       
        $request->validate([
            'name' =>'required',
            'email' =>'required',
            'password' =>'required',
        ]);
        $data=[
            'name' => $request['name'],
            'email' => $request['email'],
            'login_type'=>'admin',
            'password' => Hash::make($request['password']),

        ];
      $user = User::create($data);
      if($user){
          return ['status'=> true];

      }
       
        
            // app/Http/Controllers/Auth/RegisterController.php

 


        
    }
}
