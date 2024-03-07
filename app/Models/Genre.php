<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    // Nom de la table associée au modèle
    protected $table = 'genre';

    // Les attributs de la table qui sont attribuables massivement
    protected $fillable = ['libelle'];

    // Désactiver les timestamps par défaut (created_at et updated_at)
    public $timestamps = false;

    // Relations avec d'autres modèles
    public function films()
    {
        return $this->belongsToMany(Movie::class, 'genre_film', 'id_genre', 'id_film');
    }
}
