<?php

namespace App\Jobs;

use App\Mail\UserMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class SendMailToUser implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            // Send email to active users
            $activeUsers = User::where('is_active', true)->get();

            foreach ($activeUsers as $user) {
                // Send email
                Mail::to($user->email)->send(new UserMail());
            }
        } catch (\Exception $e) {

            // Allow only 3 exceptions, then fail the job
            if ($this->attempts() > 3) {
                throw $e;
            }
        }
    }
}
