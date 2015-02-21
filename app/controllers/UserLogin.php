<?php
 
class UserLogin extends BaseController {
 
    public function user()
    {
        $userdata = array(
            'username' => Input::get('username'),
            'password' => Input::get('password')
        );
 
        if(Auth::attempt($userdata))
        {
            return Redirect::to('inicio');
        }
        else{
			return Redirect::to('/')->with('mensaje_error','El nombre de usuario o la contraseña son incorrectos.');
        }
    }
    public function logOut()
    {
        Auth::logout();
        return Redirect::to('/')
                    ->with('mensaje_error', 'Tu sesión ha sido cerrada.');
    }
}

?>