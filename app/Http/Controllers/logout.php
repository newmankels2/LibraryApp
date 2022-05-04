<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class logout extends Controller
{
    public function logout(Request $req){
      if ($req->session()->has('user')) {
        $req->session()->flush();
        return redirect(url('/'));
      }
      return redirect(url('/'));
    }
}
