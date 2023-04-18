<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BabyVaccination extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'baby_id',
        'vacination_id',
        'date_of_vaccine',
        'reaction_occured',
        'is_vaccinated',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'baby_vaccinations';

    protected $casts = [
        'date_of_vaccine' => 'date',
    ];

    public function baby()
    {
        return $this->belongsTo(Baby::class);
    }

    public function vacination()
    {
        return $this->belongsTo(Vacination::class);
    }
}
