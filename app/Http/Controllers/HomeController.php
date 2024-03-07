<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;
use App\Models\ShowTime;
use Illuminate\Support\Carbon;
class HomeController extends Controller
{
    public function index(){
        $movies=Movie::all();
        $genre=Genre::all();
        return view('welcome',compact('movies','genre'));
    }

    
    public function horaires($date = null){
        if ($date === null) {
            $date = Carbon::now()->toDateString();
        }
    
        // Récupérez les horaires des films pour la date spécifiée
        $showtimes = ShowTime::with('film')
            ->whereDate('date_seance', $date)
            ->get();
    
        return view('horaires', compact('showtimes', 'date'));
    }
    
}
