<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Upazila extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
    'district_id',
    'name',
    ];

    public function submit_reports(): HasMany
    {
    return $this->hasMany(SubmitReport::class, 'upazila_id');
    }
}
