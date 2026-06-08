<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Registration;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->isAdmin()) {
            $totalEvents = Event::count();
            $totalRegistrations = Registration::count();
            $totalUsers = User::where('role', 'user')->count();
            $events = Event::withCount('registrations')->orderBy('date', 'asc')->get();

            return view('dashboard', compact(
                'totalEvents',
                'totalRegistrations',
                'totalUsers',
                'events'
            ));
        }

        $registrations = $user->registrations()->with('event')->orderBy('created_at', 'desc')->get();

        return view('dashboard', compact('registrations'));
    }
}