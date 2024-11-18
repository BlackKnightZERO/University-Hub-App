<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'university_fund_type_id',
        'university_type_id',
        'division_id',
        'description',
        'phone',
        'contact',
        'short_links',
        'gmap_link',
        'web_link',
        'email',
        'email_register',
        'deletable',
        'meta_description',
        'meta_keywords',
        'seat_count',
        'status'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'university_fund_type_id' => 'integer',
        'university_type_id' => 'integer',
        'division_id' => 'integer',
    ];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function universityProgramTypes()
    {
        return $this->belongsToMany('App\UniversityProgramType');
    }

    public function division()
    {
        return $this->belongsTo('App\Division');
    }

    public function universityType()
    {
        return $this->belongsTo('App\UniversityType');
    }

    public function universityFundType()
    {
        return $this->belongsTo('App\UniversityFundType');
    }

    public function storages() {
        return $this->morphMany('App\Storage', 'storageable');
    }

    public function universityPrograms()
    {
        return $this->hasMany('App\UniversityProgram');
    }

}
