<?php

namespace App\Http\Controllers;

use App\Models\item;
use Illuminate\Http\Request;
use Orchestra\Parser\Xml\Facade as XmlParser;
use Carbon\Carbon;

class ItemController extends Controller
{
    public function formulario(Request $req){
        $carga_xml = simplexml_load_file($req->urlfeed);
        
        foreach($carga_xml->channel->item as $items) {
            $carbon_date = new Carbon($items->pubDate);
            $news = Item::create([
                'title'=>$items->title,
                'description'=>$items->description,
                'link'=>$items->link,
                'date' => $carbon_date
            ]);
            $news->save();
        } 
        return redirect('/news');
    }

    
}
