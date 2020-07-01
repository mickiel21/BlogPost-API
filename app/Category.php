<?php

namespace App;
use Illuminate\Database\Eloquent\Model;


class Category extends Model 
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * Relationship: belongs to many post
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
    

}
