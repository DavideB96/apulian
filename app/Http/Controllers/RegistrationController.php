<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Registration;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function store(Event $event)
    {
        // Controlla che l'utente non sia admin
        if (auth()->user()->isAdmin()) {
            return back()->with('error', 'Gli admin non possono iscriversi agli eventi.');
        }

        // Controlla che ci siano ancora posti disponibili
        if ($event->registrations()->count() >= $event->max_participants) {
            return back()->with('error', 'Spiacente, i posti per questo evento sono esauriti.');
        }

        // Controlla che l'utente non sia già iscritto
        if ($event->isUserRegistered(auth()->id())) {
            return back()->with('error', 'Sei già iscritto a questo evento.');
        }

        // Crea l'iscrizione
        Registration::create([
            'user_id' => auth()->id(),
            'event_id' => $event->id,
        ]);

        return back()->with('success', 'Iscrizione completata con successo!');
    }

    public function destroy(Event $event)
    {
        Registration::where('user_id', auth()->id())
            ->where('event_id', $event->id)
            ->delete();

        return back()->with('success', 'Iscrizione annullata con successo.');
    }
}