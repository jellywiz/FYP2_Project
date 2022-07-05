<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    /*    protected $fillable = [
        'name',
        'email',
        'password',
    ]; */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = [
        "full_name"
    ];

    protected static function booted()
    {
        // static::addGlobalScope('orderbyid', function (Builder $builder) {
        //     $builder->OrderBy('id');
        // });

        // static::addGlobalScope('admin', function (Builder $builder) {
        //     $builder->whereId('id');
        // });
    }

    public function getFullNameAttribute()
    {
        return Str::title($this->first_name . ' ' . $this->last_name ?? "");
    }

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function attendance()
    {
        return $this->hasOne(Attendance::class)->orderByDesc("created_at");
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class)->orderByDesc("created_at");
    }
}
