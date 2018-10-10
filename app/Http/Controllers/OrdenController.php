<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Venue;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrdenController extends Controller
{
    public function pagar(Request $request){
        $user=User::find(Auth::user()->id);

        return view('pagar',['user'=>$user]);
    }
}
