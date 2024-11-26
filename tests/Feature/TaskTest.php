<?php

namespace Tests\Feature;

use App\Models\Module;
use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;

    public function test_can_add_task_to_module()
    {
        // ایجاد یک ماژول
        $module = Module::create([
            'name' => 'Test Module',
            'price' => 100,
            'is_active' => true,
        ]);

        $task = Task::create([
            'title' => 'New Task',
            'description' => 'This is a test task',
            'module_id' => $module->id,
        ]);

        $this->assertDatabaseHas('tasks', [
            'title' => 'New Task',
            'description' => 'This is a test task',
            'module_id' => $module->id,
            'status'=>'pending'
        ]);
    }


    public function test_can_update_task()
    {
        // ایجاد یک ماژول و تسک مرتبط با آن
        $module = Module::create([
            'name' => 'Test Module',
            'price' => 100,
            'is_active' => true,
        ]);

        $task = Task::create([
            'title' => 'Old Task Title',
            'description' => 'Old Description',
            'module_id' => $module->id,
        ]);

        $task->update( [

            'title' => 'Updated Task Title',
            'description' => 'Updated Description',
            'status'=>'completed'
        ]);




        $this->assertDatabaseHas('tasks', [
            'id' => $task->id,
            'title' => 'Updated Task Title',
            'description' => 'Updated Description',
            'status'=>'completed'
        ]);
    }


    public function test_can_delete_task()
    {
        // ایجاد یک ماژول و تسک مرتبط با آن
        $module = Module::create([
            'name' => 'Test Module',
            'price' => 100,
            'is_active' => true,
        ]);

        $task = Task::create([
            'title' => 'Task to be deleted',
            'description' => 'This task will be deleted',
            'module_id' => $module->id,
        ]);

        $task->delete();

        $this->assertDatabaseMissing('tasks', [
            'id' => $task->id,
        ]);
    }


}
