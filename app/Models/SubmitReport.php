<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Carbon\Carbon;

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
       'district_id',
       'upazila_id',
       'visit_status',
       'school_comment',
       'visit_count',
       'image',
       't_a_bill',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }

    public function upazila(): BelongsTo
    {
        return $this->belongsTo(Upazila::class);
    }

    public function submit_details(): HasMany
    {
        return $this->hasMany(SubmitDetails::class, 'report_id');
    }


    
    public function count(){
        
        return SubmitReport::where('eiin_number', $this->eiin_number)->count(); 
    }

    public function soldCount(){
        
        return SubmitReport::where('visit_status', 'Confirmed')->count(); 
    }

    public function getTodayData(){

        return SubmitReport::whereDate('created_at', today())->count(); 
    }

     public function runningMonthlyData(){

        $startOfMonth = Carbon::now()->startOfMonth();
        return SubmitReport::where('created_at', '>=', $startOfMonth)->count(); 
     }

      public function runningYearlyData(){

        $startOfYear = Carbon::now()->startOfYear();
        return SubmitReport::where('created_at', '>=', $startOfYear)->count(); 
      }
    
}
