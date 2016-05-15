<?php

namespace App;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Twilio;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'github_id', 'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function pulse($deal){

    }
    public function send($messageName, $userInput = null)
    {
        $message = Message::where("command", "=", $messageName)->first();
        if(!empty($message)){
            Twilio::message($this->phone, $message->content);
            $log = new History();
            $log->user_id = $this->id;
            $log->message_id = $message->id;
            $log->user_input = $userInput;
            $log->save();
        }else{
            return false;
        }
    }
    public static function capacity()
    {
        $capacity = 500;
        $beta_limit = 50;
        // TODO: update count to only count confirmed users
        // $count = self::whereConfirmed('1')->count();
        $count = self::count();
        if($count == $beta_limit){
            return 100;
        }
        return round(($capacity - $beta_limit - $count) / $capacity * 100);
    }


}
