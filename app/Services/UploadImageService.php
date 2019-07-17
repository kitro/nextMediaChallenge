<?php 
namespace App\Services;

use App\Repositories\ItemRepository;
use Storage;
use File;

class UploadImageService {

    protected $itemRepository;

    public function __construct(ItemRepository $itemRepository) {
        $this->itemRepository = $itemRepository;
    }

    public function upload($file) {
        $image_name = uniqid().'.'.$file->getClientOriginalExtension();
        Storage::disk('local')->put('images/'.$image_name, File::get($file->getRealPath()), 'public');
        return $image_name;
    }

}