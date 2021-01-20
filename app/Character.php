<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    protected $fillable = ['name'];

    public function characterCollection(){
        return $this->belongsTo(CharacterCollection::class);
    }
}
