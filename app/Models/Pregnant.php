<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pregnant extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'mother_id',
        'due_date',
        'date_of_delivery',
        'time_of_delivery',
        'number_of_weeks_lasted',
        'weight_at_birth',
        'height_at_birth',
        'gender',
        'pregnant_defects',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'due_date' => 'date',
        'date_of_delivery' => 'date',
    ];

    public function mother()
    {
        return $this->belongsTo(Mother::class);
    }

    public function prenatalApointments()
    {
        return $this->hasMany(PrenatalApointment::class);
    }

    public function allPregnantComplications()
    {
        return $this->hasMany(PregnantComplications::class);
    }
}
