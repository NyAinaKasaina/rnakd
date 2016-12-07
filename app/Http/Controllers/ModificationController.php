<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Modification;

class ModificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $modifications=Modification::orderBy('id','ASC')->get();
      return view('modification.lister',compact('modifications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modification.ajouter');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request,[
        'degre'                  => 'required' ,
        'date_de_modification'   => 'required' ,
        'motif'                  => 'required' ,
        'mailDeveloppeur_PG'     => 'required' ,
        'application_id'         => 'required'
      ]);
      $getVersion=DB::connection('mysql')->table('modifications')
                ->select('version')->get();
      $version=null;
      if($request->degre=='mineur')
      $modification=new Modification();
      $modification->degre                = $request->degre;
      $modification->date_de_modification = $request->date_de_modification;
      $modification->motif                = $request->motif;
      $modification->mailDeveloppeur_PG   = $request->mailDeveloppeur_PG;
      $modification->application_id       = $request->application_id;
      //$modification->version              = $request->
      print_r($getVersion);
      return redirect()->route('modification.index')
        ->with('success','Ajout de la modification avec succès ! ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $queryModification=DB::connection('mysql')->table('modifications')->select('id','mailDeveloppeur_PG','date_de_modification','version','motif')
      ->where('application_id','=',$id)->get();
      $queryNomDev=DB::connection('pgsql')->table('personnel')->select("Nom_prenoms")
      ->where('email','=',$queryModification[0]->mailDeveloppeur_PG)->get();
      $modification = array(
        'date_de_modification' => $queryModification[0]->date_de_modification,
        'nomDev'               => $queryNomDev[0]->Nom_prenoms,
        'version'              => $queryModification[0]->version,
        'motif'                => $queryModification[0]->motif,
      );
         if($queryNomDev == null || $queryModification == null )
           echo '<tr><td colspan="4"><center>Aucun résultat</center></td></tr>';
         else
           return view('modification.show',compact('modification'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $modification=Modification::find($id);
      return view('modification.modifier',compact('modification'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->validate($request,[
        'degre'                  => 'required' ,
        'date_de_modification'   => 'required' ,
        'motif'                  => 'required' ,
        'mailDeveloppeur_PG'     => 'required' ,
        'application_id'         => 'required'
      ]);

      Modification::find($id)->update($request->all());
      return redirect()->route('modification.index')
        ->with('success','Modification avec succès ! ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Modification::find($id)->delete();
      return redirect()->route('modification.index')
        ->with('success','Suppression de la modification avec succès ! ');
    }
}
