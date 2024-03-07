<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    // Nom de la table associée au modèle
    protected $table = 'salle';

    // Les attributs de la table qui sont attribuables massivement
    protected $fillable = ['libelle', 'capacite', 'disponibilite'];

    // Indique si les timestamps sont utilisés dans la table
    public $timestamps = false;
}
