<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImportStatus extends Model
{
    use HasFactory;

    protected $table = 'import_statuses';
    protected $guarded = false;

    function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}