<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    public $fillable = ['nom','description','details','date_de_creation','thumbnail','idGarant_PG','type_id'];
}
