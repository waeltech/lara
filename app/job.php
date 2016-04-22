<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{


    protected $fillable = [
        'title',
        'description',
        'salary',
        'location'
    ];

     public function user()
    {
        return $this->belongsToMany(User::class);
    }
    public function userjobs()
    {
        return $this->hasOne(Userjobs::class);
    }
    public function skills()
    {
        return $this->belongsToMany(Skill::class);
    }

    public function scopeSimpleWhereIn_1( $query, $userArray )
{
    return $query->whereIn('id', $userArray )
        ->get();
}
   

}

