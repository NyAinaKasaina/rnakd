<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Application;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

      $applications= DB::connection('mysql')->table('domaines')
                        ->join('types','domaines.id','=','types.domaine_id')
                        ->join('applications','types.id','=','applications.type_id')
                        ->select('applications.id','applications.nom','domaines.domaine','applications.date_de_creation',
                        'applications.description','applications.mail_PG')
                        ->get();
      $queryModification=DB::connection('mysql')->table('domaines')
                       ->join('types','domaines.id','=','types.domaine_id')
                       ->join('applications','types.id','=','applications.type_id')
                       ->join('modifications','applications.id','=','modifications.application_id')
                       ->select('applications.id','applications.nom','domaines.domaine',
                       'applications.date_de_creation','applications.description','applications.mail_PG'
                       ,'modifications.date_de_modification','modifications.version')
                       ->get();

        $personnels = DB::connection('pgsql')->select('select email,"Nom_prenoms" from personnel');
        $tableauApplications=null;
        $tableaux = null;
        $tabId=null;
        $k=0;
        $l=0;
        $m=0;
        for ($i=0;$i<count($applications);$i++){
          $tableau = null;
          for ($j=0; $j <count($personnels) ; $j++) {
            if ( $applications[$i]->mail_PG == $personnels[$j]->email ) {

                $tableau = array(
                  'id'                    => $applications[$i]->id ,
                  'nom'                   => $applications[$i]->nom,
                  'domaine'               => $applications[$i]->domaine,
                  'description'           => $applications[$i]->description,
                  'date_de_modification'  => $applications[$i]->date_de_creation,
                  'version'               => '1.0.0',
                  'nomGarant'             => $personnels[$j]->Nom_prenoms,
                );
                for($l=0;$l<count($queryModification);$l++) {
                  $tabId[$l] = $queryModification[$l]->id;
                }
                if ($m < count($tabId)) {
                  if($applications[$i]->id == $tabId[$m]) {
                    $tableau ['date_de_modification']  = $queryModification[$m]->date_de_modification;
                    $tableau ['version']               = $queryModification[$m]->version;
                    $m++;
                  }
                }
            }
            $tableaux[$i] = $tableau;
          }
         if ($tableaux[$i] != null )
         {
           $tableauApplications[$k++] = $tableau;
        }
      }
        return view('application.lister',compact('tableauApplications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('application.ajouter');
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
            'nom'               =>  'required',
            'description'       =>  'required',
            'details'           =>  'required',
            'date_de_creation'  =>  'required',
            'thumbnail'         =>  'required',
            'mail_PG'           =>  'required',
            'type_id'           =>  'required'
        ]);

        Application::create($request->all());
        return redirect()->route('application.lister')
          ->with('success','Ajout de l \'application avec succès ! ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $application=Application::find($id);
        return view('application.modifier',compact('application'));
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
          'nom'               =>  'required',
          'description'       =>  'required',
          'details'           =>  'required',
          'date_de_creation'  =>  'required',
          'thumbnail'         =>  'required',
          'mail_PG'           =>  'required',
          'type_id'           =>  'required'
      ]);
      Application::find($id)->update($request->all());
      return redirect()->route('application.index')
        ->with('success','Modification de l \'application avec succès ! ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Application::find($id)->delete();
        return redirect()->route('application.index')
          ->with('success','Suppression de l \'application avec succès ! ');
    }
}

/**
 *
 */
