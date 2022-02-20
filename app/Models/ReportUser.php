<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportUser extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Many Report Users can belong to one single User.
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // One Report User can have Many Report Users Data.
    public function report_user_data()
    {
        return $this->hasMany(ReportUserData::class);
    }
}
