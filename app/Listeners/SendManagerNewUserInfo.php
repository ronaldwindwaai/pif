<?php

namespace App\Listeners;

use App\Events\NewUserCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Notifications\NewUserNotification;

class SendManagerNewUserInfo
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NewUserCreated  $event
     * @return void
     */
    public function handle(NewUserCreated $event)
    {
        $admins = User::whereHas('roles', function ($query) {
            $query->where('name', 'super-admin');
        })->get()
        ->each(function ($admin) use ($event) {
             $admin->notify(new NewUserNotification($event->user));
        });
    }
}
