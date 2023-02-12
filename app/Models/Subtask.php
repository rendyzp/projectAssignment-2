<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use App\Models\Task;

class Subtask extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function task()
    {
        return $this->hasMany(Task::class);
    }
}
