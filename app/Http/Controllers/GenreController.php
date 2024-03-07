<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;

class GenreController extends Controller
{
    // Méthode pour afficher la liste des genres
    public function index()
    {
        $genres = Genre::all();
        return view('genres.index', compact('genres'));
    }

    // Méthode pour afficher le formulaire de création d'un nouveau genre
    public function create()
    {
        return view('genres.create');
    }

    // Méthode pour enregistrer un nouveau genre dans la base de données
    public function store(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
            'libelle' => 'required|unique:genres',
        ]);

        // Création d'un nouveau genre dans la base de données
        $genre = new Genre();
        $genre->libelle = $request->libelle;
        $genre->save();

        return redirect()->route('genres.index')->with('success', 'Genre ajouté avec succès.');
    }

    // Méthode pour afficher les détails d'un genre
    public function show($id)
    {
        $genre = Genre::findOrFail($id);
        return view('genres.show', compact('genre'));
    }

    // Méthode pour afficher le formulaire de modification d'un genre
    public function edit($id)
    {
        $genre = Genre::findOrFail($id);
        return view('genres.edit', compact('genre'));
    }

    // Méthode pour mettre à jour un genre dans la base de données
    public function update(Request $request, $id)
    {
        // Validation des données du formulaire
        $request->validate([
            'libelle' => 'required|unique:genres,libelle,' . $id,
        ]);

        // Recherche du genre à mettre à jour
        $genre = Genre::findOrFail($id);
        $genre->libelle = $request->libelle;
        $genre->save();

        return redirect()->route('genres.index')->with('success', 'Genre mis à jour avec succès.');
    }

    // Méthode pour supprimer un genre de la base de données
    public function destroy($id)
    {
        $genre = Genre::findOrFail($id);
        $genre->delete();
        return redirect()->route('genres.index')->with('success', 'Genre supprimé avec succès.');
    }
}
