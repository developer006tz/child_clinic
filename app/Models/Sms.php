<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sms extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['body', 'phone', 'status'];

    protected $searchableFields = ['*'];
}
