<?php

class SolicitudController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function solicitud()
	{


		   if (Request::ajax())
		{


         $id_user = Input::get('id_user');
         $id_solicitud = Input::get('id_solicitud');
	
         $id = Solicitud::getSolicitud($id_user, $id_solicitud);
         
         //verificar si el usuario no esta bloqueado
         $id_bloqueado = Bloquear::getbloquear($id_solicitud, $id_user );

        if($id_bloqueado == null) {

         if($id  == null){

		$solicitud = new Solicitud;
		$solicitud->usuario_id = $id_user;
		$solicitud->usuario_id_solicitud = $id_solicitud;
		$solicitud->estado = 0;
		$solicitud->save();




         }else{

         $solicitud = Solicitud::findOrFail($id[0]->id);
		 $solicitud->delete();

         }

     }//fin si usuario no esta bloqueado

            $array_solicitud = Solicitud::estado_solicitud($id_user, $id_solicitud);

    		return Response::json($array_solicitud);

		}

	   return Redirect::to('/');


	}

		public function putsolicitud($id, $estado)
	{

         if($estado == 1){

          $solicitud = Solicitud::findOrFail($id);

		  $solicitud->estado = $estado;
		  $solicitud->save();

         }else{
          
         $solicitud = Solicitud::findOrFail($id);
		 $solicitud->delete();

         }

          return Redirect::to('/');
 }

 /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function estado_solicitud()
	{

		   if (Request::ajax())
		{


         $id_user = Input::get('id_user');
         $id_solicitud = Input::get('id_solicitud');
	
	
            $array_solicitud = Solicitud::estado_solicitud($id_user, $id_solicitud);

    		return Response::json($array_solicitud);

		}

	   return Redirect::to('/');


	}



	 /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getsolicitud()
	{

		   if (Request::ajax())
		{


         $id_user = Input::get('id_user');
	
            $array_solicitud = Solicitud::get_solicitudes($id_user);

    		return Response::json($array_solicitud);

		}

	   return Redirect::to('/');


	}







}
