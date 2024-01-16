<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class SubmitDetails extends Model
{
    use HasFactory, Notifiable, HasApiTokens;
    protected $fillable = [
    'report_id',
    'comment',
    ];

    public function report(): BelongsTo
    {
    return $this->belongsTo(SubmitReport::class);
    }
}