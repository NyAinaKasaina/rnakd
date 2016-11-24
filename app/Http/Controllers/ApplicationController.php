<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $applications=Application::orderBy('id','ASC')->paginate($request->cle);
        //return view('application.lister',compact('applications'));
    //     foreach ($applications as $application) {
    //       print_r ($application->id);
    //     }

      echo "<pre>";
        print_r();
      echo "</pre>";
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
            'mail_PG'       =>  'required',
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
class TableauApplication extends AnotherClass
{
  private $id ;
  private $nom ;
  private $domaine ;
  private $description ;
  private $dateModification ;
  private $version ;
  private $nomGarant ;

  function __construct()
  {

  }
  
  function getId() {
      return $this->id;
  }

  function getNom() {
      return $this->nom;
  }

  function getDomaine() {
      return $this->domaine;
  }

  function getDescription() {
      return $this->description;
  }

  function getDateModification() {
      return $this->dateModification;
  }

  function getVersion() {
      return $this->version;
  }

  function getNomGarant() {
      return $this->nomGarant;
  }

  function setId($id) {
      $this->id = $id;
  }

  function setNom($nom) {
      $this->nom = $nom;
  }

  function setDomaine($domaine) {
      $this->domaine = $domaine;
  }

  function setDescription($description) {
      $this->description = $description;
  }

  function setDateModification($dateModification) {
      $this->dateModification = $dateModification;
  }

  function setVersion($version) {
      $this->version = $version;
  }

  function setNomGarant($nomGarant) {
      $this->nomGarant = $nomGarant;
  }


}
