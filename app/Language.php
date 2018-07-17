<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $fillable = ['name'];
    public $timestamps = false;

    public function user(){
        return $this->belongsToMany(User::class, 'user_language');
    }
}
