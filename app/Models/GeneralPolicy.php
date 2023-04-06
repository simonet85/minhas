<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GeneralPolicy extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
    ];

    public function setTitle($value){
        $this->attributes['title'] = $value;
    }
    public function getTitle(){
        // return $this->attributes['description'];
        return Str::words( $this->attributes['title'], 3, ' ...');
    }
    public function setDesc($value){
        $this->attributes['description'] = $value;
    }
    public function getDesc(){
        // return $this->attributes['description'];
        return Str::words( $this->attributes['description'], 15, ' ...');
    }
}
