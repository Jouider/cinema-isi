<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    // Nom de la table associée au modèle
    protected $table = 'film';

    // Les attributs de la table qui sont attribuables massivement
    protected $fillable = ['titre', 'duree', 'date_sortie', 'description', 'min_age', 'image'];

    // Relations avec d'autres modèles
    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'genre_film', 'id_film', 'id_genre');
    }
}
