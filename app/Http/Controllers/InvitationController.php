<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\Invitation;
use App\Models\User;
use Illuminate\Http\Request;

class InvitationController extends Controller
{
    public function index()
    {
        
        return view('invitations.index');
    }

    public function create()
    {
        $events = Events::all();
        $users = User::all();

    return view('invitations.create', compact('events', 'users'));
    }
    
}
