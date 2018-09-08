<?php

namespace CoreBlue\Moat\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MoatController extends Controller
{
    public function show()
    {
        if(session('moat')) {
            return redirect('/');
        }

        return view('Moat::show');
    }

    public function login()
    {
        if(request('password') === env('MOAT_PASSWORD')) {
            session(['moat' => request('password')]);
            return redirect('/');
        }

        return redirect()->route('moat.show')->with([
            'error' => 'Access Denied: incorrect password'
        ]);
    }
}
