<?php

class AltaArtesanoController extends BaseController {



	public function get_nuevo()
	{
		$municipios 	= Municipio::all();
		$municipiosArr 	= array();
		foreach($municipios as $municipio)
		{
		$municipiosArr[$municipio->id] = $municipio->nombre;
		}
		
		$grupos 	= Gruposetnico::all();
		$gruposArr 	= array();
		foreach($grupos as $grupo)
		{
		$gruposArr[$grupo->id] = $grupo->nombre;
		}

		$ramas 		= Rama::all();
		$ramasArr 	= array();
		foreach($ramas as $rama)
		{
		$ramasArr[$rama->id] = $rama->nombre;
		}
		return View::make('artesano.registroArtesano')->with('municipios',$municipiosArr)->with('grupos',$gruposArr)->with('ramas',$ramasArr);

	}

	public function get_nuevopor()
	{

		$municipios 	= Municipio::all();
		$municipiosArr 	= array();
		foreach($municipios as $municipio)
		{
		$municipiosArr[$municipio->id] = $municipio->nombre;
		}
		
		$grupos 	= Gruposetnico::all();
		$gruposArr 	= array();
		foreach($grupos as $grupo)
		{
		$gruposArr[$grupo->id] = $grupo->nombre;
		}

		$ramas 		= Rama::all();
		$ramasArr 	= array();
		foreach($ramas as $rama)
		{
		$ramasArr[$rama->id] = $rama->nombre;
		}
		return View::make('artesano.PorOrganizacion')->with('municipios',$municipiosArr)->with('grupos',$gruposArr)->with('ramas',$ramasArr);
	}

	public function post_nuevo()
	{
	///////////////////////////////////////////////////Artesano
		$personaArtesano = Persona::create(array(
			'nombre'			=> Input::get('nombre'),
			'paterno'			=> Input::get('paterno'),
			'materno'			=> Input::get('materno'),
			'curp' 				=> Input::get('curp'),
			'sexo'				=> Input::get('sexo'), 
			'cuis'				=> Input::get('cuis'),
			'cp'				=> Input::get('cp'), 
			'observaciones'		=> Input::get('observ'), 
			'fechanacimiento'	=> Input::get('fechanace'), 
			'grupoetnico_id'	=> Input::get('grupoetnico'), 
			'localidad_id'		=> Input::get('localidad'), 
			'rama_id'			=> Input::get('rama')));

		$telefono = Telefono::create(array(
			'persona_id' 	=> $personaArtesano->id,
		    'numero'		=> Input::get('numero'),
			'lada' 			=> Input::get('lada'),
			'tipo' 			=> Input::get('tipoTel'),));
		$direccion = Direccion::create(array(
			'persona_id' 	=> $personaArtesano->id,
		    'calle'			=> Input::get('calle'),
			'num' 		=> Input::get('numero'),
			'cp' 			=> Input::get('cp'),
			'colonia' 		=> Input::get('colonia'),));

		$artesano = Artesano::create(array(
			'persona_id' 	=> $personaArtesano->id,
		    'ine'			=> Input::get('ine'),
			'RFC' 			=> Input::get('RFC'),
			'estadocivil' 	=> Input::get('civil'),
			'fecharegistro' => date('Y-m-d'),
			'taller' 		=> Input::get('taller'),
			));

			$checks = array();
			$checks[] = Input::get('matprim1');
			$checks[] = Input::get('matprim2');
			$checks[] = Input::get('matprim3');
			$checks[] = Input::get('venta1');
			$checks[] = Input::get('venta2');
			$checks[] = Input::get('venta3');
			$checks[] = Input::get('compr1');
			$checks[] = Input::get('compr2');
			$checks[] = Input::get('compr3');

			$artesano = Artesano::find($artesano->id);

			foreach ($checks as $check) {
				if ($check != '') {
					$artesano->comprasyventas()->attach($check);	
				}
			}

		$producto = Producto::create(array(
			'artesano_id' 		=> $artesano->id,
		    'nombre'			=> Input::get('producto1'),
			'produccionmensual' => Input::get('prod1'),
			'costoaprox' 		=> Input::get('costo1'),));

		if (Input::file("fotoperfil") != '') {
			$file = Input::file("fotoperfil")->move("imgs/perfil/",$personaArtesano->id.'.'.Input::file('fotoperfil')->guessClientExtension());
			$documento = new Documento;
			$documento -> nombre = 'Foto del artesano';
			$documento -> ruta = 'imgs/perfil/'.$personaArtesano->id.'.'.Input::file('fotoperfil')->guessClientExtension();
			$documento -> persona_id = $personaArtesano->id;
			$documento -> save();

			AltaArtesanoController::resizeImagen('', $documento->ruta, 300, 300,$documento->ruta,Input::file('fotoperfil')->guessClientExtension(),75);
		}
		else{
			$documento = new Documento;
			$documento -> nombre = 'Foto del artesano';
			$documento -> ruta = 'imgs/perfil/default.png';
			$documento -> persona_id = $personaArtesano->id;
			$documento -> save();
		}

		if (Input::file("curppic") != '') {
			$file = Input::file("curppic")->move("imgs/curps/",$personaArtesano->id.'.'.Input::file('curppic')->guessClientExtension());
			$documento = new Documento;
			$documento -> nombre = 'CURP';
			$documento -> ruta = 'imgs/curps/'.$personaArtesano->id.'.'.Input::file('curppic')->guessClientExtension();
			$documento -> persona_id = $personaArtesano->id;
			$documento -> save();
		}
		
		if (Input::file("inepic") != '') {
			$file = Input::file("inepic")->move("imgs/ine/",$personaArtesano->id.'.'.Input::file('inepic')->guessClientExtension());
			$documento = new Documento;
			$documento -> nombre = 'Credencial INE';
			$documento -> ruta = 'imgs/ine/'.$personaArtesano->id.'.'.Input::file('inepic')->guessClientExtension();
			$documento -> persona_id = $personaArtesano->id;
			$documento -> save();
		}
		if (Input::file("actapic") != '') {
			$file = Input::file("actapic")->move("imgs/actas/",$personaArtesano->id.'.'.Input::file('actapic')->guessClientExtension());
			$documento = new Documento;
			$documento -> nombre = 'Acta de nacimiento';
			$documento -> ruta = 'imgs/actas/'.$personaArtesano->id.'.'.Input::file('actapic')->guessClientExtension();
			$documento -> persona_id = $personaArtesano->id;
			$documento -> save();
		}
	return Response::json(array('success' => true,'artesano' => $personaArtesano));
	}

