<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Schedule extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'name',
        'message',
        'date_start',
        'date_end',
        'time_start',
        'time_end',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'date_start' => 'date',
        'date_end' => 'date',
    ];

    public function mothers()
    {
        return $this->belongsToMany(Mother::class);
    }
}
