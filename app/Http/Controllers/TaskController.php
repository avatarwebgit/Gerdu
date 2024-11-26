<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Services\TaskService;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    protected $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    // نمایش لیست تسک‌ها
    public function index()
    {
        $tasks = $this->taskService->getAllTasks();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        $modules = Module::where('is_active',true)->get();
        return view('tasks.create', compact('modules'));
    }


    // ایجاد تسک جدید
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:pending,in-progress,completed',
            'module_id' => 'required|exists:modules,id',
        ]);

        $this->taskService->createTask($request->all());
        return redirect()->route('tasks.index');
    }

    // ویرایش تسک
    public function edit($id)
    {
        $task = $this->taskService->getTaskById($id);
        $modules = Module::where('is_active',true)->get();
        return view('tasks.edit', compact('task','modules'));
    }


    public function show($id)
    {
        $task = $this->taskService->getTaskById($id);
        return view('tasks.show', compact('task'));
    }

    // بروزرسانی تسک
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:pending,in-progress,completed',
            'module_id' => 'required|exists:modules,id',
        ]);

        $task = $this->taskService->getTaskById($id);
        $this->taskService->updateTask($task, $request->all());
        return redirect()->route('tasks.index');
    }

    // حذف تسک
    public function destroy($id)
    {
        $task = $this->taskService->getTaskById($id);
        $this->taskService->deleteTask($task);
        return redirect()->route('tasks.index');
    }


}
