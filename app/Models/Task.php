<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use App\Models\Subtask;


class Task extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function subtasks()
    {
        return $this->belongsTo(Subtask::class);
    }
}
