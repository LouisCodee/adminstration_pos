<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SyncLog extends Model
{
    protected $fillable = [
        'business_id',
        'table_name',
        'record_id',
        'operation',
        'status',
        'last_attempt'
    ];

    public function business()
    {
        return $this->belongsTo(Business::class);
    }
}

