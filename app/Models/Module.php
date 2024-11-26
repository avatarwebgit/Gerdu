<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $fillable = ['name','price', 'is_active'];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

}
