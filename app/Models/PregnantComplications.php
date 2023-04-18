<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PregnantComplications extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['pregnant_id', 'name', 'description'];

    protected $searchableFields = ['*'];

    protected $table = 'pregnant_complications';

    public function pregnant()
    {
        return $this->belongsTo(Pregnant::class);
    }
}
