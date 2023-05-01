<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Desease extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['name', 'type', 'description'];

    protected $searchableFields = ['*'];

    public function babyMedicalHistories()
    {
        return $this->hasMany(BabyMedicalHistory::class);
    }

    public function motherHealthStatuses()
    {
        return $this->hasMany(MotherHealthStatus::class);
    }
}
