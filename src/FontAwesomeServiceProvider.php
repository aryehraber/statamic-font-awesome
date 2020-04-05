<?php

namespace AryehRaber\FontAwesome;

use Statamic\Providers\AddonServiceProvider;

class FontAwesomeServiceProvider extends AddonServiceProvider
{
    protected $fieldtypes = [
        FontAwesomeFieldtype::class,
    ];

    protected $tags = [
        FontAwesomeTags::class,
    ];

    protected $scripts = [
        __DIR__.'/../resources/dist/js/font_awesome-fieldtype.js',
    ];

    protected $routes = [
        'cp' => __DIR__.'/../routes/cp.php',
    ];

    public function boot()
    {
        parent::boot();

        $this->publishes([
            __DIR__.'/../config/fontawesome.php' => config_path('fontawesome.php'),
        ], 'config');

        $this->registerExternalScript(config('fontawesome.kit_url', ''));
    }
}
