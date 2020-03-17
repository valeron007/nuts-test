<?php

namespace App\Jobs;

use App\Mail\ProposalMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class MailPodcast implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $podcast;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($podcast)
    {
        //
        $this->podcast = $podcast;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        Mail::to('valeronchik0702@gmail.com', 'to web')->send(new ProposalMail($this->podcast));
    }
}
