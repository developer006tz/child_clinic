<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BabyMedicalHistory extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'desease_id',
        'baby_id',
        'level_of_illness',
        'description',
        'date',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'baby_medical_histories';

    protected $casts = [
        'date' => 'date',
    ];

    public function desease()
    {
        return $this->belongsTo(Desease::class);
    }

    public function baby()
    {
        return $this->belongsTo(Baby::class);
    }
}
