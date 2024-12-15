<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ExchangeStudent extends Pivot
{
    protected $table = 'exchange_student';

    protected $fillable = ['student_id', 'exchange_id'];
}
