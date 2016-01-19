<?php
class LoginController extends BaseController{

	public function login(){
		$credentials = Input::only('email', 'password');
		// return $credentials;
		if(Auth::attempt($credentials,true)){
			return array(
				'auth' => 'ok',
				'msg' => 'Login success !');
		}else{
			return ['msg' => 'Login gagal !'];
		}
	}

	public function auth()
	{
        // grab credentials from the request
		$credentials = Input::only('email', 'password');

		try {
            // attempt to verify the credentials and create a token for the user
			if (! $token = JWTAuth::attempt($credentials)) {
				return Response::json(['error' => 'invalid_credentials'], 401);
			}
		} catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
			return Response::json(['error' => 'could_not_create_token'], 500);
		}

        // all good so return the token
		JWTAuth::attempt($credentials);
		return Response::json(compact('token'));
	}

	public function getToken(){
		return csrf_token();
	}

	public function logout(){
		Auth::logout();
		Session::flush();
	}
}