<?php

namespace App\Jobs\EligibilityEmails;

use App\Mail\EligibilityEmails\EligibilityEmailFour;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class SendEligibilityEmailFour implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private string $referred_uuid;
    /**
     * Create a new job instance.
     */
    public function __construct($referred_uuid)
    {
        $this->referred_uuid = $referred_uuid;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $referred = DB::table('referreds')->where('uuid', $this->referred_uuid)->first();
        // If no referred exists then log this
        logger($referred->first_name. " email 4");
        // Send Mail to the user
        Mail::to($referred)->send(new EligibilityEmailFour());
    }
}
