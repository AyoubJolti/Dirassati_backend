<?php

namespace App\Http\Controllers;

use App\Models\Emploi;
use Illuminate\Http\Request;

class EmploiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emploi = Emploi::all();
        return response()->json($emploi);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $emploi = new Emploi();
        $emploi->Subject = $request->Subject;
        $emploi->StartTime = $request->StartTime;
        $emploi->EndTime = $request->EndTime;
        $emploi->cour_id = $request->cour_id;
        $emploi->save();
        return response()->json($emploi);

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Emploi  $emploi
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $emploi = Emploi::find($id);
        return response()->json($emploi);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Emploi  $emploi
     * @return \Illuminate\Http\Response
     */
    public function edit(Emploi $emploi)
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Emploi  $emploi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $emploi = Emploi::find($id);
        $emploi->Subject = $request->Subject;
        $emploi->StartTime = $request->StartTime;
        $emploi->EndTime = $request->EndTime;
        $emploi->cour_id = $request->cour_id;
        $emploi->save();
        return response()->json($emploi);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Emploi  $emploi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $emploi = Emploi::find($id);
        $emploi->delete();
        return response()->json($emploi);
    }
    public function getAllEmploiData(){
        $emploi = Emploi::join('cours','cours.id','cour_id')
        ->join('enseigants','enseigants.id','=','enseigant_id')
        ->join('users','users.id','enseigants.user_id')
        ->join('groupes','groupes.id','=','groupe_id')
        ->select('emplois.id as emplois_id','cours.id as cours_id','nom_cours', 'anne',
        'groupe_id','enseigant_id',
        'nom_groupe',
        'nom','prenom',
        'Module','Subject','StartTime','EndTime')
        ->get();
        return response()->json($emploi);

    }
    public function getEmploiData($id){
        $emploi = Emploi::join('cours','cours.id','cour_id')
        ->join('enseigants','enseigants.id','=','enseigant_id')
        ->join('users','users.id','enseigants.user_id')
        ->join('groupes','groupes.id','=','groupe_id')
        ->where('groupes.id','=',$id)
        ->select('emplois.id as emplois_id','cours.id as cours_id','nom_cours', 'anne',
        'groupe_id','enseigant_id',
        'nom_groupe',
        'nom','prenom',
        'Module','Subject','StartTime','EndTime')
        ->get();
        return response()->json($emploi);

    }
}
