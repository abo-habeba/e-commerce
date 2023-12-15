<?php

namespace App\Models;

use App\Models\User;
use App\Models\Branch;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'description',
        'imag',
        'address',
        'phone',
    ];
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    public function branches()
    {
        return $this->hasMany(Branch::class,'Company_id','id');
    }
}