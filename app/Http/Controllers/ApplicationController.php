<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\Application;
use Carbon;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {

      $request->domaine;
      $request->keyword;
      $request->type;
      $a=$request->keyword;
      $applications=null;

        $applications= DB::connection('mysql')->table('domaines')
                          ->orderBy('id','ASC')
                          ->join('types','domaines.id','=','types.domaine_id')
                          ->join('applications','types.id','=','applications.type_id')
                          ->select('applications.id','applications.nom','domaines.domaine','applications.date_de_creation',
                          'applications.description','applications.mail_PG')
                          ->where('domaines.id','like','%'.$request->domaine.'%')
                          ->where('applications.type_id','like','%'.$request->type.'%')
                          ->where(function($query) use ($a) {
                      $query->where('applications.id','like','%'.$a.'%')
                            ->orWhere('applications.nom','like','%'.$a.'%')
                            ->orWhere('applications.description','like','%'.$a.'%');
                          })
                          ->get();
        $queryModification=DB::connection('mysql')->table('domaines')
                         ->orderBy('id','ASC')
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
        if(sizeof($tableauApplications) < 1 )
          echo '<tr><td colspan="7"><center>Aucun résultat</center></td></tr>';
        else
        return view('application.lister',compact('tableauApplications'));
        // echo "<pre>";
        // print_r($tableauApplications);
        // echo "<pre>";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $personnels = DB::connection('pgsql')->select('select email,"Nom_prenoms" from personnel');
        return view('application.ajouter',compact('personnels'));
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
            'thumbnail'         =>  'required|image|mimes:jpeg,png,jpg,gif,svg',
            'mail_PG'           =>  'required',
            'type_id'           =>  'required'
        ]);

        $image=request()->file('thumbnail');
      	$extension=$image->guessClientExtension();
      	$mytime = Carbon\Carbon::now()->toDateTimeString();
      	$imageName=sha1($mytime).".".$extension;
      	$image->storeAs('images',$imageName);
      	echo $imageName;

        $application=new Application();
        $application->nom               = $request->nom;
        $application->description       = $request->description;
        $application->details           = $request->details;
        $application->date_de_creation  = $request->date_de_creation;
        $application->thumbnail         = $imageName;
        $application->mail_PG           = $request->mail_PG;
        $application->type_id           = $request->type_id;
        $application->save();

        return redirect()->route('application.index')
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
        $application=Application::find($id);
        return view('application.show',compact('application'));

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
