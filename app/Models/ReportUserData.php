<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportUserData extends Model
{
    use HasFactory;

    // Many Users Data can belong to one Report User.
    public function report_user()
    {
        return $this->belongsTo(ReportUser::class);
    }
}
