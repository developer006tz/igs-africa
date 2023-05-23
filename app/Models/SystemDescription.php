<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SystemDescription extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['title', 'description', 'other', 'user_id'];

    protected $searchableFields = ['*'];

    protected $table = 'system_descriptions';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
