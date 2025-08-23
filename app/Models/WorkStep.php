<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkStep extends Model
{
    //

    protected $fillable = ['work_id', 'category_step_id', 'status', 'started_at', 'completed_at'];

    public function work()
    {
        return $this->belongsTo(Work::class);
    }

    public function categoryStep()
    {
        return $this->belongsTo(CategoryStep::class);
    }
}
