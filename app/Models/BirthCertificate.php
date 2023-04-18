<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BirthCertificate extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'baby_id',
        'date_of_birth',
        'Hospital',
        'mother_id',
        'father_id',
        'father_ocupation',
        'Mother_ocupation',
        'father_address',
        'Mother_address',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'birth_certificates';

    protected $casts = [
        'date_of_birth' => 'date',
    ];

    public function baby()
    {
        return $this->belongsTo(Baby::class);
    }

    public function mother()
    {
        return $this->belongsTo(Mother::class);
    }

    public function father()
    {
        return $this->belongsTo(Father::class);
    }
}
