<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class groupe extends Model
{
    use HasFactory;
    public static function addGroupe($nom_groupe,$niveaux_id){
        $Groupe = new groupe();
        $Groupe->nom_groupe =$nom_groupe;
        $Groupe->niveaux_id =$niveaux_id;
        $Groupe->save();
    }
}
