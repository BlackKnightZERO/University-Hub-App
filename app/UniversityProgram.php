<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UniversityProgram extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'university_program_type_id',
        'description',
        'total_credit',
        'total_year',
        'exam_system',
        'exam_requirement',
        'admission_cost',
        'total_cost',
        'admission_link',
        'online_form_link',
        'web_link',
        'deletable',
        'meta_description',
        'meta_keywords',
        'university_id',
        'university_program_subject_type_id',
        'status'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'university_program_type_id' => 'integer',
        'university_id' => 'integer',
    ];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function universityProgramType()
    {
        return $this->belongsTo('App\UniversityProgramType');
    }

    public function university()
    {
        return $this->belongsTo('App\University');
    }
    
    public function universityProgramSubjectType()
    {
        return $this->belongsTo('App\UniversityProgramSubjectType');
    }

    public function storages() {
        return $this->morphMany('App\Storage', 'storageable');
    }
}
