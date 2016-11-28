<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class SessionController extends Controller
{
    public function index() {
        
        echo csrf_token();
        return view('login');
    }
    
    public function login(Request $request) {
        $user = DB::connection('mysql')
        $username = $request->username;
        $password = sha1('4521'.$request->password.'encrypt');
        echo "<br>$username<br>$password<br>";
        echo $request->_token;
    }
}
