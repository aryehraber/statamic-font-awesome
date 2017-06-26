<?php

namespace Statamic\Addons\FontAwesome;

use Statamic\Extend\Listener;

class FontAwesomeListener extends Listener
{
    public $events = ['cp.add_to_head' => 'addToHead'];

    public function addToHead()
    {
        return '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">';
    }
}
