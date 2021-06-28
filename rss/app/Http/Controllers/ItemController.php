<?php

namespace App\Http\Controllers;

use App\Models\item;
use App\Models\xml;
use Illuminate\Http\Request;
use Orchestra\Parser\Xml\Facade as XmlParser;
use Carbon\Carbon;

class ItemController extends Controller
{
    public function __invoke() {
        return view('newFeedForm');
    }

    public function formulario(Request $request){
        try {
            $carga_xml = simplexml_load_file($request->urlfeed);
            $xml = Xml::create([
                'link'=>$request->urlfeed,
            ]);
            $xml->save();

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
            return back()->with('success', 'Sus noticas se han agregado correctamente.');
        }
        catch(\Exception $e) {
            return back()->with('failure', 'A ocurrido un error, pruebe con otro URL o intente más tarde.');
        }

    }    
}
