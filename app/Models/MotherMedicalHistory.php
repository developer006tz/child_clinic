<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MotherMedicalHistory extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'mother_id',
        'illnes',
        'Description',
        'date',
        'status',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'mother_medical_histories';

    protected $casts = [
        'date' => 'date',
    ];

    public function mother()
    {
        return $this->belongsTo(Mother::class);
    }
}
