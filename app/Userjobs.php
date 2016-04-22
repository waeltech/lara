<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userjobs extends Model
{
    protected $table = "job_user";


    public function users()
	{
	    return $this->belongsToMany(User::class);
	}
	public function job()
	{
	    return $this->belongsToMany(Job::class);
	}

}
