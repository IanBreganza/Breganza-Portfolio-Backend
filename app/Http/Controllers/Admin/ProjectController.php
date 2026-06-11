<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderByDesc('priority_score')->get();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'          => 'required|string|max:255',
            'description'    => 'required|string',
            'tech_stack'     => 'nullable|string',
            'priority_score' => 'required|integer|min:1|max:10',
            'external_link'  => 'nullable|url|max:255',
            'visible'        => 'boolean',
        ]);

        $validated['tech_stack'] = $this->parseTags($request->input('tech_stack', ''));
        $validated['visible']    = $request->boolean('visible');

        Project::create($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Project created.');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title'          => 'required|string|max:255',
            'description'    => 'required|string',
            'tech_stack'     => 'nullable|string',
            'priority_score' => 'required|integer|min:1|max:10',
            'external_link'  => 'nullable|url|max:255',
            'visible'        => 'boolean',
        ]);

        $validated['tech_stack'] = $this->parseTags($request->input('tech_stack', ''));
        $validated['visible']    = $request->boolean('visible');

        $project->update($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Project updated.');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Project deleted.');
    }

    private function parseTags(string $raw): array
    {
        return array_values(array_filter(array_map('trim', explode(',', $raw))));
    }
}
