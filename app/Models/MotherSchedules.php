<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MotherSchedules extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'mother_id',
        'schedule_id',
        'message',
        'date',
        'status',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'date' => 'date',
    ];

    public function mothers()
    {
        return $this->belongsTo(Mother::class);
    }

    public function schedule(){
        return $this->belongsTo(Schedule::class);
    }
}