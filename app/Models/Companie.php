<?php

namespace App\Models;

use App\Models\User;
use App\Models\Branche;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Companie extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'description',
        'imag',
        'address',
        'phone',
        'Social',
    ];
    public function usees()
    {
        return $this->belongsToMany(User::class);
    }
    public function branches()
    {
        return $this->hasMany(Branche::class);
    }
}