<?php
namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;

class Test extends Controller
{
    public function random()
    {
        $character="ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz";
        $randomtoken= str_shuffle($character);
        echo "$randomtoken";
    }
}
