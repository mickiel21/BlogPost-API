<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Post extends Model 
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'category_id',
        'photo_id',
        'title',
        'body',
    ];

    /**
     * Relationship: belongs only to user
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Relationship: belongs only to category
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    } 

    /**
     * Relationship: belongs only to photo
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function photo()
    {
        return $this->belongsTo('App\Photo');
    }


}
