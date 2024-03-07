<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShowTime;

class ShowTimeController extends Controller
{
    // Méthode pour afficher la liste des horaires des projections
    public function index()
    {
        $showTimes = ShowTime::all();
        return view('show_times.index', compact('showTimes'));
    }

    // Méthode pour afficher le formulaire de création d'un nouvel horaire de projection
    public function create()
    {
        return view('show_times.create');
    }

    // Méthode pour enregistrer un nouvel horaire de projection dans la base de données
    public function store(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
            'date_seance' => 'required|date',
            'horaire' => 'required',
            'id_salle' => 'required|exists:salles,id',
            'id_film' => 'required|exists:films,id',
            // Ajoutez d'autres règles de validation au besoin
        ]);

        // Création d'un nouvel horaire de projection dans la base de données
        $showTime = new ShowTime();
        $showTime->date_seance = $request->date_seance;
        $showTime->horaire = $request->horaire;
        $showTime->id_salle = $request->id_salle;
        $showTime->id_film = $request->id_film;
        $showTime->save();

        return redirect()->route('show_times.index')->with('success', 'Horaire de projection ajouté avec succès.');
    }

    // Méthode pour afficher les détails d'un horaire de projection
    public function show($id)
    {
        $showTime = ShowTime::findOrFail($id);
        return view('show_times.show', compact('showTime'));
    }

    // Méthode pour afficher le formulaire de modification d'un horaire de projection
    public function edit($id)
    {
        $showTime = ShowTime::findOrFail($id);
        return view('show_times.edit', compact('showTime'));
    }

    // Méthode pour mettre à jour un horaire de projection dans la base de données
    public function update(Request $request, $id)
    {
        // Validation des données du formulaire
        $request->validate
        ([
            'date_seance' => 'required|date',
            'horaire' => 'required',
            'id_salle' => 'required|exists:salles,id',
            'id_film' => 'required|exists:films,id',
            // Ajoutez d'autres règles de validation au besoin
            ]);
                // Recherche de l'horaire de projection à mettre à jour
    $showTime = ShowTime::findOrFail($id);
    $showTime->date_seance = $request->date_seance;
    $showTime->horaire = $request->horaire;
    $showTime->id_salle = $request->id_salle;
    $showTime->id_film = $request->id_film;
    $showTime->save();

    return redirect()->route('show_times.index')->with('success', 'Horaire de projection mis à jour avec succès.');
}

// Méthode pour supprimer un horaire de projection de la base de données
public function destroy($id)
{
    $showTime = ShowTime::findOrFail($id);
    $showTime->delete();
    return redirect()->route('show_times.index')->with('success', 'Horaire de projection supprimé avec succès.');
}
}