	public function post_nuevopor()
	{
		///////////////////////////////////////////////////Artesano
	$personaArtesano = Persona::create(array(
			'nombre'			=> Input::get('nombre'),
			'paterno'			=> Input::get('paterno'),
			'materno'			=> Input::get('materno'),
			'curp' 				=> Input::get('curp'),
			'sexo'				=> Input::get('sexo'), 
			'cuis'				=> Input::get('cuis'),
			'cp'				=> Input::get('cp'), 
			'observaciones'		=> Input::get('observ'), 
			'fechanacimiento'	=> Input::get('fechanace'), 
			'grupoetnico_id'	=> Input::get('grupoetnico'), 
			'localidad_id'		=> Input::get('localidad'), 
			'rama_id'			=> Input::get('rama')));

		$telefono = Telefono::create(array(
			'persona_id' 	=> $personaArtesano->id,
		    'numero'		=> Input::get('numero'),
			'lada' 			=> Input::get('lada'),
			'tipo' 			=> Input::get('tipoTel'),));
		$direccion = Direccion::create(array(
			'persona_id' 	=> $personaArtesano->id,
		    'calle'			=> Input::get('calle'),
			'num' 		=> Input::get('numero'),
			'cp' 			=> Input::get('cp'),
			'colonia' 		=> Input::get('colonia'),));

		$artesano = Artesano::create(array(
			'persona_id' 	=> $personaArtesano->id,
		    'ine'			=> Input::get('ine'),
			'RFC' 			=> Input::get('RFC'),
			'estadocivil' 	=> Input::get('civil'),
			'fecharegistro' => date('Y-m-d'),
			'taller' 		=> Input::get('taller'),
			));

			$checks = array();
			$checks[] = Input::get('matprim1');
			$checks[] = Input::get('matprim2');
			$checks[] = Input::get('matprim3');
			$checks[] = Input::get('venta1');
			$checks[] = Input::get('venta2');
			$checks[] = Input::get('venta3');
			$checks[] = Input::get('compr1');
			$checks[] = Input::get('compr2');
			$checks[] = Input::get('compr3');

			$artesano = Artesano::find($artesano->id);

			foreach ($checks as $check) {
				if ($check != '') {
					$artesano->comprasyventas()->attach($check);	
				}
			}

			if (Input::file("fotoperfil") != '') {
				$file = Input::file("fotoperfil")->move("imgs/perfil/",$personaArtesano->id.'.'.Input::file('fotoperfil')->guessClientExtension());
				$documento = new Documento;
				$documento -> nombre = 'Foto del artesano';
				$documento -> ruta = 'imgs/perfil/'.$personaArtesano->id.'.'.Input::file('fotoperfil')->guessClientExtension();
				$documento -> persona_id = $personaArtesano->id;
				$documento -> save();

				AltaArtesanoController::resizeImagen('', $documento->ruta, 300, 300,$documento->ruta,Input::file('fotoperfil')->guessClientExtension(),75);
			}
			else{
				$documento = new Documento;
				$documento -> nombre = 'Foto del artesano';
				$documento -> ruta = 'imgs/perfil/default.png';
				$documento -> persona_id = $personaArtesano->id;
				$documento -> save();
			}

			if (Input::file("curppic") != '') {
				$file = Input::file("curppic")->move("imgs/curps/",$personaArtesano->id.'.'.Input::file('curppic')->guessClientExtension());
				$documento = new Documento;
				$documento -> nombre = 'CURP';
				$documento -> ruta = 'imgs/curps/'.$personaArtesano->id.'.'.Input::file('curppic')->guessClientExtension();
				$documento -> persona_id = $personaArtesano->id;
				$documento -> save();
			}

			if (Input::file("inepic") != '') {
				$file = Input::file("inepic")->move("imgs/ine/",$personaArtesano->id.'.'.Input::file('inepic')->guessClientExtension());
				$documento = new Documento;
				$documento -> nombre = 'Credencial INE';
				$documento -> ruta = 'imgs/ine/'.$personaArtesano->id.'.'.Input::file('inepic')->guessClientExtension();
				$documento -> persona_id = $personaArtesano->id;
				$documento -> save();
			}
			if (Input::file("actapic") != '') {
			$file = Input::file("actapic")->move("imgs/actas/",$personaArtesano->id.'.'.Input::file('actapic')->guessClientExtension());
			$documento = new Documento;
			$documento -> nombre = 'Acta de nacimiento';
			$documento -> ruta = 'imgs/actas/'.$personaArtesano->id.'.'.Input::file('actapic')->guessClientExtension();
			$documento -> persona_id = $personaArtesano->id;
			$documento -> save();
		}

		//////////////Productos

		if (Input::get('producto1') != '') {
				
		$producto = Producto::create(array(
				'artesano_id' 		=> $artesano->id,
			    'nombre'			=> Input::get('producto1'),
				'produccionmensual' => Input::get('prod1'),
				'costoaprox' 		=> Input::get('costo1'),
			));
		}

		if (Input::get('producto2') != '') {
				
			$producto 			= Producto::create(array(
			'artesano_id'		=> $artesano->id,
		    'nombre'			=> Input::get('producto2'),
			'produccionmensual' => Input::get('prod2'),
			'costoaprox' 		=> Input::get('costo2'),));
		}

		if (Input::get('producto1') != '') {
				
			$producto 			= Producto::create(array(
			'artesano_id' 		=> $artesano->id,
		    'nombre'			=> Input::get('producto3'),
			'produccionmensual' => Input::get('prod3'),
			'costoaprox' 		=> Input::get('costo3'),));
		}

		//////////////////////////////////////////////////////
		//$artesano = Artesano::find($artesano->id);
		$artesano->organizacion()->attach(Input::get('orgid'));
			if ((Input::get('cargo')) != '') {
				$artesano->Comite()->attach(Input::get('comiteid'),array('cargo' => Input::get('cargo'),));	
				}
		return Response::json(array('success' => true));	
	}

