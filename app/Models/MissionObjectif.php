<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MissionObjectif extends Model
{
    use HasFactory;

    public function setText($value){
        $this->attributes['description'] = $value;
    }
    public function getdescription(){
        // return $this->attributes['description'];
        return Str::words( $this->attributes['description'], 15, ' ...');
    }
}
