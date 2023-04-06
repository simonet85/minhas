<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HomeSection extends Model
{
    use HasFactory;

    public function setTitle($value){
        $this->attributes['title'] = $value;
    }
    public function getTitle(){
        // return $this->attributes['description'];
        return Str::words( $this->attributes['title'], 3, ' ...');
    }
    public function setText($value){
        $this->attributes['text'] = $value;
    }
    public function getText(){
        // return $this->attributes['description'];
        return Str::words( $this->attributes['text'], 15, ' ...');
    }
}
