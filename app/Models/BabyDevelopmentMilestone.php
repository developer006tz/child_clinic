<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BabyDevelopmentMilestone extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'baby_id',
        'first_smile',
        'first_word',
        'first_step',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'baby_development_milestones';

    protected $casts = [
        'first_smile' => 'date',
        'first_word' => 'date',
        'first_step' => 'date',
    ];

    public function baby()
    {
        return $this->belongsTo(Baby::class);
    }
}
