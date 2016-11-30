<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ModificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $modifications=Modification::orderBy('id','ASC')->paginate($request->cle);
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
        'degre'                => 'required' ,
        'date_de_modification' => 'required' ,
        'motif'                => 'required' ,
        'idDeveloppeur_PG'     => 'required' ,
        'application_id'       => 'required'
      ]);

      Modification::create($request->all());
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
      $modification=Modification::find($id);
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
      $modifications=Modification::find($id);
      return view('modification.modifier',compact('modifications'));
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
        'degre'                => 'required' ,
        'date_de_modification' => 'required' ,
        'motif'                => 'required' ,
        'idDeveloppeur_PG'     => 'required' ,
        'application_id'       => 'required'
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
