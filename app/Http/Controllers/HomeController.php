<?php

namespace App\Http\Controllers;

use App\Models\EvennementSportif;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $eventSprotifs = EvennementSportif::paginate();
        return view('home.index', [
            'title' => 'Evennements Sprotif',
            'description' => 'Liste des evennements sprotifs',
            'heading' => config('app.name'),
            'eventSportifs' => $eventSprotifs
        ]);
    }
}
