<?php

namespace Tests\Feature;

use App\Models\Module;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ModuleTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;

    public function test_can_create_module()
    {
        $module = Module::create([
            'name' => 'Test Module',
            'price' => 100.50,
        ]);



        $this->assertDatabaseHas('modules', $module->toArray());
    }


    public function test_can_update_module()
    {
        $module = Module::create([
            'name' => 'Test Module',
            'price' => 100.50,
        ]);

       $module->update([
            'name' => 'Updated Module',
            'price' => 200.00,
        ]);



        $this->assertDatabaseHas('modules', [
            'id' => $module->id,
            'name' => 'Updated Module',
            'price' => 200.00,
        ]);
    }

    public function test_can_delete_module()
    {
        $module = Module::create([
            'name' => 'Test Module',
            'price' => 100.50,
        ]);

        $module->delete();



        $this->assertDatabaseMissing('modules', [
            'id' => $module->id,
        ]);
    }
}
