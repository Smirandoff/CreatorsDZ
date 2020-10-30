<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(User $user){
        return view('profile.index')->with(compact('user'));
    }
    public function edit(User $user){
        return view('profile.index')->with(compact('user'));
    }
}
