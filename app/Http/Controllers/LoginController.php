<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function Login(Request $request){
        $request->validate([
            'email' =>'required',
            'password' =>'required',
        ]);

       
        // try{
            $data =[
                $request->email,
                $request->passwod
            ];
            // dd($data);
          
        //     $login = DB::select(DB::raw('Select * from users where email =? and password = ?'),[]);
        //     // dd(Auth::guard('admin'));
        //     // if (\Auth::guard('admin')->attempt($request->only(['email','password']))){
        //     //     return redirect()->intended('/admin/dashboard');
        //     // }

        // }catch(\Exception $e){
        //     return response()->json([
        //         'success' => 'false',
        //         'errors'  => $e->getMessage(),
        //     ], 400);
        // }
        $credentials = $request->only('email', 'password');
        
        if (Auth::attempt($credentials)) {
        
            return redirect()->intended('dashboard')
                        ->withSuccess('Signed in');
        }else{
            echo "jfhsga";
        }


    }
}
