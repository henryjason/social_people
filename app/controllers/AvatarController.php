<?php

class AvatarController extends \BaseController {


		/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
		public function editarAvatar()
		{

			if(Input::hasFile('archivo')) {

				$file = Input::file('archivo');

				$extension = $file->getClientOriginalExtension();
          //$type = $file->getMimeType();

				if($extension == 'jpg' || $extension == 'png' || $extension == 'gif'){

					$name = Auth::user()->getNickName().'.'.$extension;
					$file->move( 'public/avatar/', $name);


					$avatar = User::findOrFail(Auth::user()->getId());

					$avatar->avatar = "avatar/".$name;

					$avatar->save();
				}


			}

			return Redirect::to('/');
		}

		/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
		public function deleteAvatar()
		{

	$avatar = User::findOrFail(Auth::user()->getId());

					$avatar->avatar = "img/avatar.jpg";

					$avatar->save();

					return Redirect::to('/');

		}




	}
