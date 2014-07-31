<?php

class HumsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
			  //$piloto_id = Input::get('piloto');
		//$avion_id = Input::get('avion');
        

		if (Request::ajax())
		{
	
         $id = Input::get('id');

        $hums = array(
        'usuario_id' => Input::get('id'),
        'mensaje' => Input::get('mensaje'),
        'estado' => Input::get('estado')

        );
            
            //creamos un nuevo registro 
         Hums::create($hums);

            //array del registro registrado
         $array_hums = Hums::myHums($id);
    		

    		return Response::json($array_hums);

		}
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

      

	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
