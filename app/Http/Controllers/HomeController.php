<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        $sections = [
            'sections.hero',
            'sections.stats',
            'sections.why-choose',
            'sections.what-you-learn',
            'sections.timeline',
            'sections.partnership',
        ];

        return view('home', ['sections' => $sections]);
    }
}
