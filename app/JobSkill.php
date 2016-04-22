<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobSkill extends Model
{
    protected $table = "job_skill";

    protected $fillable = ['job_id' , 'skill_id'];

    public function jobs()
	{
	    return $this->belongsToMany(Job::class);
	}
	public function skills()
	{
	    return $this->belongsToMany(Skill::class);
	}

}
