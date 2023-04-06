<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Messages extends Model
{
    use HasFactory;

    protected $fillable = ['name','subject', 'email', 'message'];

    protected $dates = ['created_at', 'updated_at'];

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y à H:m:s');
    }

    public function setMessage($value){
        $this->attributes['message'] = $value;
    }
    public function getMessage(){
        // return $this->attributes['description'];
        return Str::words( $this->attributes['message'], 15, ' ...');
    }

}
