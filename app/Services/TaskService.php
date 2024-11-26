<?php

namespace App\Services;

use App\Repositories\TaskRepository;
use App\Models\Task;

class TaskService
{
    protected $taskRepository;

    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function getAllTasks()
    {
        return $this->taskRepository->all();
    }

    public function createTask(array $data)
    {
        return $this->taskRepository->create($data);
    }

    public function updateTask(Task $task, array $data)
    {
        return $this->taskRepository->update($task, $data);
    }

    public function deleteTask(Task $task)
    {
        return $this->taskRepository->delete($task);
    }

    public function getTaskById($id)
    {
        return $this->taskRepository->find($id);
    }
}
