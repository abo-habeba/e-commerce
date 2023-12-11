<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branche extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'description',
        'address',
        'phone',
        'Social',
        'companie_id',
    ];
    public function usees()
    {
        return $this->belongsToMany(User::class);
    }

    public function companie()
    {
        return $this->belongsTo(Companie::class);
    }
}