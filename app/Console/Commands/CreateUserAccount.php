<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Requests\UserCreateRequest;

use App\Services\UserService;

class CreateUserAccount extends Command
{
    protected $userService;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create {email} {password}';

    /**
     * Create new uer.
     *
     * @var string
     */
    protected $description = 'Create new user';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(UserService $userService)
    {
        parent::__construct();
        $this->userService = $userService;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $request = new UserCreateRequest();
        $request->replace([
            'email' =>  $this->argument('email'),
            'password' =>  $this->argument('password'),
            ]);
        
        $this->userService->create($request);

        $this->info('user created');
    }
}
