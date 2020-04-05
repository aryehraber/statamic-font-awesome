<?php

use Statamic\Facades\YAML;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

Route::get('fontawesome-icons', function () {
    return Cache::rememberForever('fontawesome.icons', function () {
        $license = request('license', 'free');
        $source = __DIR__."/../resources/metadata/{$license}-icons.yml";

        return collect(YAML::parse(file_get_contents($source)))->map(function ($icon) {
            return [
                'label' => $icon['label'],
                'styles' => $icon['styles'],
            ];
        });
    });
})->name('fontawesome.icons');
