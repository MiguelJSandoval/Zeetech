<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function save(Request $req)
    {
        $position = new Position($req->input());
        $position->saveOrFail();
        return redirect()->route('positions');
    }
}
