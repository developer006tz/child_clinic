<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Insurance extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'provider_name',
        'insurance_name',
        'policy_number',
        'contact',
    ];

    protected $searchableFields = ['*'];

    public function babies()
    {
        return $this->belongsToMany(Baby::class);
    }

    public function mothers()
    {
        return $this->belongsToMany(Mother::class);
    }
}
