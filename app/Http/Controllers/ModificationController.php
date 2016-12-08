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
    public function create(Request $request)
    {
        $data['application_id'] = $request->application_id;
        return view('modification.ajouter', $data);
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
        'application_id'         => 'required' ,
      ]);

      $modification=new Modification();
      $modification->degre                = $request->degre;
      $modification->date_de_modification = $request->date_de_modification;
      $modification->motif                = $request->motif;
      $modification->mailDeveloppeur_PG   = $request->mailDeveloppeur_PG;
      $modification->application_id       = $request->application_id;
      $modification->version              = null;

      $getVersion=DB::connection('mysql')->table('modifications')
      ->select('version')
      ->where('application_id','=',4)->get();

      if(count($getVersion)==0)
        {
          if($request->degre=='majeur')    $modification->version = '2.0.0';
          if($request->degre=='mineur')    $modification->version = '1.1.0';
          if($request->degre=='stabilite') $modification->version = '1.0.1';
        }
      else {
        $getLastVersion=DB::connection('mysql')->table('modifications')
                      ->orderBy('date_de_modification','DESC')
                      ->select('version')
                      ->limit(1)
                      ->where('application_id','=',$request->application_id)
                      ->get();
        $chaineVersion=explode('.',$getLastVersion[0]->version);
          if($request->degre=='majeur'){
            $maj=$chaineVersion[0]+1;
            $modification->version = $maj.'.'.$chaineVersion[1].'.'.$chaineVersion[2];
          }
          if($request->degre=='mineur'){
            $min=$chaineVersion[1]+1;
            $modification->version = $chaineVersion[0].'.'.$min.'.'.$chaineVersion[2];
          }
          if($request->degre=='stabilite'){
            $sta=$chaineVersion[2]+1;
            $modification->version = $chaineVersion[0].'.'.$chaineVersion[1].'.'.$sta;
          }
      }
      $modification->save();
      return redirect()->route('modification.index')
        ->with('success','Ajout de la modification avec succès ! ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
      $queryModification=DB::connection('mysql')->table('modifications')
      ->orderBy('date_de_modification','DESC')
      ->select('id','mailDeveloppeur_PG','date_de_modification','version','motif')
      ->where('application_id','=',$id)
      ->get();

      $queryNomDev= null;
      if( count($queryModification) == 0 )
      echo '<tr><td colspan="4"><center>Aucun résultat</center></td></tr>';
      else {
        for ($i=0; $i < count($queryModification) ; $i++) {
          $queryNomDev=DB::connection('pgsql')->table('personnel')->select("Nom_prenoms")
          ->where('email','=',$queryModification[$i]->mailDeveloppeur_PG)->get();
          $modificationTable = array(
            'date_de_modification' => $queryModification[$i]->date_de_modification,
            'nomDev'               => $queryNomDev,
            'version'              => $queryModification[$i]->version,
            'motif'                => $queryModification[$i]->motif,
          );
          $modification[$i]=$modificationTable;
        }
      }
      if($request->session()->has('applinkadmin')) {
        $data = ['grant' => ['input' => 'required', 'button' => 'enabled'],'idapp' => $id];
        return view('modification.show',compact('modification'),$data);
      }
      $data = ['idapp' => $id];
      return view('modification.show',compact('modification'),$data);
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
