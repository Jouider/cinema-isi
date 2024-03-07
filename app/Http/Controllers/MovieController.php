<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Genre;

class MovieController extends Controller
{
    // Méthode pour afficher la liste des films
    public function index()
    {
        $genres = Genre::all();
        $films = Movie::all();
        return view('dashboard.movies.index', compact('films','genres'));
    }

    // Méthode pour afficher le formulaire de création d'un nouveau film
    public function create()
    {
        $genres = Genre::all();
        return view('movies.create', compact('genres'));
    }

    // Méthode pour enregistrer un nouveau film dans la base de données
    public function store(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
            'titre' => 'required',
            'duree' => 'required',
            'date_sortie' => 'required',
            // Ajoutez d'autres règles de validation au besoin
        ]);

        // Création d'un nouveau film dans la base de données
        $movie = new Movie();
        $movie->titre = $request->titre;
        $movie->duree = $request->duree;
        $movie->date_sortie = $request->date_sortie;
        $movie->description = $request->description;
        $movie->min_age = $request->min_age;
        $movie->image = $request->image;
        $movie->save();

        // Enregistrement des genres associés au film
        if ($request->has('genres')) {
            $movie->genres()->sync($request->genres);
        }

        return redirect()->route('movies.index')->with('success', 'Film ajouté avec succès.');
    }

    // Méthode pour afficher les détails d'un film
    public function show($id)
    {
        $movie = Movie::find($id);
        return view('movies.show', compact('movie'));
    }

    // Méthode pour afficher le formulaire de modification d'un film
    public function edit($id)
    {
        $film = Movie::where('id_film', $id)->first();
        $genres = Genre::all();
        return view('dashboard.movies.edit', compact('film', 'genres'));
    }

    // Méthode pour mettre à jour un film dans la base de données
    public function update(Request $request, $id)
    {
        // Validation des données du formulaire
        $request->validate([
            'titre' => 'required',
            'duree' => 'required',
            'date_sortie' => 'required',
            // Ajoutez d'autres règles de validation au besoin
        ]);

        // Recherche du film à mettre à jour
        $movie = Movie::findOrFail($id);
        $movie->titre = $request->titre;
        $movie->duree = $request->duree;
        $movie->date_sortie = $request->date_sortie;
        $movie->description = $request->description;
        $movie->min_age = $request->min_age;
        $movie->image = $request->image;
        $movie->save();

        // Mise à jour des genres associés au film
        if ($request->has('genres')) {
            $movie->genres()->sync($request->genres);
        } else {
            $movie->genres()->detach();
        }

        return redirect()->route('movies.index')->with('success', 'Film mis à jour avec succès.');
    }

    // Méthode pour supprimer un film de la base de données
    public function destroy($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->delete();
        return redirect()->route('movies.index')->with('success', 'Film supprimé avec succès.');
    }
}
