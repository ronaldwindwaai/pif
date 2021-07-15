<?php

namespace App\Listeners;

use App\Events\UserAccountDeleted;
use App\Models\User;
use App\Notifications\DeletedUserAccountNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class SendDeletedUserAccountNotification
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
     * @param  UserAccountDeleted  $event
     * @return void
     */
    public function handle(UserAccountDeleted $event)
    {
        $admins = User::whereHas('roles', function ($query) {
            $query->where('name', 'super-admin');
        })->get()
            ->each(function ($admin) use ($event) {
                $admin->notify(new DeletedUserAccountNotification($event->user, $admin));
                Log::debug('User (' . $event->user->name . ') was deleted, email was sent too :' . $admin->name);
            });
    }
}
