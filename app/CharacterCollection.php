<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CharacterCollection extends Model
{
    protected $fillable = ['characters_id', 'levels_id', 'user_id'];

    protected $casts = [
        'characters_id' => 'integer',
        'levels_id' => 'integer',
        'user_id' => 'integer'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function characters(){
        return $this->hasMany(Character::class, 'character_id', 'id');
    }

    public function levels(){
        return $this->hasMany(Level::class,'levels_id', 'id');
    }

}
