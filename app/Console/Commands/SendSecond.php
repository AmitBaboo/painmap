<?php

namespace App\Console\Commands;

use App\Http\Controllers\back\EmailSubscriptionController;
use Illuminate\Console\Command;

class SendSecond extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:second-email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send 5 days after symptom checker.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $email = new EmailSubscriptionController();
        $this->info($email->sendFollowUpEmails(5));
    }
}
