<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treballador extends Model
{
    use HasFactory;
    protected $primaryKey = 'tid';
    protected $fillable = ["nom", "cognoms", "nif", "data_naixement", "sexe", "adressa", "tlf_fixe", "tlf_mobil",
    "email", "fotografia", "treball_distancia", "tipus_contracte", "data_contractacio", "categoria", "nom_feina",
    "sou"];
}
