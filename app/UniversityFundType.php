<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UniversityFundType extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'deletable',
        'meta_description',
        'meta_keywords'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];

    public function universities()
    {
        return $this->hasMany('App\University');
    }
}
