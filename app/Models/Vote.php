<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Request;

class Vote extends Model
{
    protected $fillable = ['poll_option_id', 'voter_hash'];

    public static function generateVoterHash(): string
    {
        return hash('sha256', Request::ip() . Request::userAgent());
    }

    public function option(): BelongsTo
    {
        return $this->belongsTo(PollOption::class);
    }
}
