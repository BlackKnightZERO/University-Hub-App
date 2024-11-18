<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UniversityProgramType extends Model
{
    // use HasFactory;

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
        'meta_keywords',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];

    public function universityPrograms()
    {
        return $this->hasMany('App\UniversityProgram::class');
    }

    public function universities()
    {
        return $this->belongsToMany('App\University::class');
    }
}
