<?php

class EditarController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$this->layout->titulo = 'Editar' .Auth::user()->getNickName();
		return $this->layout->nest('content', 'user.Editar_user');
	}





}
