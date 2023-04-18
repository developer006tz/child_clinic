<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ComposeSms extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['message_template_id', 'custom_message'];

    protected $searchableFields = ['*'];

    protected $table = 'compose_sms';

    public function messageTemplate()
    {
        return $this->belongsTo(MessageTemplate::class);
    }
}
