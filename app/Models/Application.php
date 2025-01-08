<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Accessor for cv_path
    public function getCvPathAttribute($value)
    {
        return asset('storage/' . $value);
    }
}
