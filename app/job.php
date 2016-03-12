<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class job extends Model
{
    protected $fillable = [
        'title',
        'description',
        'salary',
        'location',
        'contact_email',
        'contact_name'
    ];
	public function user() {
	    return $this->belongsTo(User::class);
	}
}

