<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BloodType extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['name', 'description', 'rh_factor'];

    protected $searchableFields = ['*'];

    protected $table = 'blood_types';

    public function cards()
    {
        return $this->hasMany(Card::class);
    }

    public function mothers()
    {
        return $this->hasMany(Mother::class);
    }
}
