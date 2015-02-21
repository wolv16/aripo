<?php 
class UsersController extends BaseController{
	
	public function __construct()
	{
		$this->beforeFilter('auth');  
	}
	
	public function getIndex()
	{
		$my_id = Auth::user()->id;
		if(Auth::user()->role_id == 2){	
			$users = User::where('role_id','<>','2')->where('id','<>',$my_id)->get();
			return View::make('usuarios.usuarios')-> with('users',$users);			
		}
		else{
			return "sorry no eres administrador";	
		}	
	}

	// metodo para agregar al usuario
    public function postNuevo()
	{
		//validamos reglas inputs
		$rules = array(
			'nombre' => 'required|max:50|unique:users,username',
			'tipo' => 'required',
			);
		$validation = Validator::make(Input::all(), $rules);
		if($validation->fails()){		
		  return Response::json(array('success' => false));
		}
		//si todo esta bien guardamos
		$user = new User;
        $user->username = Input::get('nombre');
	    $user->role_id = Input::get('tipo');
        $user->password = Hash::make('123');
	    $user->save();

		return Response::json(array(
			'success' 	=> 	true,
			'user_id' 	=> 	$user->id,
			'username' 	=> 	$user->username,
			'role_id' 	=> 	$user->role_id));
	}
		// eliminar usuarios
	public function postDelete()
	{
		$rules = array(
			'user' => 'required',
			);
		$validation = Validator::make(Input::all(), $rules);
		if($validation->fails()){		
		  return Response::json(array('success' => false));
		}
		//buscamos el usuario en la base de datos segun la id enviada
		$user = User::find(Input::get('user'));
		$user->delete();
		return Response::json(array('success' => true));
	}

	//controlador para actualizar datos del usuario
	public function postUpdate()
	{
		$rules = array(
			'nombre_editar' => 'required|max:50',
			'tipo_editar' 	=> 'required',
			'id'			=> 'required'
			);
		$validation = Validator::make(Input::all(), $rules);
		if($validation->fails()){		
		  return Response::json(array('success' => false));
		}
		$user = User::where('username','=',Input::get('nombre_editar'))->first();
		if(!is_null($user))
			if($user->id != Input::get('id'))
			return Response::json(array('errors' => true));
		User::find(Input::get('id'))->update(array('username' => Input::get('nombre_editar'),'role_id' => Input::get('tipo_editar')));
		return Response::json(array(
			'success' 	=> 	true,
			'user_id' 	=> 	Input::get('id'),
			'username' 	=> 	Input::get('nombre_editar'),
			'role_id' 	=> 	Input::get('tipo_editar')));	
	}

	public function postPassword()
	{
		$rules = array(
			'user' => 'required',
			);
		$validation = Validator::make(Input::all(), $rules);
		if($validation->fails()){		
		  return Response::json(array('success' => false));
		}
		//buscamos el usuario en la base de datos segun la id enviada
		User::find(Input::get('user'))->update(array('password' => Hash::make('123')));
		return Response::json(array('success' => true));
	}
}
?>