<?php

namespace App\Http\Controllers\Main;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FormController extends Controller
{
    public function ajouterApplication() {
        return view('application.form.ajouter');
    }
    
    public function modifierApplication(Request $request) {
        $id = $request->id;
        return view('application.form.modifier', ['id' => $id]);
    }
}
