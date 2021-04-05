<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\item;
use Cookie;

class NewsController extends Controller
{
    public function __invoke() {
        if(Cookie::get('value')) {
            $news = Item::orderBy('date','desc')
            ->where('title','LIKE','%'.Cookie::get('value').'%')
            ->orWhere('description','LIKE','%'.Cookie::get('value').'%')
            ->paginate(5);
        }
        else {
            $news = Item::orderBy('date','desc')->paginate(5);     
        }

        return view("news",compact("news"));

    }
    
    public function search(Request $request) {
        $type = "search";

        return redirect('/news')->cookie('value',$request->get('search'),.02);
    }

    public function order($identificador){

        $news = '';
        if($identificador == 'titulo'){
            $news = Item::orderBy('title','asc')->paginate(5);

        }else if($identificador == 'descripcion'){
            $news = Item::orderBy('description','asc')->paginate(5);

        }else if($identificador == 'fecha'){
            $news = Item::orderBy('date','desc')->paginate(5);

        }


        return view("news",compact("news"));
     
    }
}
