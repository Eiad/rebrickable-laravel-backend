<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomSetPart extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'part_number', 'quantity'];

    public function customSet()
    {
        return $this->belongsTo(CustomSet::class);
    }
}
