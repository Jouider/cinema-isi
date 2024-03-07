<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShowTime extends Model
{
    // Nom de la table associée au modèle
    protected $table = 'seance';

    // Les attributs de la table qui sont attribuables massivement
    protected $fillable = ['date_seance', 'horaire', 'id_salle', 'id_film'];

    // Indique si les timestamps sont utilisés dans la table
    public $timestamps = false;

    // Relation avec la salle
    public function room()
    {
        return $this->belongsTo(Room::class, 'id_salle', 'id_salle');
    }

    // Relation avec le film
    public function film()
    {
        return $this->belongsTo(Movie::class, 'id_film', 'id_film');
    }
}
