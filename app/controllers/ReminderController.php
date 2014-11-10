<?php

class ReminderController extends BaseController {

public function create()
	{
		return View::make('password_resets.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		Password::remind(Input::get('email'), function($message)
		{
			$message->subject('Your Password Reminder');
		});

		$status = Session::has('error') ? 'Could not find user with that email address.' : 'Please check your email!';

		return Redirect::route('reminder')->withStatus($status);
	}

	public function reset($token)
	{
		return View::make('password_resets.reset')->withToken($token);
	}

	public function postReset()
	{
		$creds = [
			'Correo_electronico' => Input::get('email'),
			'Password' => Input::get('password'),
			'password_confirmation' => Input::get('password_confirmation')
		];

		return Password::reset($creds, function($user, $password)
		{
			$user->password = Hash::make($password);
			$user->save();

			return Redirect::route('sessions.create');
		});
	}

}
