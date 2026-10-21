<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TimelineCard;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class TimelineCardController extends Controller
{
    public const MAX_PER_STEP = 4;

    public function index(): View
    {
        $cardsByStep = TimelineCard::orderBy('step')
            ->orderBy('order')
            ->get()
            ->groupBy('step');

        return view('admin.timeline.index', [
            'cardsByStep' => $cardsByStep,
            'maxPerStep' => self::MAX_PER_STEP,
            'canAddToStep' => collect([1, 2, 3])->mapWithKeys(
                fn ($step) => [$step => ($cardsByStep[$step] ?? collect())->count() < self::MAX_PER_STEP]
            ),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'step' => ['required', 'integer', 'in:1,2,3'],
        ]);

        $step = (int) $validated['step'];
        $currentCount = TimelineCard::where('step', $step)->count();

        if ($currentCount >= self::MAX_PER_STEP) {
            return redirect()
                ->route('admin.timeline.index')
                ->withErrors(['step' => "Step {$step} already has the maximum of ".self::MAX_PER_STEP.' cards.']);
        }

        $nextOrder = (TimelineCard::where('step', $step)->max('order') ?? 0) + 1;

        $card = TimelineCard::create([
            'step' => $step,
            'headline' => 'New card',
            'description' => null,
            'link' => null,
            'image_path' => null,
            'order' => $nextOrder,
        ]);

        return redirect()
            ->route('admin.timeline.edit', $card)
            ->with('status', 'Card created. Fill in the details below.');
    }

    public function edit(TimelineCard $timeline): View
    {
        return view('admin.timeline.edit', ['card' => $timeline]);
    }

    public function update(Request $request, TimelineCard $timeline): RedirectResponse
    {
        $validated = $request->validate([
            'step' => ['required', 'integer', 'in:1,2,3'],
            'headline' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:2000'],
            'link' => ['nullable', 'url', 'max:255'],
            'order' => ['required', 'integer', 'min:0', 'max:9999'],
            'image' => ['nullable', 'image', 'max:2048'],
            'remove_image' => ['nullable', 'boolean'],
        ]);

        unset($validated['image'], $validated['remove_image']);

        if ($request->hasFile('image')) {
            if ($timeline->image_path) {
                Storage::disk('public')->delete($timeline->image_path);
            }
            $validated['image_path'] = $request->file('image')->store('timeline', 'public');
        } elseif ($request->boolean('remove_image') && $timeline->image_path) {
            Storage::disk('public')->delete($timeline->image_path);
            $validated['image_path'] = null;
        }

        $timeline->update($validated);

        return redirect()
            ->route('admin.timeline.index')
            ->with('status', 'Timeline card updated.');
    }

    public function destroy(TimelineCard $timeline): RedirectResponse
    {
        if ($timeline->image_path) {
            Storage::disk('public')->delete($timeline->image_path);
        }

        $timeline->delete();

        return redirect()
            ->route('admin.timeline.index')
            ->with('status', 'Timeline card deleted.');
    }
}
