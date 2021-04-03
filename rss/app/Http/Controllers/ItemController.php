<?php

namespace App\Http\Controllers;

use App\Models\item;
use Illuminate\Http\Request;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ItemController extends Controller
{
    public function __invoke() {
        $carga_xml = simplexml_load_file("https://www.elperiodico.com/es/rss/tiempo/rss.xml");
        foreach($carga_xml->channel->item as $items) {
            $news = Item::create([
                'title'=>$items->title,
                'author'=>$items->author,
                'description'=>$items->description,
                'link'=>$items->link
            ]);
            $news->save();
        }
        echo "Info guardada";
        die();
    }
}
