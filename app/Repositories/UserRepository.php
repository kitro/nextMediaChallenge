<?php

namespace App\Repositories;

use App\User;

class UserRepository {

    protected $user;

    public function __construct(User $user) {
        $this->user = $user;
    }

    public function create($attributes) {
        return $this->user->create($attributes);
    }

    public function update($id, $attributes) {
        return $this->user->find($id)->update($attributes);
    }

    public function findById($id) {
        return $this->user->find($id);
    }

    public function findByEmail($email) {
        return $this->user->whereEmail($email)->first();
    }
    
}