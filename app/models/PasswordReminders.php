<?php
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
 
Class PasswordReminders extends Eloquent {
 
    protected $table = 'password_reminders';
    
    public function Usuarios(){
        return $this->belongsTo('Usuarios');
    }
    
}
