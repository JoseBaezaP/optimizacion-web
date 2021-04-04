<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\item;

use Cookie;

class NewsController extends Controller
{
    public function index(String $type) {
        if($type=="data") {
            $news = Item::orderBy('date','desc')->paginate(5);
            return view("news",compact("news"));
        }
        else {
            $news = Item::orderBy('date','desc')
            ->where('title','LIKE','%'.Cookie::get('value').'%')
            ->orWhere('description','LIKE','%'.Cookie::get('value').'%')
            ->paginate(5);
         
            return view("news",compact("news"));
        }
    }
    
    public function search(Request $request) {
        $type = "search";

        return redirect(route('news..index',$type))->cookie('value',$request->get('search'),10);
    }
}
