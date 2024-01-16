<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class District extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
    'name',
    ];

    public function user(): HasMany
    {
    return $this->hasMany(User::class, 'district_id');
    }

    public function submit_reports(): HasMany
    {
    return $this->hasMany(SubmitReport::class, 'district_id');
    }

     public function schedule(): HasMany
     {
     return $this->hasMany(Schedule::class, 'district_id');
     }
}
