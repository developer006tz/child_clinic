<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vacination extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['name', 'type'];

    protected $searchableFields = ['*'];

    public function babyVaccinations()
    {
        return $this->hasMany(BabyVaccination::class);
    }
}
