<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Stat;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StatController extends Controller
{
    public function index(): View
    {
        return view('admin.stats.index', [
            'stats' => Stat::orderBy('order')->get(),
        ]);
    }

    public function edit(Stat $stat): View
    {
        return view('admin.stats.edit', ['stat' => $stat]);
    }

    public function update(Request $request, Stat $stat): RedirectResponse
    {
        $validated = $request->validate([
            'label' => ['required', 'string', 'max:255'],
            'value' => ['required', 'string', 'max:20'],
            'suffix' => ['nullable', 'string', 'max:5'],
            'order' => ['required', 'integer', 'min:0', 'max:9999'],
        ]);

        $stat->update($validated);

        return redirect()
            ->route('admin.stats.index')
            ->with('status', 'Stat updated.');
    }
}
