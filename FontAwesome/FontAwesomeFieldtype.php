<?php

namespace Statamic\Addons\FontAwesome;

use Statamic\Extend\Fieldtype;

class FontAwesomeFieldtype extends Fieldtype
{
    public function blank()
    {
        return null;
    }

    public function preProcess($data)
    {
        return $data;
    }

    public function process($data)
    {
        return $data;
    }
}
