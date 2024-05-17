<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Login;
use Hash;
use Session;



class Logincontroller extends Controller
{
    public function profile(){
        return view("project/profile");
    }
    public function   regitration(){
        return view("regitration");
    }
    public function login(){
        return view("login");
    }
    public function userregistration(Request $request){
        
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:logins',
                'password' => 'required',
                'cpassword' => 'required|same:password',
            ]);      

       $data=new Login();
       $data->name=$request['name'];
       $data->email=$request['email'];
        $data->password=Hash::make($request['password']);
        $data->cpassword=Hash::make($request['cpassword']);
        $data->save();

        if($data){
            return redirect('login')->with('success','you have regiter successfuly');
        }
        else{
            return back()->with('error','something wrong');
        }
       
    }
    public function userlogin(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
               
        ]);

        $data=Login::where('email','=',$request['email'])->first();
        if($data){
            if(Hash::check($request['password'],$data->password)){
                $request->Session()->put('loginid',$data->id);
                return redirect('profile');
            }
            else{
                return back()->with('fail','password is not match');

            }
        }
        else{
            return back()->with('fail','this email is not register');
        }  
    }
    public function logout(){
        if(Session::has('loginid')){
            Session::pull('loginid');
            return redirect('login');
        }   
    }


   }
