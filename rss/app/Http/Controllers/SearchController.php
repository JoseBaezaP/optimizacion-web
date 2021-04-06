<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\item;


class SearchController extends Controller
{
    public function index($variable) {
        $news = Item::orderBy('date','desc')
        ->where('title','LIKE','%'.$variable.'%')
        ->orWhere('description','LIKE','%'.$variable.'%')
        ->paginate(5);
        return view("news",compact("news","variable"));
    }

    public function show($variable,$type) {
        if($type == 'title'){
            $news = Item::orderBy($type,'asc')
            ->where('title','LIKE','%'.$variable.'%')
            ->orWhere('description','LIKE','%'.$variable.'%')
            ->paginate(5);

        }else if($type == 'description'){
            $news = Item::orderBy($type,'asc')
            ->where('title','LIKE','%'.$variable.'%')
            ->orWhere('description','LIKE','%'.$variable.'%')
            ->paginate(5);

        }else if($type == 'date'){
            $news = Item::orderBy($type,'desc')
            ->where('title','LIKE','%'.$variable.'%')
            ->orWhere('description','LIKE','%'.$variable.'%')
            ->paginate(5);
        }

        return view("news",compact("news","variable"));
    }

    public function store(Request $request) {

        return redirect(route('news.search.index',$request->get('search')));
    }
    
}
