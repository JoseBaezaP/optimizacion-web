<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\item;


class SearchController extends Controller
{
    public function index($variable) {
        $news = Item::orderBy('date','desc')
        ->where('title','ILIKE','%'.$variable.'%')
        ->orWhere('description','ILIKE','%'.$variable.'%')
        ->paginate(5);
        return view("news",compact("news","variable"));
    }

    public function show($variable,$type) {
        if($type == "date") {
            $order = 'desc';
        }
        else {
            $order = 'asc';
        }
        $news = Item::orderBy($type, $order)
        ->where('title','ILIKE','%'.$variable.'%')
        ->orWhere('description','ILIKE','%'.$variable.'%')
        ->paginate(5);

        return view("news",compact("news","variable"));
    }

    public function store(Request $request) {

        return redirect(route('news.search.index',$request->get('search')));
    }
    
}
