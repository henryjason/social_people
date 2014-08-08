<?php

class HashtagController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($id)
	{

		$array_hashtag = Hashtag::getHashtag('#'.$id);
		$this->layout->titulo = 'hashtag';
    	$this->layout->nest('content', 'hashtag.hashtag', array('hashtag' => $array_hashtag, 'hash' => $id));
	}

	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getHashtag()
	{


      if (Request::ajax())
		{
	
         $hashtag = Input::get('hashtag');

            //array del registro registrado
         $array_hums = Hashtag::getHashtag($hashtag);
    		
    		return Response::json($array_hums);

		}

	return Redirect::to('/');

	}

	public function serchashtag()
	{


      if (Request::ajax())
		{
	
         $hashtag = Input::get('hashtag');

            //array del registro registrado
         $array_hums = Hashtag::Serch_Hashtag($hashtag);
    		
    		return Response::json($array_hums);

		}

	return Redirect::to('/');

	}


}
