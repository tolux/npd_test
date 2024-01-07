<?php

namespace App\Listeners;

use App\Events\SendAdminMail;
use App\Mail\AdminMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class NotifyAdmin
{
    /**
     * Create the event listener.
     */
    public const EMAIL_ADDRESS = 'tech@nextpayday.co';
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(SendAdminMail $event): void
    {

        Mail::to($this::EMAIL_ADDRESS)->send(new AdminMail($event->errorMessage));
        //
    }
}
