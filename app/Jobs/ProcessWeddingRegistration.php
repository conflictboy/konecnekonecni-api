<?php

namespace App\Jobs;

use App\Mail\WeddingRegistrationForm;
use App\Models\WeddingRegistration;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class ProcessWeddingRegistration implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public array $inputs)
    {
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $weddingRegistration = WeddingRegistration::create($this->inputs);

        if (env('MAIL_RECIPIENT')) {
            Mail::to(env('MAIL_RECIPIENT'))->send(new WeddingRegistrationForm($weddingRegistration));
        }
    }
}
