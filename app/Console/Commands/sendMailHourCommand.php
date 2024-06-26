<?php

namespace App\Console\Commands;

use App\Customer;
use App\Mail\sendMailHour;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class sendMailHourCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send-email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $customers = Customer::all();
        
        foreach ($customers as $customer) {
            Mail::to($customer->email)->send(new sendMailHour());
        }
    }
}
