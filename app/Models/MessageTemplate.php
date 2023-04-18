<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MessageTemplate extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['name', 'body'];

    protected $searchableFields = ['*'];

    protected $table = 'message_templates';

    public function allComposeSms()
    {
        return $this->hasMany(ComposeSms::class);
    }
}
