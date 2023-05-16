<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Mail;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test-mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send test mail';

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
     * @return mixed
     */
    public function handle()
    {
        Mail::to($this->details['email'])->send(new SendEmailWelcome($this->details['name']));

        //  Mail::to('This is a test email', function ($message) {
        //     $message->to('nirav@example.com');
        //     $message->subject('Test Email');
        // });

        dispatch(new \App\Jobs\SendWelcomeEmailJob());
        
        \Log::info("Test is working.");
    }
    
}
