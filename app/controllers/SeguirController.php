<?php

class SeguirController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function seguir()
	{

		   if (Request::ajax())
		{


         $id_user = Input::get('id_user');
         $id_seguir = Input::get('id_seguir');
	
         $id = Seguir::getSeguir($id_user, $id_seguir);
        

         if($id  == null){

		$seguir = new Seguir;
		$seguir->usuario_id = $id_user;
		$seguir->usuario_id_seguir = $id_seguir;
		$seguir->save();

         }else{

         $seguir = Seguir::findOrFail($id[0]->id);
		 $seguir->delete();

         }

            $array_seguir = Seguir::estado_seguir($id_user, $id_seguir);

    		return Response::json($array_seguir);

		}

	   return Redirect::to('/');


	}

 /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function estado_seguir()
	{

		   if (Request::ajax())
		{


         $id_user = Input::get('id_user');
         $id_seguir = Input::get('id_seguir');
	
	
            $array_seguir = Seguir::estado_seguir($id_user, $id_seguir);

    		return Response::json($array_seguir);

		}

	   return Redirect::to('/');


	}

}
