<?php

namespace App;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
class employee extends Model
{
       
       protected $table='employee';
       protected $fillable = [
              'firstname','lastname', 'email', 'password','phone'];
      


}