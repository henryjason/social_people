<?php

class BloqueoController extends \BaseController {

	 /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	 public function bloquear()
	 {

	 	if (Request::ajax())
	 	{


	 		$id_user = Input::get('id_user');
	 		$id_bloquear = Input::get('id_bloquear');

	 		$id = Bloquear::getbloquear($id_user, $id_bloquear);


	 		if($id  == null){

	 			$bloquear = new Bloquear;
	 			$bloquear->usuario_id = $id_user;
	 			$bloquear->usuario_id_bloqueo = $id_bloquear;
	 			$bloquear->save();


		        //como esta bloqueado eliminamos seguir si lo seguimos
	 			$id = Seguir::getSeguir($id_user, $id_bloquear);

	 			if($id  != null){

	 				$seguir = Seguir::findOrFail($id[0]->id);
	 				$seguir->delete();

	 			}


		         //como esta bloqueado eliminamos seguir si el nos sigue
	 			$id = Seguir::getSeguir($id_bloquear, $id_user);

	 			if($id  != null){

	 				$seguir = Seguir::findOrFail($id[0]->id);
	 				$seguir->delete();

	 			}


	 			  //como esta bloqueado eliminamos Las solicitud lo enviamos
	 			$id = Solicitud::getSolicitud($id_user, $id_bloquear);

	 			if($id  != null){

	 				$solicitud = Solicitud::findOrFail($id[0]->id);
	 				$solicitud->delete();

	 			}


		         //como esta bloqueado eliminamos la solicitud  si el nos la envio
	 			$id = Solicitud::getSolicitud($id_bloquear, $id_user);

	 			if($id  != null){

	 				$solicitud = Solicitud::findOrFail($id[0]->id);
	 				$solicitud->delete();

	 			}


	 		}else{

	 			$bloquear = Bloquear::findOrFail($id[0]->id);
	 			$bloquear->delete();

	 		}

	 		$array_bloquear = Bloquear::estado_bloqueo($id_user, $id_bloquear);


	 		return Response::json($array_bloquear);

	 	}

	 	return Redirect::to('/');


	 }

 /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
 public function estado_bloqueo()
 {

 	if (Request::ajax())
 	{


 		$id_user = Input::get('id_user');
 		$id_bloquear = Input::get('id_bloquear');


 		$array_bloquear = Bloquear::estado_bloqueo($id_user, $id_bloquear);

 		return Response::json($array_bloquear);

 	}

 	return Redirect::to('/');


 }


}
