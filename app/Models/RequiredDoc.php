<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequiredDoc extends Model
{
    protected $fillable = ['category_id', 'doc_name'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
