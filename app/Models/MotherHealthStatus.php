<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MotherHealthStatus extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'mother_id',
        'height',
        'weight',
        'hiv_status',
        'desease_id',
        'health_status',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'mother_health_statuses';

    public function mother()
    {
        return $this->belongsTo(Mother::class);
    }

    public function desease()
    {
        return $this->belongsTo(Desease::class);
    }
}
