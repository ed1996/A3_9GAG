<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'user_id', 'picture',
    ];
    /**
     * Get the user
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
