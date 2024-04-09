<?php

namespace App\Console\Commands;

use App\Http\Controllers\back\EmailSubscriptionController;
use Illuminate\Console\Command;

class SendFirst extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:first-email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send first 2 days after symptom checker.';

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
        $this->info($email->sendFollowUpEmails(2));
    }
}
