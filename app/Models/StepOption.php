<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StepOption extends Model
{
    protected $fillable = ['step_id', 'option_name'];

    public function step()
    {
        return $this->belongsTo(CategoryStep::class);
    }
}

