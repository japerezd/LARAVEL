<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
    protected $guarded = [];  //array vacio significa que podremos acceder a todos los valores del modelo si es guarded

    //Compañia tiene muchos clientes
    public function customers()
    {
        //Esta compañia tiene muchos clientes
        return $this->hasMany(Customer::class,"company_id"); 
    }
}
