<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;

class CreateUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create users easily';

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
     	echo "Creating user...\n";
     	$user = new Contact();
     	$user->name = "testcron";
      	$user->email = "testtest@testtest.be";
     	$user->save();
    	echo "User created\n";
    }
}
