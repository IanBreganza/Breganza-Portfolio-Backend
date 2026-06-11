<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function index()
    {
        $experiences = Experience::orderBy('display_order')->get();
        return view('admin.experiences.index', compact('experiences'));
    }

    public function create()
    {
        return view('admin.experiences.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'role'             => 'required|string|max:255',
            'company'          => 'required|string|max:255',
            'location'         => 'nullable|string|max:255',
            'date_range'       => 'required|string|max:255',
            'responsibilities' => 'nullable|string',
            'display_order'    => 'required|integer|min:0',
        ]);

        $validated['responsibilities'] = $this->parseLines($request->input('responsibilities', ''));

        Experience::create($validated);

        return redirect()->route('admin.experiences.index')->with('success', 'Experience created.');
    }

    public function edit(Experience $experience)
    {
        return view('admin.experiences.edit', compact('experience'));
    }

    public function update(Request $request, Experience $experience)
    {
        $validated = $request->validate([
            'role'             => 'required|string|max:255',
            'company'          => 'required|string|max:255',
            'location'         => 'nullable|string|max:255',
            'date_range'       => 'required|string|max:255',
            'responsibilities' => 'nullable|string',
            'display_order'    => 'required|integer|min:0',
        ]);

        $validated['responsibilities'] = $this->parseLines($request->input('responsibilities', ''));

        $experience->update($validated);

        return redirect()->route('admin.experiences.index')->with('success', 'Experience updated.');
    }

    public function destroy(Experience $experience)
    {
        $experience->delete();
        return redirect()->route('admin.experiences.index')->with('success', 'Experience deleted.');
    }

    private function parseLines(string $raw): array
    {
        return array_values(array_filter(array_map('trim', explode("\n", $raw))));
    }
}
