<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Card extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'baby_id',
        'issue_number',
        'weight',
        'height',
        'head_circumference',
        'apgar_score',
        'birth_defects',
        'blood_type_id',
    ];

    protected $searchableFields = ['*'];

    public function bloodType()
    {
        return $this->belongsTo(BloodType::class);
    }

    public function baby()
    {
        return $this->belongsTo(Baby::class);
    }
}