	public function post_buscorg(){
		$nombre 	= Input::get('nombreorg');
		$organizaciones = Organizacion::where('nombre','like',$nombre.'%','and')->get();
		// $comite = Comite::whereHas('organizacion',function($q) use ($nombre){ 
		// 	$q->where('nombre','like',$nombre.'%','and');
		// })->get();
		$dato = array();
		foreach ($organizaciones as $organizacion) {
			$dato[] = array(
				'id' 				=> $organizacion -> Comite -> id,
				'organizacion_id' 	=> $organizacion -> id,
				'nombre' 			=> $organizacion -> nombre,
				'telefono' 			=> $organizacion -> telefono,
			);
		}
		
		return Response::json($dato);
	}

	public function resizeImagen($ruta, $nombre, $alto, $ancho,$nombreN,$extension,$ppp){
        $rutaImagenOriginal = $ruta.$nombre;
        if($extension == 'GIF' || $extension == 'gif'){
        $img_original = imagecreatefromgif($rutaImagenOriginal);
        }
        if($extension == 'jpg' || $extension == 'JPG'){
        $img_original = imagecreatefromjpeg($rutaImagenOriginal);
        }
        if($extension == 'png' || $extension == 'PNG'){
        $img_original = imagecreatefrompng($rutaImagenOriginal);
        }
        if($extension == 'jpeg' || $extension == 'JPEG'){
        $img_original = imagecreatefromjpeg($rutaImagenOriginal);
        }
        $max_ancho = $ancho;
        $max_alto = $alto;
        list($ancho,$alto)=getimagesize($rutaImagenOriginal);
        $x_ratio = $max_ancho / $ancho;
        $y_ratio = $max_alto / $alto;
        if( ($ancho <= $max_ancho) && ($alto <= $max_alto) ){//Si ancho 
        $ancho_final = $ancho;
            $alto_final = $alto;
        } elseif (($x_ratio * $alto) < $max_alto){
            $alto_final = ceil($x_ratio * $alto);
            $ancho_final = $max_ancho;
        } else{
            $ancho_final = ceil($y_ratio * $ancho);
            $alto_final = $max_alto;
        }
        $tmp=imagecreatetruecolor($ancho_final,$alto_final);
        imagecopyresampled($tmp,$img_original,0,0,0,0,$ancho_final, $alto_final,$ancho,$alto);
        imagedestroy($img_original);
        $calidad=$ppp;
        imagejpeg($tmp,$ruta.$nombreN,$calidad);
        
    }
}