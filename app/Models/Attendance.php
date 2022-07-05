<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return  $this->belongsTo(User::class);
    }

    public function getStatusAttribute($value)
    {
        if ($value === 0) {
            return "At Work";
        } elseif ($value == 1) {
            return "Absent";
        } else {
            return "Late";
        }
    }
}
