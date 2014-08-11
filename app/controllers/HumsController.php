<?php

class HumsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		if (Request::ajax())
		{

          // creamos el array guardar 
         $id = Input::get('id');
         $nickname = Input::get('nickname');
         $msg = Input::get('mensaje');
         $estado = Input::get('estado');

         $hums = array(
            'usuario_id' => Input::get('id'),
            'mensaje' => Input::get('mensaje'),
            'estado' => Input::get('estado')

            );

            //creamos un nuevo registro 
         $msg_id = Hums::create($hums)->id;


         //  proceamos el mensaje para guardar los etiquetados y los hashtag
         $this->procesarHums($msg, $msg_id, $id, $nickname);

         //procesar los usuario que siguen al usuario que registro el mensaje y los que enviaron solicitud

         $this->Procesar_usuario_siguen($msg_id, $id, $estado);

            //traemos todos los hums del usuario actual
         $array_hums = Hums::myHums($id);


         return Response::json($array_hums);

     }

     return Redirect::to('/');
 }




 private function procesarHums($hums, $msg_id, $id_usuario, $nickname){


    		//mencionamos al usuario que registra
     $Menciones = array(
        'mensaje_id' => $msg_id,
        'usuario_id' => $id_usuario,
        'estado' => 0

        );

            //creamos un nuevo registro 
     Menciones::create($Menciones);


            //creamos un array dividiendo todas las palabras del hums
     $array_hums = preg_split("/[\s,]+/", $hums);

             //son las etiquetas que se van a buascar en el array
     $etiqueta  = "@";
     $hashtag = "#";

              //recorremos el array 
     foreach ($array_hums as $key => $value) {

                // si la palabra actual considen con un @ procede
        if (strpos($value,$etiqueta) === 0 && $value != $nickname) {

                  //buscamos el usuario en la base de datos
           $id =  User::where('nickname', 'LIKE', '%'.$value)->get();

                //si el usuario existe, estraemos el id, para guardarlo en la tabla menciones
           foreach ($id as $key => $value) {


              $Menciones = array(
                 'mensaje_id' => $msg_id,
                 'usuario_id' => $value->id,
                 'estado' => 0  );

                 //creamos un nuevo registro 
              Menciones::create($Menciones);


          }


      } elseif (strpos($value,$hashtag) === 0) {

         $hash = array(
            'mensaje_id' => $msg_id,
            'hashtag' => $value
            );

            //creamos un nuevo registro 
         Hashtag::create($hash);

     }

 }



}






private function Procesar_usuario_siguen($msg_id, $id_usuario, $estado){

if($estado == 0){

  $list_usuario_siguen = Seguir::usuario_me_siguen($id_usuario);

          //recorremos la lista de seguidores y los guardamos en mensiones respecto al msg actual

  foreach ($list_usuario_siguen as $key => $item_usuario) {


      if($id_usuario != $item_usuario->usuario_id){

          $Menciones = array(
              'mensaje_id' => $msg_id,
              'usuario_id' => $item_usuario->usuario_id,
              'estado' => 0

              );

            //creamos un nuevo registro 
          Menciones::create($Menciones);

      }
  }

}else if ($estado == 1){



      $list_usuario_solicitud = Solicitud::usuario_con_solicitud($id_usuario);

          //recorremos la lista de seguidores y los guardamos en mensiones respecto al msg actual

  foreach ($list_usuario_solicitud as $key => $item_usuario) {


      if($id_usuario != $item_usuario->usuario_id){

          $Menciones = array(
              'mensaje_id' => $msg_id,
              'usuario_id' => $item_usuario->usuario_id,
              'estado' => 0

              );

            //creamos un nuevo registro 
          Menciones::create($Menciones);

      }
  }




}



}



    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function getHums()
    {


      if (Request::ajax())
      {

         $id = Input::get('id');

            //array del registro registrado
         $array_hums = Hums::myHums($id);


         return Response::json($array_hums);

     }

     return Redirect::to('/');

 }





}
