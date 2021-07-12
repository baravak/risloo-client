<?php

namespace App\Http\Controllers\Dashboard;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index(Request $request)
    {
        $tags = Tag::apiIndex($request->all());
        if($request->header('data-xhr-base')){
            return $tags->map(function($tag){
                return [
                    'id' => $tag->id,
                    'title' => $tag->title
                ];
            });
        }
        return $tags;
    }
}
