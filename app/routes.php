<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


Route::get('/', array('before' => 'guest', function(){
		return View::make('login/login');
	}));
Route::post('login', 'UserLogin@user');

Route::group(array('before' => 'auth'), function()
{
	Route::get('/inicio', function()
	{
		return View::make("artesano.inicio");
	});



	Route::get('/base2',function()
	{
		return View::make('layouts.baseartesanos');
	});


	Route::controller('users', 'UsersController');
	Route::get('logout', 'UserLogin@logOut');
	Route::controller('settings', 'SettingsController');
	Route::controller('credenciales','CredencialesController');
	 
	Route::get('artesano','AltaArtesanoController@get_nuevo');
	Route::post('artesano/registro','AltaArtesanoController@post_nuevo');

	Route::get('organizacion','RegistroOrganizacionController@get_nuevo');
	Route::post('organizacion','RegistroOrganizacionController@post_nuevo');

	Route::post('buscorg','AltaArtesanoController@post_buscorg');
	Route::get('por','AltaArtesanoController@get_nuevopor');
	Route::post('por/registro','AltaArtesanoController@post_nuevopor');

	Route::post('artesano/municipio','selectmunicipiosController@post_mun');
	Route::post('editarArtesano/municipio','selectmunicipiosController@post_mun');

	Route::get('verArtesano','EditarArtesanoController@ver');
	Route::post('verArtesano','EditarArtesanoController@buscar');
	Route::post('encontrado','EditarArtesanoController@buscarmodal');
	Route::get('editarArtesano','EditarArtesanoController@editar');
	Route::post('editarArtesano/update','EditarArtesanoController@update');
	Route::post('editarArtesano','EditarArtesanoController@buscar2');
	Route::post('encontradoupdate','EditarArtesanoController@encontrado');


	Route::post('buscaConcurso','RegistroenConcursoController@buscaConcurso');

	Route::get('/personaConcurso','RegistroenConcursoController@get_nuevo');
	Route::post('curp','RegistroenConcursoController@post_Curp');
	Route::post('personaConcurso','RegistroenConcursoController@post_nuevo');
	Route::post('personaConcurso2','RegistroenConcursoController@post_personaconcursos');

	Route::post('buscaconcursante','RegistroenConcursoController@post_buscaconcursante');
	Route::post('buscaconcursante2','RegistroenConcursoController@post_buscaconcursante2');

	Route::get('editarEventos','editarEventoController@get_nuevo');
	Route::post('editarEventos/feria','editarEventoController@updateFeria');
	Route::post('editarEventos/concurso','editarEventoController@updateConcurso');
	Route::post('editarEventos/taller','editarEventoController@updateTaller');
	Route::get('reportes/reportesmenu','ReportesController@get_menu');



	Route::get('ArtesanoEnFeria','ArtesanoEnFeriaController@get_ArtesanoEnFeria');
	Route::post('ArtesanoEnFeria','ArtesanoEnFeriaController@buscar');
	Route::post('ArtesanoEnFeria2','ArtesanoEnFeriaController@registrar');
	Route::get('ArtesanoEnTaller','RegistroenTallerController@get_nuevo');
	Route::post('ArtesanoEnTaller','RegistroenTallerController@buscar');
	Route::post('ArtesanoEnTaller2','RegistroenTallerController@registrar');

	Route::controller('reportes', 'ReportesController');
	Route::get('registrarEventos','RegistrarEventosController@get_nuevo');
	Route::post('registrarEventos/feria','RegistrarEventosController@feria');
	Route::post('registrarEventos/concurso','RegistrarEventosController@concurso');
	Route::post('registrarEventos/taller','RegistrarEventosController@taller');

	Route::get('ramas','CatalogosController@Ramas');
	Route::post('ramas/nuevarama','CatalogosController@NuevaRama');
	Route::post('ramas/updaterama','CatalogosController@UpdateRama');
	Route::post('ramas/delete','CatalogosController@EliminarRama');

	Route::get('gruposetnicos','CatalogosController@Grupos');
	Route::post('gruposetnicos/nuevogrupo','CatalogosController@NuevoGrupo');
	Route::post('gruposetnicos/updategrupo','CatalogosController@UpdateGrupo');
	Route::post('gruposetnicos/delete','CatalogosController@DeleteGrupo');

	Route::get('comprasyventas','CatalogosController@comprasyventas');
	Route::post('comprasyventas/nueva','CatalogosController@Nuevacv');
	Route::post('comprasyventas/update','CatalogosController@Updatecv');
	Route::post('comprasyventas/delete','CatalogosController@Eliminarcv');
	
	Route::get('organizaciones','OrganizacionesController@Organizaciones');
	Route::post('organizaciones/nueva','OrganizacionesController@NuevaOrg');
	Route::post('organizaciones/update','OrganizacionesController@UpdateOrg');
	Route::post('organizaciones/delete','OrganizacionesController@EliminarOrg');

	Route::post('organizaciones/comite','OrganizacionesController@Comite');

	Route::get('concursante','DatosConcursanteController@verConcursante');
	Route::post('concursante','DatosConcursanteController@buscar');
	Route::post('concursante/update','DatosConcursanteController@update');

	Route::controller('organizacion_artesano', 'OrgController');

    
});