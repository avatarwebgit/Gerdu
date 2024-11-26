<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function index()
    {
        return Module::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        $module = Module::create([
            'name' => $validated['name'],
            'price' => $validated['price'],
            'is_active' => (bool)$request->is_active,
        ]);

        return response()->json($module, 201);
    }

    public function show($id)
    {
        return Module::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $module = Module::findOrFail($id);

        $validated = $request->validate([
            'name' => 'string|max:255',
            'price' => 'numeric|min:0',
        ]);

        $module->update($validated);

        return response()->json($module);
    }

    public function destroy($id)
    {
        $module = Module::findOrFail($id);
        $module->delete();

        return response()->noContent();
    }
}
