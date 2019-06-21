<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use App\User;

class UpdateUserPassword extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:updatepassword {email} {password} ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update password for users from CLI';

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
        $user = User::where('email', $this->argument('email'))->first();
        $user->name = "";
        $user->email = $this->argument('email');
        $user->password = Hash::make($this->argument('password'));
        $user->save();
        $this->info('updated password successfully');

    }
}
