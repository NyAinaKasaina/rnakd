<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modification extends Model
{
    public $fillable = ['degre','date_de_modification','motif','mailDeveloppeur_PG','application_id'];
}
