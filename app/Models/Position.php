<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'name',
        'salary',
        'bonus',
        'pantry',
        'isr',
        'assurance',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    protected $appends = ['perceptions', 'deductions'];

    public function getPerceptionsAttribute()
    {
        return $this->salary + $this->bonus + $this->pantry;
    }
    
    public function getDeductionsAttribute()
    {
        return $this->isr + $this->assurance;
    }
}
