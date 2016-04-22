<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSkill extends Model
{
    protected $table = "user_skill";

    protected $fillable = ['user_id' , 'skill_id'];

    public function users()
	{
	    return $this->belongsToMany(User::class);
	}
	public function skills()
	{
	    return $this->belongsToMany(Skill::class);
	}

}