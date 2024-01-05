<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Internship extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'date_start', 'date_end', 'company', 'partner_id'];

    public function partner()
    {
        return $this->belongsTo(Partner::class);
    }
}
