<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use App\Models\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function index(User $user, Thread $thread)
    {

        return view('profiles.index', compact('thread', 'user'));
    }
}
