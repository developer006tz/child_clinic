<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BabyProgressHealthReport extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'baby_id',
        'age_per_month',
        'height',
        'weight',
        'head_circumference',
        'bmi',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'baby_progress_health_reports';

    public function baby()
    {
        return $this->belongsTo(Baby::class);
    }
}
