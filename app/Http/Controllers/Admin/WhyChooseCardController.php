<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WhyChooseCard;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WhyChooseCardController extends Controller
{
    public function index(): View
    {
        return view('admin.why-choose.index', [
            'cards' => WhyChooseCard::orderBy('order')->get(),
        ]);
    }

    public function edit(WhyChooseCard $whyChoose): View
    {
        return view('admin.why-choose.edit', ['card' => $whyChoose]);
    }

    public function update(Request $request, WhyChooseCard $whyChoose): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:2000'],
            'order' => ['required', 'integer', 'min:0', 'max:9999'],
        ]);

        $whyChoose->update($validated);

        return redirect()
            ->route('admin.why-choose.index')
            ->with('status', 'Card updated.');
    }
}
