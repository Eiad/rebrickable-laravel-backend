<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class CustomSet extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = ['id'];

    public function parts()
    {
        return $this->hasMany(CustomSetPart::class);
    }
}
