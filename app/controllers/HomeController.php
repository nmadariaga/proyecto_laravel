<?php

class HomeController extends BaseController {

	
	protected $layout = 'layouts.master';

	public function get_ingreso() {
        return $this->layout->content = View::make('home/ingreso');
    }
    public function get_home() {
        return $this->layout->content = View::make('home/hello');
    }

}
