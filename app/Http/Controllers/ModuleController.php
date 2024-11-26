<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller

{

    public function index()

    {

        $modules = Module::all();

        return view('modules.index', compact('modules'));

    }


    public function create()

    {

        return view('modules.create');

    }


    public function store(Request $request)

    {

        $request->validate([

            'name' => 'required',

            'price' => 'required|numeric',

            'is_active' => 'boolean',

        ]);


        Module::create($request->all());

        return redirect()->route('modules.index')->with('success', 'Module created successfully.');

    }


    public function show(Module $module)

    {

        return view('modules.show', compact('module'));

    }


    public function edit(Module $module)

    {

        return view('modules.edit', compact('module'));

    }


    public function update(Request $request, Module $module)

    {

        $request->validate([

            'name' => 'required',

            'price' => 'required|numeric',

            'is_active' => 'boolean',

        ]);


        $module->update($request->all());

        return redirect()->route('modules.index')->with('success', 'Module updated successfully.');

    }


    public function destroy(Module $module)

    {

        $module->delete();

        return redirect()->route('modules.index')->with('success', 'Module deleted successfully.');

    }

}
