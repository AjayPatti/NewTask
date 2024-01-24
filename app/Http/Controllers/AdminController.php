<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;
use Auth;
use DB;
class AdminController extends Controller
{
    public function Customer(Request $request){
        $login_id =Auth::user()->id;
        $login_type=Auth::user()->login_type;
      
        $data =Employee::where('login_user',$login_id)->where('deleted_at',null)->get();
        // dd($data);
        return view('customer',compact('data','login_type'));
    }
    public function add(){
        return view('customer_add');
    }
    public function AddEmployee(Request $request){
       
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'mobile' => ['required', 'string', 'min:10'],
          
        ]);

        try{
            $data=[
                'name' => $request['name'],
                'mobile' => $request['mobile'],
                'email' => $request['email'],
                'address' => $request['address'],
                'login_user' =>Auth::user()->id,
              
    
            ];
          $insert =  Employee::create($data);  
          if($insert != false){
            return ['status'=> true];
          }  

        }catch(\Exception $e){
            return $e;
        } 
    }
    public function ApproveStatus(Request $request){

       $id =$request->id;
       $approve=User::where('id',$id)->update([
        'approve_status' => '1',
    ]);
        if($approve != false){
           return ['status'=>true];
        }
    }
    public function edit(Request $request){
        $id = $request->query('id');
        // dd($id); 
        $data =Employee::where('id',$id)->get();
        return $data;
    }
    public function UpdateStore(Request $request){

        $email =$request->email;
        $name =$request->name;
        $mobile =$request->mobile;
        $address =$request->address;
        $id =$request->id;
        $approve=Employee::where('id',$id)->update([
         'email' => $email,
         'name' => $name,
         'mobile' => $mobile,
         'address' => $address,
     ]);
         if($approve != false){ 
              return['status' =>true];
         }
     }
     public function Reject(Request $request){

        $id =$request->id;
        $today = date("Y-m-d");

        $approve= Employee::where('id',$id)->update([
         'deleted_at' => $today,
     ]);

         if($approve != false){
            return['status' =>true];
         }
     }
}
