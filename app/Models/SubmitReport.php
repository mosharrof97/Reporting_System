<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class SubmitReport extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
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

}
