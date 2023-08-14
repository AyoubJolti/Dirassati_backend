<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class niveau extends Model
{
    use HasFactory;
    public function Formation(){
        return $this->belongsTo(Formation::class);
    }
    public static function addNiveau($des,$formation_id,$nom_groupe){
        $niveaux = new niveau();
        $niveaux->designation_niveau=$des;
        $niveaux->formation_id =$formation_id;

        $niveaux->save();
        groupe::addGroupe($nom_groupe,$niveaux->id);

    }
}
