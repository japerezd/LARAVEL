<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $guarded =[];

    public function company()
    {
        //Este cliente pertenece a una compañia
        return $this->belongsTo(Company::class);
    }
}
