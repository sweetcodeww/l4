<?php
class AuthController extends BaseController {

	public function login(){
		$credentials = Input::only('email', 'password');
		// return $credentials;
		if(Auth::attempt($credentials,true)){
			return array(
				'auth' => 'ok',
				'msg' => 'Login success !');
		}else{
			return ['msg' => 'Login Failed !'];
		}
	}

	public function logout(){
		Auth::logout();
		Session::flush();
		return array(
			'res' => 'ok',
			'msg' => 'You are logged out !');
	}

	public function getAuth(){
		$user = User::find(Auth::id());
		return $user;
	}
}