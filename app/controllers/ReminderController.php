<?php

class ReminderController extends BaseController {

public function remind()
  {
    return View::make('password/remind');
  }
  
  public function request()
{
  switch ($response = Password::remind(Input::only('email')))
		{
			case Password::INVALID_USER:
				return Redirect::back()->with('error', Lang::get($response));
			case Password::REMINDER_SENT:
				return Redirect::back()->with('status', Lang::get($response));
		}
}
public function reset($token)
{
  return View::make('password/reset')->with('token', $token);
}

public function update()
{
  $credentials = array('email' => Input::get('email'));
 
  return Password::reset($credentials, function($usuarios, $password)
  {
    $usuarios->contrasena = Hash::make($password);
 
    $usuarios->save();
 
    return Redirect::to('home/ingreso')->with('flash', 'Your password has been reset');
  });
}

}
