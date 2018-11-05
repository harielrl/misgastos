<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subrubro extends Model
{
    protected $fillable = ['idrubro','subrubro','condicion'];
    public function rubro(){
        return $this.belongsTo('App\Rubro');
    }
}
