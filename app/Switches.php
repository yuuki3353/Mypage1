<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Switches extends Model
{
    public function switches(){
        
        return $this->haMany('App\Switches');
    }
}
