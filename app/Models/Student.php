<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname',
        'lastname',
        'nationnality',
        'university',
        'email_student',
        'date_birth',
        'phone_number',
        'exchanges_id',
        'internship_id',
    ];

    public function exchange()
    {
        return $this->belongsTo(Exchange::class, 'exchanges_id');
    }

    public function internship()
    {
        return $this->belongsTo(Internship::class, 'internship_id');
    }
}
