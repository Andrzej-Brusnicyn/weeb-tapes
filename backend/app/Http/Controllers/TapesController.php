<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tape;

class TapesController extends Controller
{
    public function index()
    {
        $tapes = Tape::all();
        return view('index', ['tapes' => $tapes]);
    }
}
