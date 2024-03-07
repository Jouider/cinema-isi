<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class RoomController extends Controller
{
    // Méthode pour afficher la liste des salles
    public function index()
    {
        $rooms = Room::all();
        return view('rooms.index', compact('rooms'));
    }

    // Méthode pour afficher le formulaire de création d'une nouvelle salle
    public function create()
    {
        return view('rooms.create');
    }

    // Méthode pour enregistrer une nouvelle salle dans la base de données
    public function store(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
            'libelle' => 'required',
            'capacite' => 'required|integer',
            'disponibilite' => 'required',
            // Ajoutez d'autres règles de validation au besoin
        ]);

        // Création d'une nouvelle salle dans la base de données
        $room = new Room();
        $room->libelle = $request->libelle;
        $room->capacite = $request->capacite;
        $room->disponibilite = $request->disponibilite;
        $room->save();

        return redirect()->route('rooms.index')->with('success', 'Salle ajoutée avec succès.');
    }

    // Méthode pour afficher les détails d'une salle
    public function show($id)
    {
        $room = Room::findOrFail($id);
        return view('rooms.show', compact('room'));
    }

    // Méthode pour afficher le formulaire de modification d'une salle
    public function edit($id)
    {
        $room = Room::findOrFail($id);
        return view('rooms.edit', compact('room'));
    }

    // Méthode pour mettre à jour une salle dans la base de données
    public function update(Request $request, $id)
    {
        // Validation des données du formulaire
        $request->validate([
            'libelle' => 'required',
            'capacite' => 'required|integer',
            'disponibilite' => 'required',
            // Ajoutez d'autres règles de validation au besoin
        ]);

        // Recherche de la salle à mettre à jour
        $room = Room::findOrFail($id);
        $room->libelle = $request->libelle;
        $room->capacite = $request->capacite;
        $room->disponibilite = $request->disponibilite;
        $room->save();

        return redirect()->route('rooms.index')->with('success', 'Salle mise à jour avec succès.');
    }

    // Méthode pour supprimer une salle de la base de données
    public function destroy($id)
    {
        $room = Room::findOrFail($id);
        $room->delete();
        return redirect()->route('rooms.index')->with('success', 'Salle supprimée avec succès.');
    }
}
