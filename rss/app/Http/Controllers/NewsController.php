<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\item;
use App\Models\xml;
use Carbon\Carbon;

class NewsController extends Controller
{
    public function __invoke() {
        $news = Item::orderBy('date','desc')->paginate(5);     
       return view("news",compact("news"));
    }
    
    public function search(Request $request) {
        $type = "search";
        return redirect('/news');
    }

    public function order($identificador){
        if($identificador == "date") {
            $order = 'desc';
        }
        else {
            $order = 'asc';
        }
        $news = Item::orderBy($identificador,$order)->paginate(5);
        return view("news",compact("news"));
    }

    public function refresh(){
        try {
            $newItem = FALSE;
            foreach (Xml::lazy() as $xmls) {        
                $carga_xml = simplexml_load_file($xmls->link);
                foreach($carga_xml->channel->item as $items) {
                    try {
                        $carbon_date = new Carbon($items->pubDate);
                        $news = Item::create([
                            'title'=>$items->title,
                            'description'=>$items->description,
                            'link'=>$items->link,
                            'date' => $carbon_date
                        ]);
                        $news->save();
                        $newItem = TRUE;
                    }
                   catch (\Exception $e) {}
                }
            }
            if ($newItem) {
                return redirect('/news')->with('success', 'Se agregaron nuevas noticias.');
            }
            else {
                return redirect('/news')->with('failure', 'No se encontraron nuevas noticias.');
            }
        }
        catch(\Exception $e) {
            return redirect('/news')->with('failure', 'Disculpe, a ocurrido un error, intentelo más tarde.');
        }

    }
}
