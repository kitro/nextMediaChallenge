<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Requests\UserCreateRequest;

use App\Services\UserService;

class UpdateUserPassword extends Command
{

    protected $userService;

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
    public function __construct(UserService $userService) {
        parent::__construct();
        $this->userService = $userService;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() {
        $user = $this->userService->findUserByEmail($this->argument('email'));
        $this->userService->updatePassword($user->id, $this->argument('password'));
        $this->info('updated password successfully');
    }
}
