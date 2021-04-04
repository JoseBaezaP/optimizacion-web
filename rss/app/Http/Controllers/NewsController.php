<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\item;

class NewsController extends Controller
{
    public function __invoke() {
        $news = Item::paginate(5);

        return view("news",compact("news"));
    }
}
