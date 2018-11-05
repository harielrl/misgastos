<?php

namespace App;
use illuminate\database\eloquent\model;

class categoria extends Model
{
    // protected $table = 'categorias';
    // protected $primaryKey = 'id';
     protected $fillable = ['nombre','descripcion','condicion'];
}
