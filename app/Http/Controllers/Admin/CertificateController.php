<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function index()
    {
        $certificates = Certificate::latest()->get();
        return view('admin.certificates.index', compact('certificates'));
    }

    public function create()
    {
        return view('admin.certificates.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'           => 'required|string|max:255',
            'organization'   => 'required|string|max:255',
            'date_issued'    => 'required|date',
            'expiration'     => 'nullable|date',
            'credential_url' => 'nullable|url|max:255',
            'thumbnail'      => 'nullable|string|max:255',
            'visible'        => 'boolean',
        ]);

        $validated['visible'] = $request->boolean('visible');

        Certificate::create($validated);

        return redirect()->route('admin.certificates.index')->with('success', 'Certificate created.');
    }

    public function edit(Certificate $certificate)
    {
        return view('admin.certificates.edit', compact('certificate'));
    }

    public function update(Request $request, Certificate $certificate)
    {
        $validated = $request->validate([
            'name'           => 'required|string|max:255',
            'organization'   => 'required|string|max:255',
            'date_issued'    => 'required|date',
            'expiration'     => 'nullable|date',
            'credential_url' => 'nullable|url|max:255',
            'thumbnail'      => 'nullable|string|max:255',
            'visible'        => 'boolean',
        ]);

        $validated['visible'] = $request->boolean('visible');

        $certificate->update($validated);

        return redirect()->route('admin.certificates.index')->with('success', 'Certificate updated.');
    }

    public function destroy(Certificate $certificate)
    {
        $certificate->delete();
        return redirect()->route('admin.certificates.index')->with('success', 'Certificate deleted.');
    }
}
