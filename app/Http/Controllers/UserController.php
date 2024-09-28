<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;


class UserController extends Controller
{
    public function create(){
        return view('create_user', [
            'kelas' => Kelas::all(),
        ]);
    }
}
