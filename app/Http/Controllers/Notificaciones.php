<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class Notificaciones extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $user = User::find(1);
        $user->unreadNotifications->markAsRead();
    }
}
