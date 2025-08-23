<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryStep extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'step_name',
        'step_type',
        'status',
        'started_at',
        'completed_at',
        'pending_since',
        'copy_requested',
    ];

    // Each step belongs to a category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
   public function options()
{
    return $this->hasMany(StepOption::class, 'step_id'); // correct foreign key
}


}
