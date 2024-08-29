<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuestUser extends Model
{
    use HasFactory;

    protected $fillable = ['id'];


    public function fullname()
    {
        return ucfirst($this->name) . ' ' . ucfirst($this->last_name);
    }


    public function extras()
    {
        return $this->hasMany(Extra::class);
    }
}
