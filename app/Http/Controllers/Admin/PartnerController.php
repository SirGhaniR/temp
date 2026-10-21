<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class PartnerController extends Controller
{
    public function index(): View
    {
        return view('admin.partners.index', [
            'partners' => Partner::orderBy('order')->get(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'logo' => ['required', 'file', 'max:2048', 'mimes:jpg,jpeg,png,webp,svg'],
        ]);

        $nextOrder = (Partner::max('order') ?? 0) + 1;

        $partner = Partner::create([
            'name' => $validated['name'],
            'website_url' => null,
            'logo_path' => $request->file('logo')->store('partners', 'public'),
            'order' => $nextOrder,
        ]);

        return redirect()
            ->route('admin.partners.index')
            ->with('status', 'Partner created.');
    }

    public function edit(Partner $partner): View
    {
        return view('admin.partners.edit', ['partner' => $partner]);
    }

    public function update(Request $request, Partner $partner): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'website_url' => ['nullable', 'url', 'max:255'],
            'order' => ['required', 'integer', 'min:0', 'max:9999'],
            'logo' => ['nullable', 'file', 'max:2048', 'mimes:jpg,jpeg,png,webp,svg'],
        ]);

        if ($request->hasFile('logo')) {
            Storage::disk('public')->delete($partner->logo_path);
            $validated['logo_path'] = $request->file('logo')->store('partners', 'public');
        }

        unset($validated['logo']);

        $partner->update($validated);

        return redirect()
            ->route('admin.partners.index')
            ->with('status', 'Partner updated.');
    }

    public function destroy(Partner $partner): RedirectResponse
    {
        Storage::disk('public')->delete($partner->logo_path);
        $partner->delete();

        return redirect()
            ->route('admin.partners.index')
            ->with('status', 'Partner deleted.');
    }
}
