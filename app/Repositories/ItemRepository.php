<?php

namespace App\Repositories;

use App\Item;

class ItemRepository {

    protected $item;

    public function __construct(Item $item) {
        $this->item = $item;
    }

    public function create($attributes) {
        return $this->item->create($attributes);
    }

    public function update($id, $attributes) {
        return $this->item->find($id)->update($attributes);
    }

    public function getAllWithUser() {
        return $this->item->with('user')->orderBy('id', 'desc')->paginate();
    }

    public function getWithUser($id) {
        return $this->item->with('user')->findOrFail($id);
    }

}