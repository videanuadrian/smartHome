<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    /**
     * Show the profile for the given user.
     *  
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function show()
    {
        $user = Auth::user()->name;
        $id = Auth::id();

        echo $id;
        return $user;
    }
}
