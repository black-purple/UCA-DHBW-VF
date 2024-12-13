<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exchange extends Model
{
    use HasFactory;
    protected $fillable = ['date_start', 'date_end', 'type', 'description','universite'];



    public function students()
    {
        return $this->belongsToMany(Student::class);
    }
}
