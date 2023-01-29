<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

use Session;

use App\Models\User;

class AuthenticationController extends Controller
{
    public function login() {
        return view('auth.login');
    }

    public function loginCheck(Request $request) {
        $request->validate([
    		'email' => 'required|email',
    		'password' => 'required|min:8',
    	],[
    		'email.required' => 'This field is required',
            'email.email' => 'This field must be an email',
            'password.min' => 'Password must be 8 characters or more',
            'password.required' => 'This field is required',
    	]);

        $currentHost = config('global.api_current_host');
        $postApi = $currentHost."/api/v1/user/login";

        $response = Http::asForm()->post($postApi, [
            'email' => $request->email,
            'password' => $request->password,
        ]);        

        if($response->status() == 200){
            $response = json_decode($response);

            if($response->type == 2) {
                $token = $response->access_token;
                $session_token = $request->session()->put('token', $token);
                return redirect()->route('dashboard');
            } else {
                return abort(403);
            }
        }
        else {
            return abort(401);
        }
    }

    public function logout() {
        $currentHost = config('global.api_current_host');
        $postApi = $currentHost."/api/v1/user/logout";
        $response = Http::asForm()->withToken(Session::get('token'))->post($postApi, [
            'token' => Session::get('token'),
        ]);

        if($response->status() == 200){
            $response = json_decode($response);
            Session::pull('token');
            return redirect()->route('login');
        }
        else {
            return redirect()->route('login');
        }
    }
}
