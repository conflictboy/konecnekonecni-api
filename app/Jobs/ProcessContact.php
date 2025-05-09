<?php

namespace App\Jobs;

use App\Mail\ContactForm;
use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class ProcessContact implements ShouldQueue
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
        $contact = Contact::create($this->inputs);

        if (env('MAIL_RECIPIENT')) {
            Mail::to(explode(',', env('MAIL_RECIPIENT')))
                ->send(new ContactForm($contact));
        }
    }
}
