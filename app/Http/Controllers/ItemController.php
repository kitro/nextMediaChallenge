<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ItemCreateRequest;

use Validator;

use App\Services\ItemService;

class ItemController extends Controller
{

    protected $itemService;

    public function __construct(ItemService $itemService) {
        $this->itemService = $itemService;
    }

    // Save item
    public function store(ItemCreateRequest $request) {        
        return $this->itemService->create($request);
    }

    // List items
    public function index(Request $request) {
        return $this->itemService->allWithUser();
    }

}
