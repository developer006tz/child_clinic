<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PrenatalApointment extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['pregnant_id', 'date', 'time'];

    protected $searchableFields = ['*'];

    protected $table = 'prenatal_apointments';

    protected $casts = [
        'date' => 'date',
    ];

    public function pregnant()
    {
        return $this->belongsTo(Pregnant::class);
    }
}
