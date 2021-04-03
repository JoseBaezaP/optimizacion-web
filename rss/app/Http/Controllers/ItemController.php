<?php

namespace App\Http\Controllers;

use App\Models\item;
use Illuminate\Http\Request;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ItemController extends Controller
{
    public function __invoke() {
        $carga_xml = simplexml_load_file("https://www.reforma.com/rss/ciencia.xml");
        foreach($carga_xml->channel->item as $items) {
            $news = new Item();
            $news->title=$items->title;
            $news->author=$items->author;
            $news->description=$items->description;
            $news->link=$items->link;
            $news->save();
        }
        die();
    }
}
