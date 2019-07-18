<?php 
namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\ItemCreateRequest;

use App\Repositories\ItemRepository;
use App\Services\UploadImageService;

class ItemService {

    protected $itemRepository, $uploadImageService;
    

    public function __construct(ItemRepository $itemRepository, UploadImageService $uploadImageService) {
        $this->itemRepository = $itemRepository;
        $this->uploadImageService = $uploadImageService;
    }
    
    public function create(ItemCreateRequest $request) {
        $data['ok'] = true;
        
        // upload image
        $image = $this->uploadImageService->upload($request->file('item_image'));

        // save the item
        $item = $this->itemRepository->create([
            'title' => $request->input('item_title'), 
            'description' => $request->input('item_description'),
            'image' => $image, 
            'user_id' => Auth::user()->id
        ]);

        $data['item'] = $this->itemRepository->getWithUser($item->id);

        return $data;
    }

    public function allWithUser() {
        return $this->itemRepository->getAllWithUser();
    }

    public function update($id, Request $request) {
        return $this->itemRepository->update($id, $request->all());
    }

}