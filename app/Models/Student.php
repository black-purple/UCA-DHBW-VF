<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = 'students';

    protected $fillable = [
        'firstname',
        'lastname',
        'nationnality',
        'university',
        'email',
        'date_birth',
        'phone_number',
    ];

    public function internships()
    {
        return $this->belongsToMany(Internship::class);
    }

    public function exchanges()
    {
        // Use the custom pivot model (ExchangeStudent)
        return $this->belongsToMany(Exchange::class)
            ->using(ExchangeStudent::class); // Specify the pivot model
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }

    public function fablabs()
    {
        return $this->belongsToMany(Fablab::class);
    }
}
