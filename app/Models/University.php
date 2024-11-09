<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class University extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'university_fund_type_id',
        'university_type_id',
        'district_id',
        'description',
        'phone',
        'contact',
        'short_links',
        'gmap_link',
        'web_link',
        'email',
        'email_register',
        'status',
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
        'district_id' => 'integer',
    ];

    public function universityProgramTypes(): HasMany
    {
        return $this->hasMany(UniversityProgramType::class);
    }

    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }

    public function universityType(): BelongsTo
    {
        return $this->belongsTo(UniversityType::class);
    }

    public function universityFundType(): BelongsTo
    {
        return $this->belongsTo(UniversityFundType::class);
    }
}
