<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'logo_path',
        'url'
    ];

    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class);
    }

}
