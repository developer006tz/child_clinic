<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Father extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'name',
        'dob',
        'phone',
        'address',
        'occupation',
        'mother_id',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'dob' => 'date',
    ];

    public function mother()
    {
        return $this->belongsTo(Mother::class);
    }

    public function babies()
    {
        return $this->hasMany(Baby::class);
    }

    public function birthCertificates()
    {
        return $this->hasMany(BirthCertificate::class);
    }
}
