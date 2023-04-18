<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mother extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'clinic_id',
        'name',
        'blood_type_id',
        'dob',
        'phone',
        'address',
        'insurance_info',
        'occupation',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'dob' => 'date',
    ];

    public function father()
    {
        return $this->hasOne(Father::class);
    }

    public function babies()
    {
        return $this->hasMany(Baby::class);
    }

    public function pregnants()
    {
        return $this->hasMany(Pregnant::class);
    }

    public function motherHealthStatuses()
    {
        return $this->hasMany(MotherHealthStatus::class);
    }

    public function motherMedicalHistories()
    {
        return $this->hasMany(MotherMedicalHistory::class);
    }

    public function birthCertificates()
    {
        return $this->hasMany(BirthCertificate::class);
    }

    public function bloodType()
    {
        return $this->belongsTo(BloodType::class);
    }

    public function insurances()
    {
        return $this->belongsToMany(Insurance::class);
    }

    public function schedules()
    {
        return $this->belongsToMany(Schedule::class);
    }
}
