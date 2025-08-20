<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'work_name',
        'creation_date',
        'status',
        'category_id',
        'bank_id',
    ];

    // Work belongs to a client
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    // Work belongs to a category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Work belongs to a bank
    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }
}
