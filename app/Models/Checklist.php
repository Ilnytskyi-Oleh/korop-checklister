<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Checklist extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'checklist_group_id', 'user_id', 'checklist_id'];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function checklistGroup()
    {
        return $this->belongsTo(ChecklistGroup::class);
    }
}
