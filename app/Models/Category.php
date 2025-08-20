<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // A category has many works
    public function works()
    {
        return $this->hasMany(Work::class);
    }

    // A category has many steps
    public function steps()
    {
        return $this->hasMany(CategoryStep::class);
    }
}
