<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CurriculumItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CurriculumItemController extends Controller
{
    public function index(): View
    {
        return view('admin.curriculum.index', [
            'items' => CurriculumItem::orderBy('order')->get(),
        ]);
    }

    public function edit(CurriculumItem $curriculum): View
    {
        return view('admin.curriculum.edit', ['item' => $curriculum]);
    }

    public function update(Request $request, CurriculumItem $curriculum): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:2000'],
            'order' => ['required', 'integer', 'min:0', 'max:9999'],
        ]);

        $curriculum->update($validated);

        return redirect()
            ->route('admin.curriculum.index')
            ->with('status', 'Curriculum item updated.');
    }
}
