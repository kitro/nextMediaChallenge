<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 100)->create()->each(function ($user) {
            factory(App\Item::class, 100)->create()->each(function ($item) {
                $user->items()->save($item);
            });
        });
    }
}
