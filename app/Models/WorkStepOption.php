<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkStepOption extends Model
{
     use HasFactory;

    protected $fillable = ['work_id', 'category_step_id', 'option_id'];

    public function work() {
        return $this->belongsTo(Work::class);
    }

    public function step() {
        return $this->belongsTo(CategoryStep::class, 'category_step_id');
    }

    public function option() {
        return $this->belongsTo(StepOption::class, 'option_id');
    }
}
