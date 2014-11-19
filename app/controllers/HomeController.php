<?php

class HomeController extends BaseController {

	
	protected $layout = 'layouts.master';

	public function get_ingreso() {
        return View::make('home/ingreso');
    }
    public function get_home() {
        return  View::make('home/hello');
    }

}
