<?php

namespace App\Http\Controllers;

use App\Models\item;
use Illuminate\Http\Request;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ItemController extends Controller
{
    public function __invoke() {
        $carga_xml = simplexml_load_file("http://feeds.bbci.co.uk/news/world/rss.xml");
        foreach($carga_xml->channel->item as $items) {
            $news = Item::create([
                'title'=>$items->title,
                'author'=>$items->author,
                'description'=>$items->description,
                'link'=>$items->link
            ]);
            $news->save();
        } 
        return redirect('/new');
    }
}
