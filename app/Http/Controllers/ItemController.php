<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use App\Item;

use App\Services\ItemService;

class ItemController extends Controller
{

    protected $itemService;

    public function __construct(ItemService $itemService) {
        $this->itemService = $itemService;
    }

    // Save item
    public function store(Request $request) {        
        return $this->itemService->create($request);
    }

    // List items
    public function index(Request $request) {
        return $this->itemService->allWithUser();
    }
    
}
