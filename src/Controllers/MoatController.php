<?php

namespace CoreBlue\Moat\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MoatController extends Controller
{
    public function show()
    {
        return view('Moat::show');
    }
}
