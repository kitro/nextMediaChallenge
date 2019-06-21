<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use File;
use Validator;
use App\Item;

class ItemController extends Controller
{


    // Save item
    public function store(Request $request) {
        $data['ok'] = true;
        
        $item = new Item();
        $item->title =  $request->input('item_title');
        $item->description =$request->input('item_description');
        $item->image = self::uploadImage($request->file('item_image'));
        $item->user_id = "1";
    
        $item->save();

        $data['item'] = Item::with('user')->findOrFail($item->id);
        
        return $data;
    }

    // List items
    public function index(Request $request) {
        return Item::with('user')->paginate();
    }

    // uplad image
    private function uploadImage($file) {
        $image_name = uniqid().'.'.$file->getClientOriginalExtension();
        Storage::disk('local')->put('images/'.$image_name, File::get($file->getRealPath()), 'public');
        return $image_name;
    }
}
