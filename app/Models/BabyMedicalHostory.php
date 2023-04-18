<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BabyMedicalHostory extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'desease_id',
        'level_of_illness',
        'description',
        'date',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'baby_medical_hostories';

    protected $casts = [
        'date' => 'date',
    ];

    public function desease()
    {
        return $this->belongsTo(Desease::class);
    }
}
