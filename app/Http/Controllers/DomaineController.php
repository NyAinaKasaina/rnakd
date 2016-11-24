<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Domaine;

class DomaineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $domaines=Domaine::orderBy('id','ASC')->paginate($request->cle);
        return view('domaine.lister',compact('domaines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('domaine.ajouter');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,['domaine' => 'required' ]);
        Domaine::create($request->all());
        return redirect()->route('domaine.index')
          ->with('success','Ajout du domaine avec succès ! ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $domaine=Domaine::find($id);
        return view('domaine.modifier',compact('domaine'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
      $this->validate($request,[ 'domaine' =>  'required']);
      Domaine::find($id)->update($request->all());
      return redirect()->route('domaine.index')
        ->with('success','Modification du domaine avec succès ! ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Domaine::find($id)->delete();
        return redirect()->route('domaine.index')
          ->with('success','Suppression du domaine avec succès ! ');
    }
}
