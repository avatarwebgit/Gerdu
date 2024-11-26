<?php

namespace App\Repositories;

use App\Models\Task;

class TaskRepository
{
    public function createTask($data)
    {
        return Task::create($data);
    }

    public function getTasksByModule($moduleId)
    {
        return Task::where('module_id', $moduleId)->get();
    }
}
