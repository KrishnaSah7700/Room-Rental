<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Systemsetting;
class LoginController extends Controller
{
    public function login(Request $request){
       
        $request->validate([
            'email' =>'required|email',
            'password' =>'required|min:6'
        ]);

        //find user
       try{
        $user = User::where('email',$request->email)->first();
        if($user){
            if($user->password){
                if(Hash::check($request->password, $user->password)){
                    Auth::guard('admin')->login($user);
                    return redirect()->route('dashboard');
                }
                $request->session()->flash('error', 'Please check Password');
                return redirect()->back();
            } 
        }
        $request->session()->flash('error', 'User Not found');
        return redirect()->back();
       }catch(\Exception $e){
        dd($e);
       }
     
    }

    public function dashboard(){
        $system_setting = Systemsetting::find(1);
        $_SESSION['setting'] = $system_setting;
        return view('backend.dashboard.index', compact('system_setting'));
    }
}
