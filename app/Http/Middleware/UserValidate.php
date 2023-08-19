<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
class UserValidate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
         /* $userData = json_encode(Auth::user());
        echo $userData; */
       /*  dd(Auth::user());
        $id = Auth::user()->id;
        $data = DB::select("SELECT * FROM `users` WHERE id = '$id'limit 1");
        dd($data);
        echo $data[0]->id;die; */

/*
        //$awe =  ;
       // echo Auth::user();
        // $ecode =  json_decode(Auth::user(),true);
        // echo "<pre>";
        // print_r($ecode)->name;
        // // $decode = $ecode->role;
        // // echo $decode;*/
        return $next($request);

    }
}
