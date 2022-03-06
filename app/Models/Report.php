<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopeFilter($query, array $filters) // This is Query Scope Function.
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
                ->where('name', 'like', '%' . $search . '%')
                ->orWhere('id', $search)
        );
    }

    // Mutator/Setter Function: 'name' column from reports table value will be stored as uppercase words.
    // public function setNameAttribute($name) {
    //     $this->attributes['name'] = ucwords($name);
    // }

    // Accessor/Getter Function: 'name' column from reports table value will be shown as uppercase words.
    public function getNameAttribute($name)
    {
        return ucwords($name);
    }

    // One Report can have many Report Types.
    public function report_types()
    {
        return $this->hasMany(ReportType::class);
    }

    // One Report can have One Report Template.
    public function report_template()
    {
        return $this->hasOne(ReportTemplate::class);
    }
}
