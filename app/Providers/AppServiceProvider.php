<?php

namespace App\Providers;

use App\Models\CurriculumItem;
use App\Models\Stat;
use App\Models\WhyChooseCard;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::composer(['home', 'sections.*'], function ($view) {
            $view->with([
                'stats' => Stat::orderBy('order')->get(),
                'whyChooseCards' => WhyChooseCard::orderBy('order')->get(),
                'curriculumItems' => CurriculumItem::orderBy('order')->get(),
            ]);
        });
    }
}
