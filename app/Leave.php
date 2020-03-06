<?php

namespace App;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
class Leave extends Model
{
       
       protected $table='leavedetail';
       protected $fillable = [
        'leaveid','days'];
     
       public function name()
       {
        $this->belongsTo('App\employee', 'empid', 'empid');
       }

}