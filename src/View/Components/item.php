<?php

namespace GMJ\LaravelBlock2Gallery\View\Components;

use Illuminate\View\Component;

class Item extends Component
{

    public $content;
    public function __construct($content)
    {
        $this->content = $content;
    }

    public function render()
    {
        return view("LaravelBlock2Gallery::components.item");
    }
}
