<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubmitReport extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
       'school_name',
       'h_teacher_name',
       'number',
       'eiin_number',
       'district',
       'upazila',
       'visit_status',
       'school_comment',
       'image',
       't_a_bill',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function count(){
        return SubmitReport::where('eiin_number', $this->eiin_number)->count();
        
    }

}
