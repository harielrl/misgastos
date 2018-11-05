<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rubro extends Model
{
    protected $fillable = ['rubro','condicion'];
     public function subrubro()
     {
         return $this->hasMany('App\Subrubro');
     } 
     public function user()
     {
        return $this.belongsTo('App\User');
     } 
    
}
