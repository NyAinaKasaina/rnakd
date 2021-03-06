<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

class SessionController extends Controller
{
    public function index(Request $request) {
        if($request->session()->has('applinkadmin')) {
            return redirect()->route('admin');
        }
        else {
            return redirect()->route('invite');
        }
        return redirect()->route('invite');
    }
    
    public function login(Request $request) {
        $username = $request->username;
        $password = sha1("4521".$request->password."encrypt");
        $token = $request->_token;
        $user = DB::connection('mysql')->table('users')
                ->where('name','=',$username)
                ->where('password',$password)
                ->select('*')
                ->get();
            if(sizeof($user) > 0) {
                $user = $user[0];
                User::find($user->id)->update(['remember_token' => $token]);
                $request->session()->put('applinkadmin', $username);
                return redirect()->route('admin');
            }
            else{
                $error['error'] = "Login ou mot de passer erroné!";
                $error['username'] = $username;
                return view('login', $error);
            }
        
    }
    
    public function logout(Request $request) {
        $error['username'] = $request->session()->get('applinkadmin');
        $request->session()->put('applinkadmin',null);
        $error['error'] = "Votre session a été bien fermé.";
        return view('login',$error);
    }
    
    public function invite() {
        return view('invite');
    }
    
    public function administrator(Request $request) {
        if($request->session()->has('applinkadmin')) {
            $admin['admin'] = $request->session()->get('applinkadmin');
            return view('admin', $admin);
        }
        else {
            $error['error'] = "Vous devez connecter d'abord";
            return view('login', $error);
        }
    }
}
