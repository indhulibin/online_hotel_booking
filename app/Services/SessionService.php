<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SessionService
{
    /**
     * Sign out the user from all devices.
     *
     * @param int $userId
     * @return void
     */
    public function signOutFromAllDevices($userId)
    {
        // Get all sessions for the user
        $sessions = DB::table('sessions')->where('user_id', $userId)->get();

        // Delete each session
        foreach ($sessions as $session) {
            DB::table('sessions')->where('id', $session->id)->delete();
        }

        // Optional: Log out the current session
        Auth::logout();
        Session::flush();
    }
}
