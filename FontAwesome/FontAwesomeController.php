<?php

namespace Statamic\Addons\FontAwesome;

use Statamic\API\YAML;
use Statamic\Extend\Controller;

class FontAwesomeController extends Controller
{
    public function getIcons()
    {
        if ($cache = $this->cache->get('icons')) return $cache;

        $source = 'https://raw.githubusercontent.com/FortAwesome/Font-Awesome/master/src/icons.yml';
        $icons = collect(YAML::parse(file_get_contents($source))['icons']);

        $this->cache->put('icons', $icons);

        return $icons;
    }
}
