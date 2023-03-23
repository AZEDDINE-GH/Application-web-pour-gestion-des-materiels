<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Affectation extends Model
{
    protected $table = 'affectation';

    public function bureau(){

        return $this->belongsTo('App\Bureau');
    }

    public function designation(){

        return $this->belongsTo('App\Designation');
    }

    public function type(){

        return $this->belongsTo('App\Type');
    }

    public function photo(){

        return $this->belongsTo('App\Photo');
    }

    public function four(){

        return $this->belongsTo('App\Fournisseur');
    }

    public function foo(){

        return $this->belongsTo('App\Fournisseur','name','id');
    }

}
