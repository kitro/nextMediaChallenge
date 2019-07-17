<?php 
namespace App\Services;

use App\Repositories\ItemRepository;

class ItemService {

    protected $itemRepository;

    public function __construct(ItemRepository $itemRepository) {
        $this->itemRepository = $itemRepository;
    }

    public function allWithUser() {
        return $this->itemRepository->getAllWithUser();
    }

    public function update($id, Request $request) {
        return $this->itemRepository->update($id, $request->all());
    }

}