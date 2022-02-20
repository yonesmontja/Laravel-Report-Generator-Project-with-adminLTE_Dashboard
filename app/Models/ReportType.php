<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportType extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopeFilter($query, array $filters)
    {
        /* 
        Hey $query! whenever u get 'search term' in URL, call the function.
        If ['search'] exists or != null, then pass its value to the function
        else return false and don't execute the $query. 
        Then the function will execute the query and returns a result.
        */
        $query->when(
            $filters['search'] ?? false,
            fn ($query, $search) =>
            $query
                ->whereHas('report', function ($query) use ($search) {
                    return $query
                        ->where('name', 'like', '%' . $search . '%')
                        ->orWhere('id', $search);
                })
                ->orWhere('name', 'like', '%' . $search . '%')
                ->orWhere('report_id', $search)
                ->orWhere('id', $search)
        );
    }

    public function getNameAttribute($value)
    {
        return ucwords($value);
    }

    public function getDescriptionAttribute($description)
    {
        if ($description == null) {
            return $description = 'n/a';
        } else {
            return $description;
        }
    }

    // Many Report Types can belong to one single Report.
    public function report()
    {
        return $this->belongsTo(Report::class);
    }
}
