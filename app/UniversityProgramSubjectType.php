<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UniversityProgramSubjectType extends Model
{

    protected $fillable = [
        'title',
        'description',
        'deletable',
        'meta_description',
        'meta_keywords'
    ];

    protected $casts = [
        'id' => 'integer',
    ];

    public function universityPrograms()
    {
        return $this->belongsToMany('App\UniversityProgram');
    }
}
