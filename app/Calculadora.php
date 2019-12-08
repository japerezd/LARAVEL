<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calculadora extends Model
{
    //
    var $num1;
    var $num2;

    public function suma(){
        return $this->num1+$this->num2;
    }

    public function resta(){
        return $this->num1-$this->num2;
    }

    public function multiplica(){
        return $this->num1*$this->num2;
    }

    public function divide(){
        return $this->num1/$this->num2;
    }
}
