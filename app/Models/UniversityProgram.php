<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UniversityProgram extends Model
{
    use HasFactory;

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
        'status',
        'university_id',
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

    public function universityProgramType(): BelongsTo
    {
        return $this->belongsTo(UniversityProgramType::class);
    }

    public function university(): BelongsTo
    {
        return $this->belongsTo(University::class);
    }
}
