<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Baby extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'name',
        'gender',
        'birthdate',
        'weight_at_birth',
        'height_at_birth',
        'head_circumference',
        'mother_id',
        'father_id',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'birthdate' => 'date',
    ];

    public function mother()
    {
        return $this->belongsTo(Mother::class);
    }

    public function father()
    {
        return $this->belongsTo(Father::class);
    }

    public function card()
    {
        return $this->hasOne(Card::class);
    }

    public function birthCertificates()
    {
        return $this->hasMany(BirthCertificate::class);
    }

    public function babyVaccinations()
    {
        return $this->hasMany(BabyVaccination::class);
    }

    public function babyDevelopmentMilestones()
    {
        return $this->hasMany(BabyDevelopmentMilestone::class);
    }

    public function babyProgressHealthReports()
    {
        return $this->hasMany(BabyProgressHealthReport::class);
    }

    public function insurances()
    {
        return $this->belongsToMany(Insurance::class);
    }
}
