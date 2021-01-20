<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $fillable = ['ascension_id', 'level'];

    public function characterCollection(){
        return $this->belongsTo(CharacterCollection::class);
    }
}
