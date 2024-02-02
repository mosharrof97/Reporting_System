<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Carbon\Carbon;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
       'name',
       'number',
       'email',
       'role',
       'district_id',
       'image',
       'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function submit_reports(): HasMany
    {
        return $this->hasMany(SubmitReport::class, 'user_id');
    }

    public function appointment(): HasMany
    {
    return $this->hasMany(Schedule::class, 'user_id');
    }

    public function district(): BelongsTo
    {
        return $this->BelongsTo(District::class );
    }

    public function soldCount(){
        return SubmitReport::where('visit_status', 'Confirmed')->count();

    }

    public function getTodayData(){

        return SubmitDetails::where('id',$this->user_id)->whereDate('created_at', today())->count();
    }

    public function runningMonthlyData(){

        $startOfMonth = Carbon::now()->startOfMonth();
        return SubmitDetails::where('created_at', '>=', $startOfMonth)->count();
    }

    public function runningYearlyData(){

        $startOfYear = Carbon::now()->startOfYear();
        return SubmitDetails::where('id',$this->id)->where('created_at', '>=', $startOfYear)->count();
    }

    public function appointment_count(){
        return Schedule::where('id',$this->id)->count();
    }
}
