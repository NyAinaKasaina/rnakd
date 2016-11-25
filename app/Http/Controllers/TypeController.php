<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Type;
use App\Domaine;

class TypeController extends Controller
{
    /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
       $types=Type::orderBy('id','ASC')->paginate($request->cle);
       return view('type.lister',compact('types'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      $domaines=Domaine::orderBy('id','ASC')->paginate();
      return view('type.ajouter',compact('domaines'));
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
        'type'       => 'required' ,
        'domaine_id' => 'required'
        ]);

      Type::create($request->all());
      return redirect()->route('type.index')
        ->with('success','Ajout du type avec succès ! ');
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
      $type=Type::find($id);
      $domaines=Domaine::orderBy('id','ASC')->paginate();

      return view('type.modifier',compact('type','domaines'));
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
    $this->validate($request,[
       'type'       =>  'required' ,
       'domaine_id' =>  'required'
     ]);

    Type::find($id)->update($request->all());
    return redirect()->route('type.index')
      ->with('success','Modification du type avec succès ! ');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
      Type::find($id)->delete();
      return redirect()->route('type.index')
        ->with('success','Suppression du type avec succès ! ');
  }
}
