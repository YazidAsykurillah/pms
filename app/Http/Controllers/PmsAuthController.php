<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Validator;
use Auth;

class PmsAuthController extends Controller
{

	public function validator(array $data)
	{
	    // custom error message for valid_captcha validation rule
	    $messages  = [
	      'valid_captcha' => 'Wrong code. Try again please.'
	    ];

	    return Validator::make($data, [
	    	'email' => 'required|email|exists:users,email',
	    	'password'=>'required',
	     	'CaptchaCode' => 'required|valid_captcha'
	    ], $messages);
	}
	
	public function getLogin()
	{
		return view('auth.login');
	}

    public function postLogin(Request $request)
    {
    	$validator = $this->validator($request->all());
    	if ($validator->fails()){
		    return redirect()
		            ->back()
		            ->withInput()
		            ->withErrors($validator->errors());
		}

		if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            	// Authentication passed...
	            return redirect()->intended('dashboard');
	    }
		 
    }

    public function getLogout()
    {
    	Auth::logout();
    	return redirect('/login');
    }
    
}
