<?php

namespace Statamic\Addons\FontAwesome;

use Statamic\API\YAML;
use Statamic\Extend\Controller;

class FontAwesomeController extends Controller
{
    public function getIcons()
    {
        if (! $icons = $this->cache->get('icons')) {
            $source = 'https://raw.githubusercontent.com/FortAwesome/Font-Awesome/v4.7.0/src/icons.yml';
            $icons = collect(YAML::parse(file_get_contents($source)))->get('icons');

            $this->cache->put('icons', $icons);
        }

        return $icons;
    }
}
