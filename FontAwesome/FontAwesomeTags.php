<?php

namespace Statamic\Addons\FontAwesome;

use Statamic\Extend\Tags;

class FontAwesomeTags extends Tags
{
    /**
     * Handle {{ font_awesome:[name] }} tags
     *
     * @return string
     */
    public function __call($name, $args)
    {
        return $name === 'css' ?: $this->output(collect($this->context)->get($name));
    }

    /**
     * Handle {{ font_awesome :icon|from|use="[name]" }} tags
     *
     * @return string
     */
    public function index()
    {
        return $this->output($this->getList(['icon', 'from', 'use'])[0]);
    }

    /**
     * Output a CDN version of the FontAwesome css
     *
     * @return string
     */
    public function css()
    {
        return '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">';
    }

    /**
     * Output the FontAwesome icon
     *
     * @return string
     */
    protected function output($icon)
    {
        return $icon ? "<i class='fa fa-{$icon}' aria-hidden='true'></i>" : '';
    }
}
