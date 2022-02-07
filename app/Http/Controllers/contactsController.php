<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class contactsController extends Controller
{
    public function index()
    {
        return view('contacts',[
            'contacts' => User::all()
        ]);
    }
}
