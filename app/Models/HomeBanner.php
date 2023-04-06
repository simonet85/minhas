<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HomeBanner extends Model
{
    use HasFactory;

    public function setTitle($value){
        $this->attributes['title'] = $value;
    }
    public function getTitle(){
        // return $this->attributes['description'];
        return Str::words( $this->attributes['title'], 3, ' ...');
    }
    public function setSlogan($value){
        $this->attributes['slogan'] = $value;
    }
    public function getSlogan(){
        // return $this->attributes['description'];
        return Str::words( $this->attributes['slogan'], 2, ' ...');
    }
}
